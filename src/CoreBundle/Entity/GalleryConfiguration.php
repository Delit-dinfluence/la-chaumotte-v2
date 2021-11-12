<?php

namespace Core\Entity;

use Core\Entity\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Configuration principale de l'application
 *
 * @ORM\Entity(repositoryClass="Core\Repository\GalleryConfigurationRepository")
 * @ORM\Table(name="core_gallery_configuration")
 */
class GalleryConfiguration
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Nombre de colonnes
     *
     * @ORM\Column(type="string", length=255)
     */
    private $columns_number;

    /**
     * Nombre de colonnes
     *
     * @ORM\Column(type="string", length=255)
     */
    private $column_height;

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
    public function getColumnsNumber()
    {
        return $this->columns_number;
    }

    /**
     * @param mixed $columns_number
     */
    public function setColumnsNumber($columns_number): void
    {
        $this->columns_number = $columns_number;
    }


    /**
     * @return mixed
     */
    public function getColumnHeight()
    {
        return $this->column_height;
    }

    /**
     * @param mixed $column_height
     */
    public function setColumnHeight($column_height): void
    {
        $this->column_height = $column_height;
    }


}
