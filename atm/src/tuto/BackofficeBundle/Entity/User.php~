<?php
// src/tuto/BackofficeBundle/Entity/User.php

namespace tuto\BackofficeBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Misd\PhoneNumberBundle\Validator\Constraints\PhoneNumber as AssertPhoneNumber;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
/**
 * User
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks 
 */

class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="veuillez entrer votre nom.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="The name is too short.",
     *     maxMessage="The name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     * @Assert\NotBlank
     */
    private $Nom ;

     /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="veuillez entrer votre prenom.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="The prenom is too short.",
     *     maxMessage="The prenom is too long.",
     *     groups={"Registration", "Profile"}
     * )
     * @Assert\NotBlank
     */
    private $Prenom ;

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
        return __Dir__ . '/../../../../web/uploads/user';
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
        return 'uploads/user/'.$this->path;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload() {
        if (file_exists($this->tempFile))
            unlink($this->tempFile);
    }
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
   
    protected $Civilite;
    /**
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Statut", inversedBy="User")
     * @ORM\JoinColumn(name="Statut_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $Statut;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $Discipline;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $Universite;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $Institution;
  /**
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Pays", inversedBy="User")
     * @ORM\JoinColumn(name="Pays_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $Pays;
  
      /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Etat")
     * @ORM\JoinColumn(name="IdEtatUser", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $etat;
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set Nom
     *
     * @param string $nom
     * @return User
     */
    public function setNom($nom)
    {
        $this->Nom = $nom;

        return $this;
    }

    /**
     * Get Nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->Nom;
    }

        /**
     * Set Prenom
     *
     * @param string $Prenom
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->Prenom = $prenom;

        return $this;
    }

    /**
     * Get Prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->Prenom;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     * @return User
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
     * Set path
     *
     * @param string $path
     * @return User
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
     * Set DateNaissance
     *
     * @param \DateTime $dateNaissance
     * @return User
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->DateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get DateNaissance
     *
     * @return \DateTime 
     */
    public function getDateNaissance()
    {
        return $this->DateNaissance;
    }



    
    /**
     * Set Statut
     *
     * @param \tuto\BackofficeBundle\Entity\Statut $statut
     * @return User
     */
    public function setStatut(\tuto\BackofficeBundle\Entity\Statut $statut = null)
    {
        $this->Statut = $statut;

        return $this;
    }

    /**
     * Get Statut
     *
     * @return \tuto\BackofficeBundle\Entity\Statut 
     */
    public function getStatut()
    {
        return $this->Statut;
    }

    

    /**
     * Set Pays
     *
     * @param \tuto\BackofficeBundle\Entity\Pays $pays
     * @return User
     */
    public function setPays(\tuto\BackofficeBundle\Entity\Pays $pays = null)
    {
        $this->Pays = $pays;

        return $this;
    }

    /**
     * Get Pays
     *
     * @return \tuto\BackofficeBundle\Entity\Pays 
     */
    public function getPays()
    {
        return $this->Pays;
    }
    



   

    /**
     * Set etat
     *
     * @param \tuto\BackofficeBundle\Entity\Etat $etat
     * @return User
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
     * Set Universite
     *
     * @param string $universite
     * @return User
     */
    public function setUniversite($universite)
    {
        $this->Universite = $universite;

        return $this;
    }

    /**
     * Get Universite
     *
     * @return string 
     */
    public function getUniversite()
    {
        return $this->Universite;
    }

    /**
     * Set Institution
     *
     * @param string $institution
     * @return User
     */
    public function setInstitution($institution)
    {
        $this->Institution = $institution;

        return $this;
    }

    /**
     * Get Institution
     *
     * @return string 
     */
    public function getInstitution()
    {
        return $this->Institution;
    }

    /**
     * Set Civilite
     *
     * @param string $civilite
     * @return User
     */
    public function setCivilite($civilite)
    {
        $this->Civilite = $civilite;

        return $this;
    }

    /**
     * Get Civilite
     *
     * @return string 
     */
    public function getCivilite()
    {
        return $this->Civilite;
    }

   

    /**
     * Set Discipline
     *
     * @param string $discipline
     * @return User
     */
    public function setDiscipline($discipline)
    {
        $this->Discipline = $discipline;

        return $this;
    }

    /**
     * Get Discipline
     *
     * @return string 
     */
    public function getDiscipline()
    {
        return $this->Discipline;
    }
}
