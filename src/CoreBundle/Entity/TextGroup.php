<?php

namespace Core\Entity;

use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\TranslatableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Groupe de texte de traduction
 *
 * @ORM\Entity(repositoryClass="Core\Repository\TextGroupRepository")
 * @ORM\Table(name="core_text_group")
 */
class TextGroup
{
    use TranslatableTrait;
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Parent du groupe
     *
     * @ORM\ManyToOne(targetEntity="TextGroup", inversedBy="children")
     * @ORM\JoinColumn(name="parent", referencedColumnName="id", nullable=true)
     */
    private $parent;

    /**
     * Sous-groupe
     *
     * @ORM\OneToMany(targetEntity="TextGroup", mappedBy="parent")
     */
    private $children;

    /**
     * Textes du groupe
     *
     * @ORM\OneToMany(targetEntity="Text", mappedBy="text_group")
     */
    private $texts;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();

        $this->children = new ArrayCollection();
        $this->texts = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param TextGroup $parent
     */
    public function setParent(TextGroup $parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return ArrayCollection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param TextGroup $child
     */
    public function addChild(TextGroup $child)
    {
        $this->children[] = $child;
        $child->setParent($this);
    }

    /**
     * @return ArrayCollection
     */
    public function getTexts()
    {
        return $this->texts;
    }

    /**
     * @param Text $item
     */
    public function addText(Text $item)
    {
        $this->texts[] = $item;
        $item->setTextGroup($this);
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return (string)$this->getDesignation();
    }

}
