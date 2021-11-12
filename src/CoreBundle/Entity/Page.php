<?php

namespace Core\Entity;

use App\Entity\Slide;
use Core\Entity\Traits\EntityTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Page de l'application (Accueil, Contact, Mentions légales, ...)
 *
 * @ORM\Entity(repositoryClass="Core\Repository\PageRepository")
 * @ORM\Table(name="core_page")
 */
class Page extends ControllerList
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Description de la page
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Slide", mappedBy="page", cascade={"remove"})
     */
    private $slides;


    /**
     * Catégories du produit
     *
     * @ORM\ManyToMany(targetEntity="PageCategory", inversedBy="pages")
     */
    private $categories;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();
        $this->__entityConstruct();

        $this->categories = new ArrayCollection();

    }

    /**
     * @return ArrayCollection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param PageCategory $item
     */
    public function addCategory(PageCategory $item)
    {
        $this->categories[] = $item;
        $item->addPage($this);
    }

    /**
     * @return ArrayCollection
     */
    public function getSlide()
    {
        return $this->slides;
    }

    /**
     * @param Slide $slide
     */
    public function addSlide(Slide $slide)
    {
        $this->slides[] = $slide;
        $slide->setPage($this);
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function __toString()
    {
        return (string)$this->getReference();
    }

}
