<?php


namespace User\Service;


use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use User\Entity\UserGroup;

class UserManager
{
    private $entity_manager;

    public function __construct(ManagerRegistry $entity)
    {
        $this->entity_manager = $entity;
    }

    public function createUser()
    {
        $entity = new \User\Entity\User();

        $entity->setFirstname('John');
        $entity->setLastname('Doe');

        // Ajout des groupes par défauts
        $groups = $this->entity_manager->getRepository(UserGroup::class)->findWhere('entity.priority = -1');

        foreach ($groups as $group) {
            $entity->addUserGroup($group);
        }


        return $entity;
    }


    /**
     * Vérifie la conformité de l'utilisateur
     */
    public function checkUser($user)
    {
        if (
            trim($user->getPassword()) == null ||
            trim($user->getEmail()) == null
        ) {
            return false;

        }
        return true;

    }

}
