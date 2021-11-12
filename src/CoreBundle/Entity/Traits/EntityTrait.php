<?php

namespace Core\Entity\Traits;

use Doctrine\Common\Persistence\Mapping\ClassMetadata;
use Doctrine\Common\Persistence\ObjectManager;

trait EntityTrait
{
    /**
     * Identifiant unique
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * Status de l'entité
     *
     * @ORM\Column(type="boolean")
     */
    protected $is_enabled;

    /**
     * Ordre de l'entité
     *
     * @ORM\Column(type="float", nullable=true)
     */
    protected $sortorder;


    /**
     * Date de création
     *
     * @ORM\Column(type="datetime")
     */
    protected $created_at;

    /**
     * Date de mise à jours
     *
     * @ORM\Column(type="datetime")
     */
    protected $updated_at;

    protected $em;

    public function injectObjectManager(ObjectManager $objectManager, ClassMetadata $classMetadata) {
        $this->em = $objectManager;
    }

    /**
     * Constructeur
     *
     * @throws \Exception
     */
    public function __construct()
    {
        $datetime = new \Datetime();
        $this->setCreatedAt($datetime);
        $this->setUpdatedAt($datetime);
        $this->setIsEnabled(false); // Désactive par défault l'entité lors de la création
        $this->setSortorder(0);
    }

    /**
     * @return mixed
     */
    public function getSortorder()
    {
        return $this->sortorder;
    }

    /**
     * @param mixed $sortorder
     */
    public function setSortorder($sortorder): void
    {
        $this->sortorder = $sortorder;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIsEnabled()
    {
        return $this->is_enabled;
    }

    /**
     * @param mixed $is_enabled
     */
    public function setIsEnabled($is_enabled)
    {
        $this->is_enabled = $is_enabled;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function __toString()
    {
        return (String)$this->getId();
    }

    public function getGenerateURI($action)
    {
        $classes = explode('\\', get_class($this));

        $uri = 'entity-management?module=' . strtolower($classes[0]) . '&entity=' . end($classes) . '&action=' . $action;

        if ($action == 'form') {
            if ($id = $this->getId() != '') {
                $uri .= '&id=' . $this->getId();
            } else {
                $uri .= '&id=-1';
            }
        } else if ($action == 'remove') {
            $uri .= '&id=' . $this->getId();
        } else if ($action == 'view'){
            $uri .= '&id=' . $this->getId();
        }

        return $uri;
    }

    public function getters($entity)
    {
        return array_filter(get_class_methods($entity), function ($method) {

            $array = ['GenerateURI', 'ters', 'TranslationEntityClass','NewTranslations' ,'DefaultLocale', 'CurrentLocale'];
            return 'get' === substr($method, 0, 3) && (!in_array(substr($method, 3), $array));
        });
    }

    public function setters($entity)
    {
        return array_filter(get_class_methods($entity), function ($method) {
            return 'set' === substr($method, 0, 3);
        });
    }

    public function getClass(){
        $array = explode('\\', get_class($this));
        return end($array);
    }
}
