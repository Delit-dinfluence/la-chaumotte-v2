<?php

namespace Shopping\Entity;

use Core\Entity\Enum;
use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\TranslatableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Enumération des types d'affichage du groupe
 */
abstract class FeatureGroupType extends Enum
{
    const LIST_RADIO = 0;
    const LIST_SELECT = 1;
    const INPUT_FILE = 2;
    const INPUT_TEXT = 3;

    /**
     * Nom d'affichage
     */
    protected static $typeName = [
        self::LIST_RADIO => 'Radio',
        self::LIST_SELECT => 'Select',
        self::INPUT_FILE => 'Téléchargement de fichier',
        self::INPUT_TEXT => 'Input text',
    ];

}

/**
 * Groupe de caractéristiques
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\FeatureGroupRepository")
 * @ORM\Table(name="shopping_feature_group")
 */
class FeatureGroup
{
    use TranslatableTrait;
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Type d'affichage
     *
     * @ORM\Column(type="integer")
     */
    private $print_type;

    /**
     * Caracteristiques du groupe
     *
     * @ORM\OneToMany(targetEntity="Feature", mappedBy="feature_group", cascade={"persist", "remove"})
     */
    private $features;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();

        $this->features = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getPrintType()
    {
        return $this->print_type;
    }

    /**
     * @param mixed $print_type
     */
    public function setPrintType($print_type): void
    {
        $this->print_type = $print_type;
    }

    /**
     *
     * @return ArrayCollection
     */
    public function getFeatures()
    {
        return $this->features;
    }

    /**
     *
     * @param Feature $item
     */
    public function addFeature(Feature $item)
    {
        $this->features[] = $item;
        $item->setFeatureGroup($this);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->getDesignation();
    }

}
