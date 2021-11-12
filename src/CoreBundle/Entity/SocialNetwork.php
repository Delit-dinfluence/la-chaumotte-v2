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
 * Réseaux sociaux disponibles pour l'application
 *
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="Core\Repository\SocialNetworkRepository")
 * @ORM\Table(name="core_social_network")
 */
class SocialNetwork
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $designation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $logo;

    /**
     * @Vich\UploadableField(mapping="images", fileNameProperty="logo")
     * @var File
     */
    private $logoFile;


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
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * @param mixed $designation
     */
    public function setDesignation($designation): void
    {
        $this->designation = $designation;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link): void
    {
        $this->link = $link;
    }

    /**
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * @return File
     */
    public function getLogoFile()
    {
        return $this->logoFile;
    }

    /**
     * @param File $logoFile
     */
    public function setLogoFile($logoFile = null)
    {
        $this->logoFile = $logoFile;

        if ($logoFile) {
            $this->setUpdatedAt(new \DateTime('now'));
        }
    }

    /**
     * Retourne la designation utilisable en css
     */
    public function getStyleClass(){
        return strtolower(trim(implode('_', preg_split('/(?=[A-Z])/',$this->getDesignation())), '_'));
    }

}
