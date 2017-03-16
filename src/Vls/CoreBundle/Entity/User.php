<?php

namespace Vls\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class User
 * @package Vls\CoreBundle\Entity
 * @ORM\Table(name="vls_user")
 * @ORM\Entity(repositoryClass="Vls\CoreBundle\Repository\UserRepository")
 */
class User extends BaseUser
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @var
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     */
    protected $firstname;

    /**
     * @var
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     */
    protected $lastname;

    /**
     * @var
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    protected $title;

    /**
     * @var
     *
     * @ORM\Column(name="avatar", type="string", length=255, nullable=true)
     */
    protected $avatar;

    /**
     * @var
     *
     * @ORM\Column(name="about", type="text", nullable=true)
     */
    protected $about;

    /**
     * @var
     *
     * @ORM\Column(name="aboutImage", type="string", length=255, nullable=true)
     */
    protected $aboutImage;

    /**
     * @var
     *
     * @ORM\Column(name="intro", type="text", nullable=true)
     */
    protected $intro;

    /**
     * @var
     *
     * @ORM\Column(name="portfolio", type="text", nullable=true)
     */
    protected $portfolio;

    /**
     * @var
     *
     * @ORM\Column(name="contact", type="text", nullable=true)
     */
    protected $contact;

    /**
     * @var
     *
     * @ORM\Column(name="facebook", type="string", length=255, nullable=true)
     */
    protected $facebook;

    /**
     * @var
     *
     * @ORM\Column(name="twitter", type="string", length=255, nullable=true)
     */
    protected $twitter;

    /**
     * @var
     *
     * @ORM\Column(name="github", type="string", length=255, nullable=true)
     */
    protected $github;

    /**
     * @var
     *
     * @ORM\Column(name="dribbble", type="string", length=255, nullable=true)
     */
    protected $dribbble;

    protected $fileAboutImage;
    protected $fileAvatar;

    /**
     * @return mixed
     */
    public function getFullname()
    {
        return $this->firstname . ' ' . $this->getLastname();
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return User
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
     * Set about
     *
     * @param string $about
     *
     * @return User
     */
    public function setAbout($about)
    {
        $this->about = $about;

        return $this;
    }

    /**
     * Get about
     *
     * @return string
     */
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * Set aboutImage
     *
     * @param string $aboutImage
     *
     * @return User
     */
    public function setAboutImage($aboutImage)
    {
        $this->aboutImage = $aboutImage;

        return $this;
    }

    /**
     * Get aboutImage
     *
     * @return string
     */
    public function getAboutImage()
    {
        return $this->aboutImage;
    }

    /**
     * Set intro
     *
     * @param string $intro
     *
     * @return User
     */
    public function setIntro($intro)
    {
        $this->intro = $intro;

        return $this;
    }

    /**
     * Get intro
     *
     * @return string
     */
    public function getIntro()
    {
        return $this->intro;
    }

    /**
     * Set portfolio
     *
     * @param string $portfolio
     *
     * @return User
     */
    public function setPortfolio($portfolio)
    {
        $this->portfolio = $portfolio;

        return $this;
    }

    /**
     * Get portfolio
     *
     * @return string
     */
    public function getPortfolio()
    {
        return $this->portfolio;
    }

    /**
     * Set contact
     *
     * @param string $contact
     *
     * @return User
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     *
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     *
     * @return User
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     *
     * @return User
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get twitter
     *
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set github
     *
     * @param string $github
     *
     * @return User
     */
    public function setGithub($github)
    {
        $this->github = $github;

        return $this;
    }

    /**
     * Get github
     *
     * @return string
     */
    public function getGithub()
    {
        return $this->github;
    }

    /**
     * Set dribbble
     *
     * @param string $dribbble
     *
     * @return User
     */
    public function setDribbble($dribbble)
    {
        $this->dribbble = $dribbble;

        return $this;
    }

    /**
     * Get dribbble
     *
     * @return string
     */
    public function getDribbble()
    {
        return $this->dribbble;
    }

    public function getFileAboutImage()
    {
        return $this->fileAboutImage;
    }

    public function setFileAboutImage(UploadedFile $file = null)
    {
        $this->fileAboutImage = $file;
    }


    public function uploadAboutImage()
    {
        if (null === $this->fileAboutImage) {
          return;
        }

        $name = $this->fileAboutImage->getClientOriginalName();

        $this->fileAboutImage->move($this->getUploadRootDir(), $name);

        $this->aboutImage = $name;
    }

    public function getFileAvatar()
    {
        return $this->fileAvatar;
    }

    public function setFileAvatar(UploadedFile $file = null)
    {
        $this->fileAvatar = $file;
    }


    public function uploadAvatar()
    {
        if (null === $this->fileAvatar) {
          return;
        }

        $name = $this->fileAvatar->getClientOriginalName();

        $this->fileAvatar->move($this->getUploadRootDir(), $name);

        $this->avatar = $name;
    }

    public function getUploadDir()
    {
        return 'img';
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
}
