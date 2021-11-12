<?php

namespace Core\Entity;

use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\TranslatableTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Enumération des types de traduction
 */
abstract class TextPrintType extends Enum
{
    const STRING = 0;
    const TEXTAREA = 1;
    const TEXTAREA_WYSIWYG = 2;

    /**
     * Nom d'affichage
     */
    protected static $typeName = [
        self::STRING => 'Phrase',
        self::TEXTAREA => 'Texte',
        self::TEXTAREA_WYSIWYG => 'Texte (avec mise en forme)'
    ];

}

/**
 * Traduction de l'application
 *
 * @ORM\Entity(repositoryClass="Core\Repository\TextRepository")
 * @ORM\Table(name="core_text")
 */
class Text
{
    use TranslatableTrait;
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Référence
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $reference;

    /**
     * Type de traduction (String, Texte, WYSIWYG, ...)
     *
     * @ORM\Column(type="integer")
     */
    protected $type;

    /**
     * Groupe du texte (Navigation, Pieds de page, Page, ...)
     *
     * @ORM\ManyToOne(targetEntity="TextGroup", inversedBy="texts")
     * @ORM\JoinColumn(name="text_group", referencedColumnName="id", nullable=true)
     */
    protected $text_group;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();

        $this->setType(TextPrintType::STRING);
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $reference
     */
    public function setReference($reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getTextGroup()
    {
        return $this->text_group;
    }

    /**
     * @param mixed $text_group
     */
    public function setTextGroup($text_group): void
    {
        $this->text_group = $text_group;
    }

}
