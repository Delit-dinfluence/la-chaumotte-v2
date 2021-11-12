<?php

namespace Core\Entity\Traits;

use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

trait PageTrait
{
    /**
     * Clé unique
     *
     * @ORM\Column(type="string", length=255)
     */
    private $unique_key;

    /**
     * Statistiques sur le nombre de vue de la page
     *
     * @ORM\Column(type="integer")
     */
    private $statistic_number_views;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_indexable;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $priority;

    /**
     * Nom de l'URL de la page
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $path_name;

    /**
     * URL de la page
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $path_uri;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $twitter;

    /**
     * @Vich\UploadableField(mapping="images", fileNameProperty="twitter")
     * @var File
     */
    private $twitterFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $facebook;

    /**
     * @Vich\UploadableField(mapping="images", fileNameProperty="facebook")
     * @var File
     */
    private $facebookFile;

    /**
     * Constructeur
     *
     * @param string $unique_key
     */
    public function __construct($unique_key = 'SETTINGS')
    {
        $this->setUniqueKey($unique_key);
        $this->setStatisticNumberViews(0);
    }

    /**
     * @return mixed
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param mixed $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * @return mixed
     */
    public function getIsIndexable()
    {
        return $this->is_indexable;
    }

    /**
     * @param mixed $is_indexable
     */
    public function setIsIndexable($is_indexable)
    {
        $this->is_indexable = $is_indexable;
    }

    /**
     * @return mixed
     */
    public function getUniqueKey()
    {
        return $this->unique_key;
    }

    /**
     * @param mixed $unique_key
     */
    public function setUniqueKey($unique_key)
    {
        $this->unique_key = $unique_key;
    }

    /**
     * @return mixed
     */
    public function getStatisticNumberViews()
    {
        return $this->statistic_number_views;
    }

    /**
     * @param mixed $statistic_number_views
     */
    public function setStatisticNumberViews($statistic_number_views)
    {
        $this->statistic_number_views = $statistic_number_views;
    }

    /**
     * @return mixed
     */
    public function getPathName()
    {
        return $this->path_name;
    }

    /**
     * @param mixed $path_name
     */
    public function setPathName($path_name): void
    {
        $this->path_name = $path_name;
    }

    /**
     * @return mixed
     */
    public function getPathUri()
    {
        return $this->path_uri;
    }

    /**
     * @param mixed $path_uri
     */
    public function setPathUri($path_uri): void
    {
        $this->path_uri = $path_uri;
    }

    /**
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * @param string $twitter
     */
    public function setTwitter(string $twitter)
    {
        $this->twitter = $twitter;
    }

    /**
     * @return File
     */
    public function getTwitterFile()
    {
        return $this->twitterFile;
    }

    /**
     * @param File $twitterFile
     * @throws \Exception
     */
    public function setTwitterFile(File $twitterFile)
    {
        $this->twitterFile = $twitterFile;

        if ($twitterFile) {
            $this->setUpdatedAt(new \DateTime('now'));
        }
    }

    /**
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @param string $facebook
     */
    public function setFacebook(string $facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * @return File
     */
    public function getFacebookFile()
    {
        return $this->facebookFile;
    }

    /**
     * @param File $facebookFile
     * @throws \Exception
     */
    public function setFacebookFile(File $facebookFile)
    {
        $this->facebookFile = $facebookFile;

        if ($facebookFile) {
            $this->setUpdatedAt(new \DateTime('now'));
        }
    }

}
