<?php

namespace Core\Service\Session;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Serializer\SerializerInterface;


class Session
{
    /**
     * @var EntityManagerInterface
     */
    private $entity_manager;

    /**
     * @var ManagerRegistry
     */
    private $manager;

    /**
     * @var string - Clé du cookie de l'application
     */
    private $cookie_key = 'application_session';

    /**
     * @var SessionInterface - Session courante
     */
    private $session;

    private $session_key;

    /**
     * @var DatabaseSession - Session en base de donnée
     */
    private $database;

    /**
     * Session constructor.
     */
    public function __construct(SessionInterface $original_session, EntityManagerInterface $em, ManagerRegistry $manager)
    {
        $this->entity_manager = $em;
        $this->manager = $manager;
        $this->session = null;

        // Créer le manager de session en base de donnée
        $this->database = new DatabaseSession($this, $this->entity_manager, $this->manager);

        // Nettoyage des sessions périmées
        $this->garbageCollector();

        // Récupère la session enregistrée si elle existe
        if (isset($_COOKIE[$this->cookie_key])) {

            // Récupère la session depuis la base de donnée
            $entity = $this->database->get($_COOKIE[$this->cookie_key]);

            // Reformat de la session
            if ($entity != null) {
                $this->session = $this->unserialize($entity);
            }
        }

        // Création d'une nouvelle session
        if (!isset($_COOKIE[$this->cookie_key]) || $this->session == null) {

            $original_session->clear();

            // Création d'une session normal
            $this->session = new \Symfony\Component\HttpFoundation\Session\Session();
        }

        // Démarrage de la session si elle n'existe pas
        if (!$this->session->isStarted() && !isset($_SESSION)) {
            $this->session->start();
        }

        // Sauvegarde de l'identifiant en cookie
        if (!isset($_COOKIE[$this->cookie_key])) {
            setcookie($this->cookie_key, $this->getSessionKey(), time() + $this->getExpiration(), '/', '', false, true);
        }

        $this->session_key = $this->getSessionKey();

        // Sauvegarde en base de donnée
        $this->database->persist();

    }

    /**
     * Récupère une donnée de la session
     */
    public function get($key)
    {
        return $this->session->get($key);
    }

    /**
     * Vérifie l'existance d'une donnée de la session
     */
    public function has($key)
    {
        return $this->session->has($key);
    }

    /**
     * Ajoute une donnée en session et l'enregistre
     */
    public function set($key, $value)
    {
        if (method_exists($value, 'serialize')) {
            $value = $value->serialize();
        }

        $this->session->set($key, $value);

        // Enregistre en base de donnée
        $this->database->persist();
    }

    /**
     * Supprime une donnée en session et l'enresitre
     */
    public function clear($key)
    {
        $this->session->remove($key);

        // Supprime en base de donnée
        $this->database->persist();
    }


    public function garbageCollector()
    {
        $sessions = $this->entity_manager->getRepository(\Core\Entity\Session::class)->findExpiredSession();

        foreach ($sessions as $session) {

            $this->entity_manager->remove($session);
        }

        $this->entity_manager->flush();

    }

    public function serialize()
    {
        $content = [];

        foreach ($_SESSION['_sf2_attributes'] as $key => $val) {
            if ($key[0] != '_') {

                if (method_exists($val, 'serialize')) {
                    $val = $val->serialize();
                }

                $content[$key] = $val;
            }
        }

        return json_encode($content);
    }

    public function unserialize($entity)
    {
        $content = json_decode($entity->getSessionContent());
        $session = new \Symfony\Component\HttpFoundation\Session\Session();

        foreach ($content as $key => $val) {
            $session->set($key, $val);
        }


        return $session;
    }


    public function getExpiration()
    {
        return 7 * 24 * 60 * 60;
    }


    public function getSessionKey()
    {
        if (isset($_COOKIE[$this->cookie_key])) {
            return $_COOKIE[$this->cookie_key];
        }

        return $this->session->getId();
    }


    public function getUserIp()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }

    /**
     * Supprime une session
     */
    public function destroy()
    {
        // Supprime en base de donnée
        $this->database->destroy();

        $this->session->clear();

        // Suppression du cookie
        setcookie($this->cookie_key, '', 1);

    }

    /**
     * Retourne l'adresse IP de la session courante
     */
    public function getIPAdress()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }

}
