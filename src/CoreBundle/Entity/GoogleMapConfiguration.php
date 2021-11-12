<?php

namespace Core\Entity;

use Core\Entity\ControllerList;
use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\ImageTrait;
use Core\Entity\Traits\PageTrait;
use Core\Entity\Traits\TranslatableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Type de fichier autorisé au téléchargement
 *
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="Core\Repository\GoogleMapConfigurationRepository")
 * @ORM\Table(name="core_google_map_configuration")
 */
class GoogleMapConfiguration
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Désignation du type
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $api_key;


    /**
     * Désignation du type
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $zoom;

    /**
     * Désignation du type
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $latitude;

    /**
     * Désignation du type
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $longitude;


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
    public function getApiKey()
    {
        return $this->api_key;
    }

    /**
     * @param mixed $api_key
     */
    public function setApiKey($api_key): void
    {
        $this->api_key = $api_key;
    }

    /**
     * @return mixed
     */
    public function getZoom()
    {
        return $this->zoom;
    }

    /**
     * @param mixed $zoom
     */
    public function setZoom($zoom): void
    {
        $this->zoom = $zoom;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude): void
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude): void
    {
        $this->longitude = $longitude;
    }

}
