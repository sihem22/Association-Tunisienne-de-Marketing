<?php

namespace tuto\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * contact
 *
 * @ORM\Table(name="Contact")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\ContactRepository")
 */
class Contact
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
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    
    private $prenom;



    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
   
    private $email;

    
  

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=255)
     */
    private $commentaire;
       
       /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Etat", inversedBy="Contact")
     * @ORM\JoinColumn(name="IdEtatContact", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $etat;
   

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateModif", type="datetime", nullable=true)
     */
    private $dateModif;

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
     * @return contact
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
     * Set commentaire
     *
     * @param string $commentaire
     * @return contact
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string 
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

     /**
     * Set etat
     *
     * @param \tuto\BackofficeBundle\Entity\Etat $etat
     *
     * @return contact
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
     * Set dateModif
     *
     * @param \DateTime $dateModif
     *
     * @return proposition
     */
    public function setDateModif($dateModif)
    {
        $this->dateModif = $dateModif;

        return $this;
    }

    /**
     * Get dateModif
     *
     * @return \DateTime
     */
    public function getDateModif()
    {
        return $this->dateModif;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Contact
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
}
