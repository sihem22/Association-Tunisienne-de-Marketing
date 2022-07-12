<?php

namespace tuto\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EvaluationFinal
 *
 * @ORM\Table(name="evaluation_final")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\EvaluationFinalRepository")
 * @ORM\HasLifecycleCallbacks 
 */
class EvaluationFinal
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
     * @ORM\Column(name="Note", type="string", length=255, nullable=true)
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="Resultat", type="string", length=255)
     */
    private $resultat;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEvaluation", type="datetime")
     */
    private $dateEvaluationfinal;
    
     /**
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Soumission", inversedBy="evaluationfinal")
     * @ORM\JoinColumn(name="soumission_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $soumission;
       /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Etat")
     * @ORM\JoinColumn(name="IdEtatEvaluationFinal", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $etat;
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

    public function getUploadRootDir() {
        return __Dir__ . '/../../../../web/uploads/evaluation1';
    }
    public function getUploadRootDir1() {
        return __Dir__ . '/../../../../web/uploads/evaluation2';
    }
    public function getUploadRootDir2() {
        return __Dir__ . '/../../../../web/uploads/evaluation3';
    }

    public function getAbsolutePath() {
        return null === $this->path1 ? null : $this->getUploadRootDir() . '/' . $this->path1;
        
    }
    public function getAbsolutePath1() {
        
        return null === $this->path2 ? null : $this->getUploadRootDir1() . '/' . $this->path2;
    }
    public function getAbsolutePath2() {
        
        return null === $this->path3 ? null : $this->getUploadRootDir1() . '/' . $this->path3;
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
    public function getAssetPath(){
        return 'uploads/evaluation1/'.$this->path1;
        
    }
    public function getAssetPath1(){
    return 'uploads/evaluation2/'.$this->path2;}
    public function getAssetPath2(){
    return 'uploads/evaluation3/'.$this->path3;}

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
     * Set note
     *
     * @param string $note
     * @return EvaluationFinal
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set resultat
     *
     * @param string $resultat
     * @return EvaluationFinal
     */
    public function setResultat($resultat)
    {
        $this->resultat = $resultat;

        return $this;
    }

    /**
     * Get resultat
     *
     * @return string 
     */
    public function getResultat()
    {
        return $this->resultat;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     * @return EvaluationFinal
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
     * @return EvaluationFinal
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
     * @return EvaluationFinal
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
     * @return EvaluationFinal
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
     * Set dateEvaluationfinal
     *
     * @param \DateTime $dateEvaluationfinal
     * @return EvaluationFinal
     */
    public function setDateEvaluationfinal($dateEvaluationfinal)
    {
        $this->dateEvaluationfinal = $dateEvaluationfinal;

        return $this;
    }

    /**
     * Get dateEvaluationfinal
     *
     * @return \DateTime 
     */
    public function getDateEvaluationfinal()
    {
        return $this->dateEvaluationfinal;
    }

    

    /**
     * Set soumission
     *
     * @param \tuto\BackofficeBundle\Entity\Soumission $soumission
     * @return EvaluationFinal
     */
    public function setSoumission(\tuto\BackofficeBundle\Entity\Soumission $soumission = null)
    {
        $this->soumission = $soumission;

        return $this;
    }

    /**
     * Get soumission
     *
     * @return \tuto\BackofficeBundle\Entity\Soumission 
     */
    public function getSoumission()
    {
        return $this->soumission;
    }

    /**
     * Set etat
     *
     * @param \tuto\BackofficeBundle\Entity\Etat $etat
     * @return EvaluationFinal
     */
    public function setEtat(\tuto\BackofficeBundle\Entity\Etat $etat = null)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return \tuto\BackofficeBundle\Entity\Etat 
     */
    public function getEtat()
    {
        return $this->etat;
    }
}
