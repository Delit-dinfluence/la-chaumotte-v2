<?php

namespace Core\Entity;

use Core\Entity\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Enumération des types d'actions
 */
abstract class HistoryMessageType extends Enum
{
    const FORM_NEW = 1000;
    const FORM_EDIT = 1001;
    const FORM_DUPLICATE = 1002;
    const FORM_STATUT = 1003;
    const FORM_REMOVE = 1004;

    const LOGIN = 1100;
}

/**
 * Enumération des types de gravité d'actions
 */
abstract class HistoryGravityType extends Enum
{
    const MESSAGE_INFORMATION = 0;
    const MESSAGE_WARNING = 1;
    const MESSAGE_ERROR = 2;
    const MESSAGE_CRITICAL = 4;

    /**
     * Nom d'affichage
     */
    protected static $typeName = [
        self::MESSAGE_INFORMATION => 'Information',
        self::MESSAGE_WARNING => 'Erreur mineur',
        self::MESSAGE_ERROR => 'Erreur moyenne',
        self::MESSAGE_CRITICAL=> 'Erreur critique'
    ];

}

/**
 * Configuration de l'historique des actions
 *
 * @ORM\Entity(repositoryClass="Core\Repository\HistoryConfigurationRepository")
 * @ORM\Table(name="core_history_configuration")
 */
class HistoryConfiguration
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Enregistre les actions "Création d'une entité"
     *
     * @ORM\Column(type="boolean")
     */
    private $use_form_new;

    /**
     * Enregistre les actions "Modification d'une entité"
     *
     * @ORM\Column(type="boolean")
     */
    private $use_form_edit;

    /**
     * Enregistre les actions "Duplication d'une entité"
     *
     * @ORM\Column(type="boolean")
     */
    private $use_form_duplicate;

    /**
     * Enregistre les actions "Modification du statut d'une entité"
     *
     * @ORM\Column(type="boolean")
     */
    private $use_form_statut;

    /**
     * Enregistre les actions "Suppression d'une entité"
     *
     * @ORM\Column(type="boolean")
     */
    private $use_form_remove;

    /**
     * Enregistre les actions "Connexion à l'espace d'administration"
     *
     * @ORM\Column(type="boolean")
     */
    private $use_login;

    /**
     * Niveau de gravité d'actions minimum où il faut envoyer un email d'alerte
     *
     * @ORM\Column(type="integer")
     */
    private $email_level;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();
    }

    /**
     * @return mixed
     */
    public function getUseFormNew()
    {
        return $this->use_form_new;
    }

    /**
     * @param mixed $use_form_new
     */
    public function setUseFormNew($use_form_new): void
    {
        $this->use_form_new = $use_form_new;
    }

    /**
     * @return mixed
     */
    public function getUseFormEdit()
    {
        return $this->use_form_edit;
    }

    /**
     * @param mixed $use_form_edit
     */
    public function setUseFormEdit($use_form_edit): void
    {
        $this->use_form_edit = $use_form_edit;
    }

    /**
     * @return mixed
     */
    public function getUseFormDuplicate()
    {
        return $this->use_form_duplicate;
    }

    /**
     * @param mixed $use_form_duplicate
     */
    public function setUseFormDuplicate($use_form_duplicate): void
    {
        $this->use_form_duplicate = $use_form_duplicate;
    }

    /**
     * @return mixed
     */
    public function getUseFormStatut()
    {
        return $this->use_form_statut;
    }

    /**
     * @param mixed $use_form_statut
     */
    public function setUseFormStatut($use_form_statut): void
    {
        $this->use_form_statut = $use_form_statut;
    }

    /**
     * @return mixed
     */
    public function getUseFormRemove()
    {
        return $this->use_form_remove;
    }

    /**
     * @param mixed $use_form_remove
     */
    public function setUseFormRemove($use_form_remove): void
    {
        $this->use_form_remove = $use_form_remove;
    }

    /**
     * @return mixed
     */
    public function getUseLogin()
    {
        return $this->use_login;
    }

    /**
     * @param mixed $use_login
     */
    public function setUseLogin($use_login): void
    {
        $this->use_login = $use_login;
    }

    /**
     * @return mixed
     */
    public function getEmailLevel()
    {
        return $this->email_level;
    }

    /**
     * @param mixed $email_level
     */
    public function setEmailLevel($email_level): void
    {
        $this->email_level = $email_level;
    }

    /**
     * Retourne si on doit sauvegarder l'action ou non
     */
    public function getSaveMessage($type)
    {
        if(
            $type == HistoryMessageType::FORM_NEW && $this->getUseFormNew() ||
            $type == HistoryMessageType::FORM_EDIT && $this->getUseFormEdit() ||
            $type == HistoryMessageType::FORM_REMOVE && $this->getUseFormRemove() ||
            $type == HistoryMessageType::FORM_DUPLICATE && $this->getUseFormDuplicate() ||
            $type == HistoryMessageType::FORM_STATUT && $this->getUseFormStatut() ||

            $type == HistoryMessageType::LOGIN && $this->getUseLogin()
        ){
            return true;
        }
        return false;
    }

}
