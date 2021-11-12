<?php

namespace Core\Entity;

use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\TranslatableTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Configuration principale de l'application
 *
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="Core\Repository\VideoRepository")
 * @ORM\Table(name="core_video")
 */
class Video
{
    use TranslatableTrait;
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Référence unique de la catégorie
     *
     * @ORM\Column(type="string", length=255)
     */
    private $reference;

    /**
     * Video de la catégorie
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $video;

    /**
     * @Vich\UploadableField(mapping="videos", fileNameProperty="video")
     * @var File
     */
    private $videoFile;

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();

        $this->setReference(uniqid());
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
     * @return string
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * @param string $video
     */
    public function setVideo(string $video)
    {
        $this->video = $video;
    }

    /**
     * @return File
     */
    public function getVideoFile()
    {
        return $this->videoFile;
    }

    /**
     * @param File $videoFile
     * @throws \Exception
     */
    public function setVideoFile(File $videoFile)
    {
        $this->videoFile = $videoFile;

        if ($videoFile) {
            $this->setUpdatedAt(new \DateTime('now'));
        }
    }

}
