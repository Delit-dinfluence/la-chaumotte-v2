<?php

namespace Core\Entity;

use Core\Entity\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Configuration générale de l'application
 *
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="Core\Repository\ConfigurationRepository")
 * @ORM\Table(name="core_configuration")
 */
class Configuration
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Désignation de l'application
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sitename;

    /**
     * Nom de domaine de l'application
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $domain;

    /**
     * Nom du logo de l'application
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $logo;

    /**
     * Fichier du logo de l'application
     *
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
    public function getSitename()
    {
        return $this->sitename;
    }

    /**
     * @param mixed $sitename
     */
    public function setSitename($sitename): void
    {
        $this->sitename = $sitename;
    }

    /**
     * @return mixed
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param mixed $domain
     */
    public function setDomain($domain): void
    {
        $this->domain = $domain;
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
    public function setLogo(string $logo)
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
    public function setLogoFile(File $logoFile = null)
    {
        $this->logoFile = $logoFile;

        if ($logoFile) {
            $this->setUpdatedAt(new \DateTime('now'));
        }
    }

}
