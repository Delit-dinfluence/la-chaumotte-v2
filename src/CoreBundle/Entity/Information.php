<?php

namespace Core\Entity;

use Core\Entity\Traits\EntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Information sur l'application
 *
 * @ORM\Entity(repositoryClass="Core\Repository\InformationRepository")
 * @ORM\Table(name="core_information")
 */
class Information
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }
    /**
     * Date de livraison de l'application
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $delivery_at;

    /**
     * Contenu de la dernière modification
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $last_update_content;

    /**
     * Utilisation du module "Shopping"
     *
     * @ORM\Column(type="boolean")
     */
    private $use_module_shopping;

    /**
     * Utilisation du module "Blog"
     *
     * @ORM\Column(type="boolean")
     */
    private $use_module_blog;

    /**
     * Utilisation du module "Bibliothèque"
     *
     * @ORM\Column(type="boolean")
     */
    private $use_module_library;

    /**
     * Utilisation du module "Calendrier"
     *
     * @ORM\Column(type="boolean")
     */
    private $use_module_calendar;

    /**
     * Utilisation du module "Newsletter - SMS"
     *
     * @ORM\Column(type="boolean")
     */
    private $use_module_newsletter;

    /**
     * Utilisation du module "Coming soon"
     *
     * @ORM\Column(type="boolean")
     */
    private $use_module_coming_soon;

    /**
     * Utilisation du module "Language"
     *
     * @ORM\Column(type="boolean")
     */
    private $use_module_language;

    /**
     * Utilisation du module "Tableau de bord"
     *
     * @ORM\Column(type="boolean")
     */
    private $use_module_dashboard;

    /**
     * Utilisation du module "Statistiques"
     *
     * @ORM\Column(type="boolean")
     */
    private $use_module_statistics;

    /**
     * Utilisation du module "Utilisateurs"
     *
     * @ORM\Column(type="boolean")
     */
    private $use_module_users;

    /**
     * Utilisation du module "Média"
     *
     * @ORM\Column(type="boolean")
     */
    private $use_module_media;

    /**
     * Utilisation du module "Références"
     *
     * @ORM\Column(type="boolean")
     */
    private $use_module_reference;

    /**
     * Utilisation du module "Gallery"
     *
     * @ORM\Column(type="boolean")
     */
    private $use_module_gallery;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();

        $this->setUseModuleShopping(false);
        $this->setUseModuleCalendar(false);
        $this->setUseModuleLibrary(false);
        $this->setUseModuleBlog(false);
        $this->setUseModuleNewsletter(false);
        $this->setUseModuleComingSoon(false);
        $this->setUseModuleLanguage(false);
        $this->setUseModuleDashboard(false);
        $this->setUseModuleStatistics(false);
        $this->setUseModuleUsers(false);
        $this->setUseModuleMedia(false);
        $this->setUseModuleGallery(false);
        $this->setUseModuleReference(false);
    }

    /**
     * @return mixed
     */
    public function getUseModuleReference()
    {
        return $this->use_module_reference;
    }

    /**
     * @param mixed $use_module_reference
     */
    public function setUseModuleReference($use_module_reference): void
    {
        $this->use_module_reference = $use_module_reference;
    }

    /**
     * @return mixed
     */
    public function getUseModuleGallery()
    {
        return $this->use_module_gallery;
    }

    /**
     * @param mixed $use_module_gallery
     */
    public function setUseModuleGallery($use_module_gallery): void
    {
        $this->use_module_gallery = $use_module_gallery;
    }


    /**
     * @return mixed
     */
    public function getUseModuleMedia()
    {
        return $this->use_module_media;
    }

    /**
     * @param mixed $use_module_media
     */
    public function setUseModuleMedia($use_module_media): void
    {
        $this->use_module_media = $use_module_media;
    }


    /**
     * @return mixed
     */
    public function getUseModuleUsers()
    {
        return $this->use_module_users;
    }

    /**
     * @param mixed $use_module_users
     */
    public function setUseModuleUsers($use_module_users): void
    {
        $this->use_module_users = $use_module_users;
    }

    /**
     * @return mixed
     */
    public function getUseModuleStatistics()
    {
        return $this->use_module_statistics;
    }

    /**
     * @param mixed $use_module_statistics
     */
    public function setUseModuleStatistics($use_module_statistics): void
    {
        $this->use_module_statistics = $use_module_statistics;
    }


    /**
     * @return mixed
     */
    public function getUseModuleDashboard()
    {
        return $this->use_module_dashboard;
    }

    /**
     * @param mixed $use_module_dashboard
     */
    public function setUseModuleDashboard($use_module_dashboard): void
    {
        $this->use_module_dashboard = $use_module_dashboard;
    }

    /**
     * @return mixed
     */
    public function getDeliveryAt()
    {
        return $this->delivery_at;
    }

    /**
     * @param mixed $delivery_at
     */
    public function setDeliveryAt($delivery_at)
    {
        $this->delivery_at = $delivery_at;
    }

    /**
     * @return mixed
     */
    public function getLastUpdateContent()
    {
        return $this->last_update_content;
    }

    /**
     * @param mixed $last_update_content
     */
    public function setLastUpdateContent($last_update_content)
    {
        $this->last_update_content = $last_update_content;
    }

    /**
     * @return mixed
     */
    public function getUseModuleShopping()
    {
        return $this->use_module_shopping;
    }

    /**
     * @param mixed $use_module_shopping
     */
    public function setUseModuleShopping($use_module_shopping)
    {
        $this->use_module_shopping = $use_module_shopping;
    }

    /**
     * @return mixed
     */
    public function getUseModuleBlog()
    {
        return $this->use_module_blog;
    }

    /**
     * @param mixed $use_module_blog
     */
    public function setUseModuleBlog($use_module_blog)
    {
        $this->use_module_blog = $use_module_blog;
    }

    /**
     * @return mixed
     */
    public function getUseModuleLibrary()
    {
        return $this->use_module_library;
    }

    /**
     * @param mixed $use_module_library
     */
    public function setUseModuleLibrary($use_module_library)
    {
        $this->use_module_library = $use_module_library;
    }

    /**
     * @return mixed
     */
    public function getUseModuleCalendar()
    {
        return $this->use_module_calendar;
    }

    /**
     * @param mixed $use_module_calendar
     */
    public function setUseModuleCalendar($use_module_calendar)
    {
        $this->use_module_calendar = $use_module_calendar;
    }

    /**
     * @return mixed
     */
    public function getUseModuleNewsletter()
    {
        return $this->use_module_newsletter;
    }

    /**
     * @param mixed $use_module_newsletter
     */
    public function setUseModuleNewsletter($use_module_newsletter)
    {
        $this->use_module_newsletter = $use_module_newsletter;
    }

    /**
     * @return mixed
     */
    public function getUseModuleComingSoon()
    {
        return $this->use_module_coming_soon;
    }

    /**
     * @param mixed $use_module_coming_soon
     */
    public function setUseModuleComingSoon($use_module_coming_soon)
    {
        $this->use_module_coming_soon = $use_module_coming_soon;
    }

    /**
     * @return mixed
     */
    public function getUseModuleLanguage()
    {
        return $this->use_module_language;
    }

    /**
     * @param mixed $use_module_language
     */
    public function setUseModuleLanguage($use_module_language): void
    {
        $this->use_module_language = $use_module_language;
    }

    public function getAuthorizedModules()
    {
        $authorized_modules = [];

        if ($this->getUseModuleGallery()) $authorized_modules[] = 'gallery';
        if ($this->getUseModuleReference()) $authorized_modules[] = 'reference';
        if ($this->getUseModuleMedia()) $authorized_modules[] = 'media';
        if ($this->getUseModuleUsers()) $authorized_modules[] = 'users';
        if ($this->getUseModuleStatistics()) $authorized_modules[] = 'statistics';
        if ($this->getUseModuleDashboard()) $authorized_modules[] = 'dashboard';
        if ($this->getUseModuleBlog()) $authorized_modules[] = 'blog';
        if ($this->getUseModuleCalendar()) $authorized_modules[] = 'calendar';
        if ($this->getUseModuleLibrary()) $authorized_modules[] = 'library';
        if ($this->getUseModuleShopping()) $authorized_modules[] = 'shopping';
        if ($this->getUseModuleNewsletter()) $authorized_modules[] = 'newsletter';
        if ($this->getUseModuleComingSoon()) $authorized_modules[] = 'coming_soon';
        if ($this->getUseModuleLanguage()) $authorized_modules[] = 'language';

        return $authorized_modules;
    }
}
