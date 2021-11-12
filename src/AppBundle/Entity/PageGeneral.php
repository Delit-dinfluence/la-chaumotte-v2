<?php

namespace App\Entity;

use Core\Entity\ControllerList;
use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\PageTrait;
use Core\Entity\Traits\TranslatableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="App\Repository\PageGeneralRepository")
 * @ORM\Table(name="app_page_general")
 */
class PageGeneral
{
    use TranslatableTrait;
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }
    use PageTrait {
        PageTrait::__construct as private __pageConstruct;
    }

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sitename;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $domain;

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
        $this->__pageConstruct();
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
