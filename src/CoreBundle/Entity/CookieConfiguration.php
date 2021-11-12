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
 * @ORM\Entity(repositoryClass="Core\Repository\CookieConfigurationRepository")
 * @ORM\Table(name="core_cookie_configuration")
 */
class CookieConfiguration
{
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Désignation du type
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $google_analytics;

    /**
     * Désignation du type
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $add_this;

    /**
     * Désignation du type
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pixel_facebook;

    /**
     * Désignation du type
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $recaptcha_version;

    /**
     * Désignation du type
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $recaptcha_score;

    /**
     * Désignation du type
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $recaptcha_client;

    /**
     * Désignation du type
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $recaptcha_server;

    /**
     * Désignation du type
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $recaptcha_hostname;

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
    public function getRecaptchaScore()
    {
        return $this->recaptcha_score;
    }

    /**
     * @param mixed $recaptcha_score
     */
    public function setRecaptchaScore($recaptcha_score)
    {
        $this->recaptcha_score = $recaptcha_score;
    }

    /**
     * @return mixed
     */
    public function getRecaptchaVersion()
    {
        return $this->recaptcha_version;
    }

    /**
     * @param mixed $recaptcha_version
     */
    public function setRecaptchaVersion($recaptcha_version)
    {
        $this->recaptcha_version = $recaptcha_version;
    }

    /**
     * @return mixed
     */
    public function getRecaptchaHostname()
    {
        return $this->recaptcha_hostname;
    }

    /**
     * @param mixed $recaptcha_hostname
     */
    public function setRecaptchaHostname($recaptcha_hostname)
    {
        $this->recaptcha_hostname = $recaptcha_hostname;
    }


    /**
     * @return mixed
     */
    public function getGoogleAnalytics()
    {
        return $this->google_analytics;
    }

    /**
     * @param mixed $google_analytics
     */
    public function setGoogleAnalytics($google_analytics)
    {
        $this->google_analytics = $google_analytics;
    }

    /**
     * @return mixed
     */
    public function getAddThis()
    {
        return $this->add_this;
    }

    /**
     * @param mixed $add_this
     */
    public function setAddThis($add_this): void
    {
        $this->add_this = $add_this;
    }

    /**
     * @return mixed
     */
    public function getPixelFacebook()
    {
        return $this->pixel_facebook;
    }

    /**
     * @param mixed $pixel_facebook
     */
    public function setPixelFacebook($pixel_facebook): void
    {
        $this->pixel_facebook = $pixel_facebook;
    }

    /**
     * @return mixed
     */
    public function getRecaptchaClient()
    {
        return $this->recaptcha_client;
    }

    /**
     * @param mixed $recaptcha_client
     */
    public function setRecaptchaClient($recaptcha_client): void
    {
        $this->recaptcha_client = $recaptcha_client;
    }

    /**
     * @return mixed
     */
    public function getRecaptchaServer()
    {
        return $this->recaptcha_server;
    }

    /**
     * @param mixed $recaptcha_server
     */
    public function setRecaptchaServer($recaptcha_server): void
    {
        $this->recaptcha_server = $recaptcha_server;
    }


}
