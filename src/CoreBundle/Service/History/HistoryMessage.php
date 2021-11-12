<?php

namespace Core\Service\History;

use Core\Entity\History;
use Core\Entity\HistoryConfiguration;
use Core\Entity\HistoryGravityType;
use Core\Service\Session\Session;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Core\Entity\HistoryMessageType as message;

class HistoryMessage
{
    private $em;
    private $configuration;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->configuration = null;
    }

    public function save($type, $message, $code = -1, $user = null)
    {
        // Récupération de la configuration si elle n'existe pas
        if ($this->configuration == null) {
            $this->configuration = $this->em->getRepository(HistoryConfiguration::class)->find(1);
        }


        if ($this->configuration->getSaveMessage($type)) {

            $entity = new History();
            $entity->setMessage($message);
            $entity->setUser($user);
            $entity->setCode($code);

            switch ($type) {
                case message::FORM_NEW:
                case message::FORM_EDIT:
                case message::FORM_REMOVE:
                case message::FORM_DUPLICATE:
                case message::FORM_STATUT:
                case message::LOGIN:
                    $level = HistoryGravityType::MESSAGE_INFORMATION;
                    break;

                default:
                    $level = HistoryGravityType::MESSAGE_CRITICAL;
                    break;
            }

            $entity->setType($level);
            $this->em->persist($entity);
            $this->em->flush();


            // Envoi d'un email d'avertissement
            if ($this->configuration->getEmailLevel() <= $level) {
                // TODO Envoyer un email d'avertissement
            }
        }
    }
}
