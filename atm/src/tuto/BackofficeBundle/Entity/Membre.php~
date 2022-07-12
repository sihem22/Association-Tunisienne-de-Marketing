<?php

namespace tuto\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Membre
 *
 * @ORM\Table(name="membre")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\MembreRepository")
 *@ORM\HasLifecycleCallbacks 
 */
class Membre
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="universite", type="string", length=255 , nullable=true)
     */
    private $universite;
     /**
     * @var string
     *
     * @ORM\Column(name="university", type="string", length=255, nullable=true)
     */
    private $university;
     /**
     * @var string
     *
     * @ORM\Column(name="FB", type="string", length=255, nullable=true)
     */
    private $FB;
    /**
     * @var string
     *
     * @ORM\Column(name="twitter", type="string", length=255, nullable=true)
     */
    private $twitter;
     /**
     * @var string
     *
     * @ORM\Column(name="linkedin", type="string", length=255, nullable=true)
     */
    private $linkedin;

     /**
     * @var \DateTime
     * 
     * @ORM\COlumn(name="updated_at",type="datetime", nullable=true) 
     */
    private $updateAt;
    
    /**
     * @ORM\PostLoad()
     */
    public function postLoad()
    {
        $this->updateAt = new \DateTime();
    }
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    
    public $path;
    public $Image;
  

    public function getUploadRootDir() {
        return __Dir__ . '/../../../../web/uploads/membresci';
    }

    public function getAbsolutePath() {
        return null === $this->path ? null : $this->getUploadRootDir() . '/' . $this->path;
    }
    
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload() {
        $this->tempfile = $this->getAbsolutePath();
        $this->oldfile = $this->getPath();
        if (null !== $this->Image)
            $this->path = sha1(uniqid(mt_rand(), TRUE)) . '.' . $this->Image->guessExtension();
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function Upload() {
        if (null !== $this->Image) {
            $this->Image->move($this->getUploadRootDir(), $this->path);
            unset($this->Image);
            if ($this->oldfile != null)
                unlink($this->tempfile);
        }
    }
    

    /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload() {
        $this->tempFile = $this->getAbsolutePath();
    }
    public function getAssetPath(){
        return 'uploads/membresci/'.$this->path;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload() {
        if (file_exists($this->tempFile))
            unlink($this->tempFile);
    }




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
     * Set nom
     *
     * @param string $nom
     *
     * @return Membre
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set universite
     *
     * @param string $universite
     *
     * @return Membre
     */
    public function setUniversite($universite)
    {
        $this->universite = $universite;

        return $this;
    }

    /**
     * Get universite
     *
     * @return string
     */
    public function getUniversite()
    {
        return $this->universite;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Membre
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }


    /**
     * Set FB
     *
     * @param string $fB
     * @return Membre
     */
    public function setFB($fB)
    {
        $this->FB = $fB;

        return $this;
    }

    /**
     * Get FB
     *
     * @return string 
     */
    public function getFB()
    {
        return $this->FB;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     * @return Membre
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
     * Set linkedin
     *
     * @param string $linkedin
     * @return Membre
     */
    public function setLinkedin($linkedin)
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    /**
     * Get linkedin
     *
     * @return string 
     */
    public function getLinkedin()
    {
        return $this->linkedin;
    }

    /**
     * Set university
     *
     * @param string $university
     * @return Membre
     */
    public function setUniversity($university)
    {
        $this->university = $university;

        return $this;
    }

    /**
     * Get university
     *
     * @return string 
     */
    public function getUniversity()
    {
        return $this->university;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     * @return Membre
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * Get updateAt
     *
     * @return \DateTime 
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }
}
