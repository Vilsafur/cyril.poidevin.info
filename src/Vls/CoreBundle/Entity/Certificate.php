<?php

namespace Vls\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Certificate
 *
 * @ORM\Table(name="vls_certificate")
 * @ORM\Entity(repositoryClass="Vls\CoreBundle\Repository\CertificateRepository")
 */
class Certificate
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="certifier", type="string", length=255)
     */
    private $certifier;

    protected $file;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Certificate
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Certificate
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set certifier
     *
     * @param string $certifier
     *
     * @return Certificate
     */
    public function setCertifier($certifier)
    {
        $this->certifier = $certifier;

        return $this;
    }

    /**
     * Get certifier
     *
     * @return string
     */
    public function getCertifier()
    {
        return $this->certifier;
    }

    /**
     * Get file
     *
     * @return file
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set file
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * upload
     */
    public function upload()
    {
        if (null === $this->file) {
          return;
        }

        $name = $this->file->getClientOriginalName();

        $this->file->move($this->getUploadRootDir(), $name);

        $this->url = $name;
    }

    public function getUploadDir()
    {
        return 'certificates';
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
}
