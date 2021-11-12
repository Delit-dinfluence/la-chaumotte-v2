<?php

namespace Core\Entity;

use App\Entity\Slide;
use Core\Entity\Traits\EntityTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Page de l'application (Accueil, Contact, Mentions légales, ...)
 *
 * @ORM\Entity(repositoryClass="Core\Repository\PageCategoryRepository")
 * @ORM\Table(name="core_page_category")
 */
class PageCategory extends ControllerList
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Nom de la catégorie
     *
     * @ORM\Column(type="string", length=255)
     */
    private $designation;


    /**
     * @ORM\ManyToMany(targetEntity="Page", mappedBy="categories")
     */
    private $pages;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();
        $this->__entityConstruct();

        $this->pages = new ArrayCollection();

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
     * @return ArrayCollection
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * @param page $item
     */
    public function addProduct(Page $item)
    {
        $this->pages[] = $item;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->getDesignation();
    }


}
