<?php

namespace tuto\BackofficeBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;

/**
 * Soumission
 *
 * @ORM\Table(name="soumission")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\SoumissionRepository")
 * @ORM\HasLifecycleCallbacks 
 */
class Soumission
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
     * @ORM\Column(name="titrePapier", type="string", length=255)
     */
    private $titrePapier;
    /**
     * @var string
     *
     * @ORM\Column(name="resume", type="string", length=255)
     */
    private $resume;

    /**
     * @var string
     *
     * @ORM\Column(name="motcle", type="string", length=255)
     */
    private $motcle;
   
    /**
     * @ORM\OneToMany(targetEntity="tuto\BackofficeBundle\Entity\Auteur", mappedBy="soumission", cascade={"persist"})
     */
    protected $auteurs;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateSoumission", type="datetime")
     */
    private $dateSoumission;
     /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\User", inversedBy="Soumission")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $user;
    /**
     * @ORM\OneToMany(targetEntity="tuto\BackofficeBundle\Entity\Evaluation", mappedBy="soumission")
     */
    private $evaluation;
    /**
     * @ORM\OneToMany(targetEntity="tuto\BackofficeBundle\Entity\EvaluationFinal", mappedBy="soumission")
     */
    private $evaluationfinal;
       /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Etat")
     * @ORM\JoinColumn(name="IdEtatSoumission", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $etat;
     /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Type")
     * @ORM\JoinColumn(name="IdTypeSoumission", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $type;
     /**
     * @ORM\ManyToMany(targetEntity="tuto\BackofficeBundle\Entity\Chercheur")
     */
    protected $evaluateur;
    /**

     * @ORM\ManyToMany(targetEntity="tuto\BackofficeBundle\Entity\Question")
     */
    protected $question;
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

    public function getUploadRootDir() {
        return __Dir__ . '/../../../../web/uploads/papiers';
    }
    public function getUploadRootDir1() {
        return __Dir__ . '/../../../../web/uploads/manuscript';
    }

    public function getAbsolutePath() {
        return null === $this->path1 ? null : $this->getUploadRootDir() . '/' . $this->path1;
        
    }
    public function getAbsolutePath1() {
        
        return null === $this->path2 ? null : $this->getUploadRootDir1() . '/' . $this->path2;
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
    public function getAssetPath(){
        return 'uploads/papiers/'.$this->path1;
        
    }
    public function getAssetPath1(){
    return 'uploads/manuscript/'.$this->path2;}

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload() {
        if (file_exists($this->tempFile))
            unlink($this->tempFile);
    }
    
    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank(message="veuillez entrer votre date de naissance.", groups={"Registration", "Profile"})
     */

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
     * Set titrePapier
     *
     * @param string $titrePapier
     * @return Soumission
     */
    public function setTitrePapier($titrePapier)
    {
        $this->titrePapier = $titrePapier;

        return $this;
    }

    /**
     * Get titrePapier
     *
     * @return string 
     */
    public function getTitrePapier()
    {
        return $this->titrePapier;
    }

    /**
     * Set dateSoumission
     *
     * @param \DateTime $dateSoumission
     * @return Soumission
     */
    public function setDateSoumission($dateSoumission)
    {
        $this->dateSoumission = $dateSoumission;

        return $this;
    }

    /**
     * Get dateSoumission
     *
     * @return \DateTime 
     */
    public function getDateSoumission()
    {
        return $this->dateSoumission;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->evaluation = new \Doctrine\Common\Collections\ArrayCollection();
         $this->evaluateur = new \Doctrine\Common\Collections\ArrayCollection();
         $this->auteurs = new \Doctrine\Common\Collections\ArrayCollection();
       
        
    }

    /**
     * Set user
     *
     * @param \tuto\BackofficeBundle\Entity\User $user
     * @return Soumission
     */
    public function setUser(\tuto\BackofficeBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \tuto\BackofficeBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add evaluation
     *
     * @param \tuto\BackofficeBundle\Entity\Evaluation $evaluation
     * @return Soumission
     */
    public function addEvaluation(\tuto\BackofficeBundle\Entity\Evaluation $evaluation)
    {
        $this->evaluation[] = $evaluation;

        return $this;
    }

    /**
     * Remove evaluation
     *
     * @param \tuto\BackofficeBundle\Entity\Evaluation $evaluation
     */
    public function removeEvaluation(\tuto\BackofficeBundle\Entity\Evaluation $evaluation)
    {
        $this->evaluation->removeElement($evaluation);
    }

    /**
     * Get evaluation
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEvaluation()
    {
        return $this->evaluation;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     * @return Soumission
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
     * @return Soumission
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
     * @return Soumission
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
     * Set etat
     *
     * @param \tuto\BackofficeBundle\Entity\Etat $etat
     * @return Soumission
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

    /**
     * Add evaluateur
     *
     * @param \tuto\BackofficeBundle\Entity\Chercheur $evaluateur
     * @return Soumission
     */
    public function addEvaluateur(\tuto\BackofficeBundle\Entity\Chercheur $evaluateur)
    {
        $this->evaluateur[] = $evaluateur;

        return $this;
    }

    /**
     * Remove evaluateur
     *
     * @param \tuto\BackofficeBundle\Entity\Chercheur $evaluateur
     */
    public function removeEvaluateur(\tuto\BackofficeBundle\Entity\Chercheur $evaluateur)
    {
        $this->evaluateur->removeElement($evaluateur);
    }

    /**
     * Get evaluateur
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEvaluateur()
    {
        return $this->evaluateur;
    }

    /**
     * Set evaluation
     *
     * @param \tuto\BackofficeBundle\Entity\Evaluation $evaluation
     * @return Soumission
     */
    public function setEvaluation(\tuto\BackofficeBundle\Entity\Evaluation $evaluation = null)
    {
        $this->evaluation = $evaluation;

        return $this;
    }

   

    /**
     * Add question
     *
     * @param \tuto\BackofficeBundle\Entity\Question $question
     * @return Soumission
     */
    public function addQuestion(\tuto\BackofficeBundle\Entity\Question $question)
    {
        $this->question[] = $question;

        return $this;
    }

    /**
     * Remove question
     *
     * @param \tuto\BackofficeBundle\Entity\Question $question
     */
    public function removeQuestion(\tuto\BackofficeBundle\Entity\Question $question)
    {
        $this->question->removeElement($question);
    }

    /**
     * Get question
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set type
     *
     * @param \tuto\BackofficeBundle\Entity\Type $type
     * @return Soumission
     */
    public function setType(\tuto\BackofficeBundle\Entity\Type $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \tuto\BackofficeBundle\Entity\Type 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add evaluationfinal
     *
     * @param \tuto\BackofficeBundle\Entity\EvaluationFinal $evaluationfinal
     * @return Soumission
     */
    public function addEvaluationfinal(\tuto\BackofficeBundle\Entity\EvaluationFinal $evaluationfinal)
    {
        $this->evaluationfinal[] = $evaluationfinal;

        return $this;
    }

    /**
     * Remove evaluationfinal
     *
     * @param \tuto\BackofficeBundle\Entity\EvaluationFinal $evaluationfinal
     */
    public function removeEvaluationfinal(\tuto\BackofficeBundle\Entity\EvaluationFinal $evaluationfinal)
    {
        $this->evaluationfinal->removeElement($evaluationfinal);
    }

    /**
     * Get evaluationfinal
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEvaluationfinal()
    {
        return $this->evaluationfinal;
    }

    /**
     * Set resume
     *
     * @param string $resume
     * @return Soumission
     */
    public function setResume($resume)
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get resume
     *
     * @return string 
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set motcle
     *
     * @param string $motcle
     * @return Soumission
     */
    public function setMotcle($motcle)
    {
        $this->motcle = $motcle;

        return $this;
    }

    /**
     * Get motcle
     *
     * @return string 
     */
    public function getMotcle()
    {
        return $this->motcle;
    }

   /**
     * @param Collection $auteurs
     * @return $this
     */
    public function setAuteurs(Collection $auteurs)
    {
        $this->auteurs = $auteurs;
        return $this;
    }

    

    /**
     * Add auteurs
     *
     * @param \tuto\BackofficeBundle\Entity\Auteur $auteurs
     * @return Soumission
     */
    public function addAuteur(\tuto\BackofficeBundle\Entity\Auteur $auteurs)
    {
       
         if ( ! $this->auteurs->contains($auteurs) ) {
            $auteurs->setSoumission($this);
            $this->auteurs->add($auteurs);
        }
        return $this->auteurs;
    }

    /**
     * Remove auteurs
     *
     * @param \tuto\BackofficeBundle\Entity\Auteur $auteurs
     */
    public function removeAuteur(\tuto\BackofficeBundle\Entity\Auteur $auteurs)
    {
        $this->auteurs->removeElement($auteurs);
    }

    /**
     * Get auteurs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAuteurs()
    {
        return $this->auteurs;
    }
}
