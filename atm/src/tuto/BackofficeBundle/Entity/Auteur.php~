<?php

namespace tuto\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Auteur
 *
 * @ORM\Table(name="auteur")
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\AuteurRepository")
 */
class Auteur
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    protected $nom;


    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    protected $prenom;

      /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;


    /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Statut")
     * @ORM\JoinColumn(name="Grade", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $grade;


    /**
     * @var string
     *
     * @ORM\Column(name="universite", type="string", length=255)
     */
    protected $universite;


    /**
     * @var string
     *
     * @ORM\Column(name="institution", type="string", length=255)
     */
    protected $institution;


    /**
     * @var string
     *
     * @ORM\Column(name="rang", type="integer")
     */
    protected $rang;

    /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Soumission",inversedBy="auteurs")
     * @ORM\JoinColumn(name="soumission_id", referencedColumnName="id" )
     */
    protected $soumission;

   

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
     * Set nom
     *
     * @param string $nom
     * @return Auteur
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
     * Set prenom
     *
     * @param string $prenom
     * @return Auteur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }


    /**
     * Set email
     *
     * @param string $email
     * @return contact
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set grade
     *
     * @param \tuto\BackofficeBundle\Entity\Statut $grade
     * @return Soumission
     */
    public function setGrade(\tuto\BackofficeBundle\Entity\Statut $grade = null)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get grade
     *
     * @return \tuto\BackofficeBundle\Entity\Statut 
     */
    public function getGrade()
    {
        return $this->grade;
    }


     
    /**
     * Set universite
     *
     * @param string $universite
     * @return Auteur
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
     * Set institution
     *
     * @param string $institution
     * @return Auteur
     */
    public function setInstitution($institution)
    {
        $this->institution = $institution;

        return $this;
    }

    /**
     * Get institution
     *
     * @return string 
     */
    public function getInstitution()
    {
        return $this->institution;
    }

    /**
     * Set rang
     *
     * @param string $rang
     * @return Auteur
     */
    public function setRang($rang)
    {
        $this->rang = $rang;

        return $this;
    }

    /**
     * Get rang
     *
     * @return string 
     */
    public function getRang()
    {
        return $this->rang;
    }



    /**
     * Set soumission
     *
     * @param \tuto\BackofficeBundle\Entity\Soumission $soumission
     *
     * @return Auteur
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


}
