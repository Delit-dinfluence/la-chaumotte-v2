<?php

namespace Core\Service\Session;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use \Core\Entity\Session as EntitySession;

class DatabaseSession
{
    private $entity_manager;

    private $manager_registry;

    private $session;

    public function __construct(Session $session, EntityManagerInterface $entity, ManagerRegistry $registry)
    {
        $this->session = $session;
        $this->entity_manager = $entity;
        $this->manager_registry = $registry;
    }

    /**
     * Retourne la session en base de donnée
     */
    public function get($session_key)
    {
        return $this->getEntityFromDatabase($session_key);
    }

    /**
     * Création / Mise à jour d'une session en base de donnée
     */
    public function persist()
    {
        $entity = $this->getEntityFromDatabase($this->session->getSessionKey());

        if ($entity == null || $this->session->getSessionKey() == null) {
            $entity = new \Core\Entity\Session();
            $entity->setSessionKey($this->session->getSessionKey());
        }

        $entity->setSessionContent($this->session->serialize());
        $entity->setSessionExpiration($this->session->getExpiration());
        $entity->setUserIp($this->session->getUserIp());
        $entity->setUpdatedAt(new \Datetime());

        $this->entity_manager->persist($entity);
        $this->entity_manager->flush();

        return true;
    }

    /**
     * Supprime une session en la base de donnée
     */
    public function destroy()
    {
        $entity = $this->getEntityFromDatabase($this->session->getSessionKey());

        if ($entity != null) {
            $this->entity_manager->remove($entity);
            $this->entity_manager->flush();
        }
    }

    /**
     * Retourne la session en base de donnée
     */
    private function getEntityFromDatabase($session_key)
    {
        return $this->entity_manager->getRepository(EntitySession::class)->findSession($session_key);
    }

}
