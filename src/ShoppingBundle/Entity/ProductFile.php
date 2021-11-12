<?php

namespace Shopping\Entity;

use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\TranslatableTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="Shopping\Repository\ProductFileRepository")
 * @ORM\Table(name="shopping_product_file")
 */
class ProductFile
{
    use TranslatableTrait;
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="product_files")
     * @ORM\JoinColumn(name="product", referencedColumnName="id", nullable=true)
     */
    private $product;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $document;

    /**
     * @Vich\UploadableField(mapping="files", fileNameProperty="file")
     * @var File
     */
    private $documentFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $language;

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
    public function getLanguage()
    {
        return json_decode($this->language);
    }

    /**
     * @param mixed $language
     */
    public function setLanguage($language)
    {
        $this->language = json_encode($language);
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param mixed $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * @return string
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @param string $document
     */
    public function setDocument($document)
    {
        $this->document = $document;
    }

    /**
     * @return File
     */
    public function getDocumentFile()
    {
        return $this->documentFile;
    }

    /**
     * @param $documentFile
     * @throws \Exception
     */
    public function setDocumentFile($documentFile)
    {
        $this->documentFile = $documentFile;

        if ($documentFile) {
            $this->setUpdatedAt(new \DateTime('now'));
        }
    }

}
