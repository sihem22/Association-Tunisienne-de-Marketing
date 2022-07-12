<?php

namespace tuto\BackofficeBundle\Entity;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * Slider
 *
 * @ORM\Table(name="slider")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\SliderRepository")
 * @ORM\HasLifecycleCallbacks 
 */
class Slider
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
        return __Dir__ . '/../../../../web/uploads/slider';
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
        return 'uploads/slider/'.$this->path;
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
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set path
     *
     * @param string $path
     * @return Slider
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
     * Set updateAt
     *
     * @param \DateTime $updateAt
     * @return Slider
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
