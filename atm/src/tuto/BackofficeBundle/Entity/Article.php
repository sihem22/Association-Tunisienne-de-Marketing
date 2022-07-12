<?php

namespace tuto\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\ArticleRepository")
 * @ORM\HasLifecycleCallbacks 
 */
class Article
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="motcle", type="string", length=255)
     */
    private $motcle;

     /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Annee")
     * @ORM\JoinColumn(name="Annee", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $annee;
      /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Type")
     * @ORM\JoinColumn(name="Type", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $type;
     /**
     * @var string
     *
     * @ORM\Column(name="auteurs", type="string", length=255)
     */
    private $auteurs;
   
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

    public function getUploadRootDir() {
        return __Dir__ . '/../../../../web/uploads/articles';
    }
    

    public function getAbsolutePath() {
        return null === $this->path1 ? null : $this->getUploadRootDir() . '/' . $this->path1;
        
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
     * @ORM\PreRemove()
     */
    public function preRemoveUpload() {
        $this->tempFile = $this->getAbsolutePath();
    }
      
    public function getAssetPath(){
        return 'uploads/articles/'.$this->path1;
        
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
     * Set titre
     *
     * @param string $titre
     *
     * @return Article
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }


/**
     * Set motcle
     *
     * @param string $motcle
     * @return Article
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
     * Set annee
     *
     * @param \tuto\BackofficeBundle\Entity\Annee $annee
     * @return Article
     */
    public function setAnnee(\tuto\BackofficeBundle\Entity\Annee $annee = null)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get annee
     *
     * @return \tuto\BackofficeBundle\Entity\Annee 
     */
    public function getAnnee()
    {
        return $this->annee;
    }


/**
     * Set type
     *
     * @param \tuto\BackofficeBundle\Entity\Type $type
     * @return Article
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
     * Set path1
     *
     * @param string $path1
     * @return Article
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
     * Constructor
     */
    public function __construct()
    {
        
    }

   

    /**
     * Set auteurs
     *
     * @param string $auteurs
     * @return Article
     */
    public function setAuteurs($auteurs)
    {
        $this->auteurs = $auteurs;

        return $this;
    }

    /**
     * Get auteurs
     *
     * @return string 
     */
    public function getAuteurs()
    {
        return $this->auteurs;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     * @return Article
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
