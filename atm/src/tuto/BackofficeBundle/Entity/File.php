<?php

namespace tuto\BackofficeBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;

/**
 * Soumission
 *
 * @ORM\Table(name="file")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\FileRepository")
 * @ORM\HasLifecycleCallbacks 
 */
class File
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
    public $path1;
    public $file1;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path2;
    public $file2;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path3;
    public $file3;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path4;
    public $file4;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path5;
    public $file5;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path6;
    public $file6;

    public function getUploadRootDir() {
        return __Dir__ . '/../../../../web/uploads/file1';
    }
    public function getUploadRootDir1() {
        return __Dir__ . '/../../../../web/uploads/file2';
    }
    public function getUploadRootDir2() {
        return __Dir__ . '/../../../../web/uploads/file3';
    }
     public function getUploadRootDir3() {
        return __Dir__ . '/../../../../web/uploads/file4';
    }
      public function getUploadRootDir4() {
        return __Dir__ . '/../../../../web/uploads/file5';
    }
     public function getUploadRootDir5() {
        return __Dir__ . '/../../../../web/uploads/file6';
    }

    public function getAbsolutePath() {
        return null === $this->path1 ? null : $this->getUploadRootDir() . '/' . $this->path1;
        
    }
    public function getAbsolutePath1() {
        
        return null === $this->path2 ? null : $this->getUploadRootDir1() . '/' . $this->path2;
    }
     public function getAbsolutePath2() {
        
        return null === $this->path3 ? null : $this->getUploadRootDir2() . '/' . $this->path3;
    }
     public function getAbsolutePath3() {
        
        return null === $this->path4 ? null : $this->getUploadRootDir3() . '/' . $this->path4;
    }
      public function getAbsolutePath4() {
        
        return null === $this->path5 ? null : $this->getUploadRootDir4() . '/' . $this->path5;
    }
      public function getAbsolutePath5() {
        
        return null === $this->path6 ? null : $this->getUploadRootDir5() . '/' . $this->path6;
    }
    
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload() {
        $this->tempfile = $this->getAbsolutePath();
        $this->oldfile = $this->getPath1();
        if (null !== $this->file1)
            $this->path1 = sha1(uniqid(mt_rand(), TRUE)) . '.' . $this->file1->guessExtension();
        
    }
       /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload1() {
        $this->tempfile = $this->getAbsolutePath1();
        $this->oldfile = $this->getPath2();
        if (null !== $this->file2)
    $this->path2 = sha1(uniqid(mt_rand(), TRUE)) . '.' . $this->file2->guessExtension();}
       /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload2() {
        $this->tempfile = $this->getAbsolutePath2();
        $this->oldfile = $this->getPath3();
        if (null !== $this->file3)
    $this->path3 = sha1(uniqid(mt_rand(), TRUE)) . '.' . $this->file3->guessExtension();}
       /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload3() {
        $this->tempfile = $this->getAbsolutePath3();
        $this->oldfile = $this->getPath4();
        if (null !== $this->file4)
    $this->path4 = sha1(uniqid(mt_rand(), TRUE)) . '.' . $this->file4->guessExtension();}
      /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload4() {
        $this->tempfile = $this->getAbsolutePath4();
        $this->oldfile = $this->getPath5();
        if (null !== $this->file5)
    $this->path5 = sha1(uniqid(mt_rand(), TRUE)) . '.' . $this->file5->guessExtension();}
     /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload5() {
        $this->tempfile = $this->getAbsolutePath5();
        $this->oldfile = $this->getPath6();
        if (null !== $this->file6)
    $this->path6 = sha1(uniqid(mt_rand(), TRUE)) . '.' . $this->file6->guessExtension();}

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function Upload() {
        if (null !== $this->file1) {
            $this->file1->move($this->getUploadRootDir(), $this->path1);
            unset($this->file1);
            if ($this->oldfile != null)
                unlink($this->tempfile);
        }
    }
    
    
    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function Upload1() {
        if (null !== $this->file2) {
            $this->file2->move($this->getUploadRootDir1(), $this->path2);
            unset($this->file2);
            if ($this->oldfile != null)
                unlink($this->tempfile);
        }
    }
      /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function Upload2() {
        if (null !== $this->file3) {
            $this->file3->move($this->getUploadRootDir2(), $this->path3);
            unset($this->file3);
            if ($this->oldfile != null)
                unlink($this->tempfile);
        }
    }
       /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function Upload3() {
        if (null !== $this->file4) {
            $this->file4->move($this->getUploadRootDir3(), $this->path4);
            unset($this->file4);
            if ($this->oldfile != null)
                unlink($this->tempfile);
        }
    }
      /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function Upload4() {
        if (null !== $this->file5) {
            $this->file5->move($this->getUploadRootDir4(), $this->path5);
            unset($this->file5);
            if ($this->oldfile != null)
                unlink($this->tempfile);
        }
    }

      /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function Upload5() {
        if (null !== $this->file6) {
            $this->file6->move($this->getUploadRootDir5(), $this->path6);
            unset($this->file6);
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
      /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload1() {
        $this->tempFile = $this->getAbsolutePath1();
    }
      /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload2() {
        $this->tempFile = $this->getAbsolutePath2();
    }
      /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload3() {
        $this->tempFile = $this->getAbsolutePath3();
    }
      /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload4() {
        $this->tempFile = $this->getAbsolutePath4();
    }
       /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload5() {
        $this->tempFile = $this->getAbsolutePath5();
    }
    public function getAssetPath(){
        return 'uploads/file1/'.$this->path1;
        
    }
    public function getAssetPath1(){
    return 'uploads/file2/'.$this->path2;}
     public function getAssetPath2(){
    return 'uploads/file3/'.$this->path3;}
      public function getAssetPath3(){
    return 'uploads/file4/'.$this->path4;}
      public function getAssetPath4(){
    return 'uploads/file5/'.$this->path5;}
      public function getAssetPath5(){
    return 'uploads/file6/'.$this->path6;}

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
     * Set updateAt
     *
     * @param \DateTime $updateAt
     * @return File
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

    /**
     * Set path1
     *
     * @param string $path1
     * @return File
     */
    public function setPath1($path1)
    {
        $this->path1 = $path1;

        return $this;
    }

    /**
     * Get path1
     *
     * @return string 
     */
    public function getPath1()
    {
        return $this->path1;
    }

    /**
     * Set path2
     *
     * @param string $path2
     * @return File
     */
    public function setPath2($path2)
    {
        $this->path2 = $path2;

        return $this;
    }

    /**
     * Get path2
     *
     * @return string 
     */
    public function getPath2()
    {
        return $this->path2;
    }

    /**
     * Set path3
     *
     * @param string $path3
     * @return File
     */
    public function setPath3($path3)
    {
        $this->path3 = $path3;

        return $this;
    }

    /**
     * Get path3
     *
     * @return string 
     */
    public function getPath3()
    {
        return $this->path3;
    }

    /**
     * Set path4
     *
     * @param string $path4
     * @return File
     */
    public function setPath4($path4)
    {
        $this->path4 = $path4;

        return $this;
    }

    /**
     * Get path4
     *
     * @return string 
     */
    public function getPath4()
    {
        return $this->path4;
    }

    /**
     * Set path5
     *
     * @param string $path5
     * @return File
     */
    public function setPath5($path5)
    {
        $this->path5 = $path5;

        return $this;
    }

    /**
     * Get path5
     *
     * @return string 
     */
    public function getPath5()
    {
        return $this->path5;
    }

    /**
     * Set path6
     *
     * @param string $path6
     * @return File
     */
    public function setPath6($path6)
    {
        $this->path6 = $path6;

        return $this;
    }

    /**
     * Get path6
     *
     * @return string 
     */
    public function getPath6()
    {
        return $this->path6;
    }
}
