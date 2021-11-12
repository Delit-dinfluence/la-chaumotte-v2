<?php

namespace Core\Entity;

use Core\Entity\Traits\EntityTrait;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Enumération des différents thèmes de l'administration
 */
abstract class DesignThemeType extends Enum
{
    const BASIC = 0;
    const RESPONSIVE = 1;
    const OS = 2;

    /**
     * Nom d'affichage
     */
    protected static $typeName = [
        self::BASIC => 'Standard',
    ];

    /**
     * Nom utilisé par l'application
     */
    protected static $keyName = [
        self::BASIC => 'basique',
        self::RESPONSIVE => 'responsive',
        self::OS => 'os',
    ];

}

/**
 * Enumération des différentes base de tailles de texte
 */
abstract class DesignFontSize extends Enum
{
    const TWELVE = 0;
    const FOURTEEN = 1;
    const SIXTEEN = 2;
    const EIGHTEEN = 3;
    const TWENTY = 4;

    /**
     * Nom d'affichage
     */
    public static $typeName = [
        self::TWELVE => '12',
        self::FOURTEEN => '14',
        self::SIXTEEN => '16',
        self::EIGHTEEN => '18',
        self::TWENTY => '20',
    ];

    /**
     * Nom utilisé par l'application
     */
    public static $keyName = [
        self::TWELVE => '12px',
        self::FOURTEEN => '14px',
        self::SIXTEEN => '16px',
        self::EIGHTEEN => '18px',
        self::TWENTY => '20px',
    ];

}

/**
 * Enumération des différentes polices
 */
abstract class DesignFontFamilyType extends Enum
{
    const ROBOTO = 0;
    const ROBOTO_SLAB = 1;
    const LATO = 2;
    const COMING_SOON = 3;
    const OPEN_SANS = 4;
    const MONTSERRAT = 5;

    /**
     * Nom d'affichage
     */
    public static $typeName = [
        self::ROBOTO => 'Roboto',
        self::ROBOTO_SLAB => 'Roboto Slab',
        self::LATO => 'Lato',
        self::COMING_SOON => 'Coming Soon',
        self::OPEN_SANS => 'Open Sans',
        self::MONTSERRAT => 'Montserrat',
    ];

    /**
     * Nom utilisé par l'application dans les liens
     */
    public static $typeLink = [
        self::ROBOTO => 'Roboto',
        self::ROBOTO_SLAB => 'Roboto+Slab',
        self::LATO => 'Lato',
        self::COMING_SOON => 'Coming+Soon',
        self::OPEN_SANS => 'Open+Sans',
        self::MONTSERRAT => 'Montserrat',
    ];

    /**
     * Nom utilisé par l'application dans le .css
     */
    public static $typeStyle = [
        self::ROBOTO => "'Roboto', sans-serif",
        self::ROBOTO_SLAB => "'Roboto Slab', serif",
        self::LATO => "'Lato', sans-serif",
        self::COMING_SOON => "'Coming Soon', cursive",
        self::OPEN_SANS => "'Open Sans', sans-serif",
        self::MONTSERRAT => "'Montserrat', sans-serif",
    ];

}

/**
 * Configuration de design de l'administration
 *
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="Core\Repository\DesignRepository")
 * @ORM\Table(name="core_design")
 */
class Design
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Nom de l'espace d'administration
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * Logo de l'administration
     *
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
     * Thème de l'administration (Basique, Responsive, OS, ...)
     *
     * @ORM\Column(type="integer")
     */
    private $theme;

    /**
     * Police
     *
     * @ORM\Column(type="integer")
     */
    private $font_family;

    /**
     * Taille du texte
     *
     * @ORM\Column(type="integer")
     */
    private $font_size;

    /**
     * Couleur principale
     *
     * @ORM\Column(type="string", length=255)
     */
    private $color_first;

    /**
     * Couleur secondaire
     *
     * @ORM\Column(type="string", length=255)
     */
    private $color_second;

    /**
     * Couleur du texte par defaut
     *
     * @ORM\Column(type="string", length=255)
     */
    private $text_color;

    /**
     * Couleur du fond
     *
     * @ORM\Column(type="string", length=255)
     */
    private $background;

    /**
     * Couleur du fond des sidebars
     *
     * @ORM\Column(type="string", length=255)
     */
    private $sidebar_background;

    /**
     * Couleur du texte des sidebars
     *
     * @ORM\Column(type="string", length=255)
     */
    private $sidebar_color;

    /**
     * Largeur des sidebars
     *
     * @ORM\Column(type="string", length=255)
     */
    private $sidebar_width;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
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
     * @throws \Exception
     */
    public function setLogoFile(File $logoFile)
    {
        $this->logoFile = $logoFile;

        if ($logoFile) {
            $this->setUpdatedAt(new \DateTime('now'));
        }
    }

    /**
     * @return mixed
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * @param mixed $theme
     */
    public function setTheme($theme): void
    {
        $this->theme = $theme;
    }

    /**
     * @return mixed
     */
    public function getFontFamily()
    {
        return $this->font_family;
    }

    /**
     * @param mixed $font_family
     */
    public function setFontFamily($font_family): void
    {
        $this->font_family = $font_family;
    }

    /**
     * @return mixed
     */
    public function getFontSize()
    {
        return $this->font_size;
    }

    /**
     * @param mixed $font_size
     */
    public function setFontSize($font_size): void
    {
        $this->font_size = $font_size;
    }

    /**
     * @return mixed
     */
    public function getColorFirst()
    {
        return $this->color_first;
    }

    /**
     * @param mixed $color_first
     */
    public function setColorFirst($color_first): void
    {
        $this->color_first = $color_first;
    }

    /**
     * @return mixed
     */
    public function getColorSecond()
    {
        return $this->color_second;
    }

    /**
     * @param mixed $color_second
     */
    public function setColorSecond($color_second): void
    {
        $this->color_second = $color_second;
    }

    /**
     * @return mixed
     */
    public function getTextColor()
    {
        return $this->text_color;
    }

    /**
     * @param mixed $text_color
     */
    public function setTextColor($text_color): void
    {
        $this->text_color = $text_color;
    }

    /**
     * @return mixed
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * @param mixed $background
     */
    public function setBackground($background): void
    {
        $this->background = $background;
    }

    /**
     * @return mixed
     */
    public function getSidebarBackground()
    {
        return $this->sidebar_background;
    }

    /**
     * @param mixed $sidebar_background
     */
    public function setSidebarBackground($sidebar_background): void
    {
        $this->sidebar_background = $sidebar_background;
    }

    /**
     * @return mixed
     */
    public function getSidebarColor()
    {
        return $this->sidebar_color;
    }

    /**
     * @param mixed $sidebar_color
     */
    public function setSidebarColor($sidebar_color): void
    {
        $this->sidebar_color = $sidebar_color;
    }

    /**
     * @return mixed
     */
    public function getSidebarWidth()
    {
        return $this->sidebar_width;
    }

    /**
     * @param mixed $sidebar_width
     */
    public function setSidebarWidth($sidebar_width): void
    {
        $this->sidebar_width = $sidebar_width;
    }

    /**
     * Retourne la police utilisée par les liens
     */
    public function getFontFamilyLink(){
        return DesignFontFamilyType::$typeLink[$this->getFontFamily()];
    }

    /**
     * Retourne la police utilisée par les .css
     */
    public function getFontFamilyStyle(){
        return DesignFontFamilyType::$typeStyle[$this->getFontFamily()];
    }

    /**
     * Retourne la taille de texte utilisée par les .css
     */
    public function getFontSizeStyle(){
        return DesignFontSize::$keyName[$this->getFontSize()];
    }

}
