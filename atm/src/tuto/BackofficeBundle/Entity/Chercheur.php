<?php

namespace tuto\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chercheur
 *
 * @ORM\Table(name="chercheur")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\ChercheurRepository")
 */
class Chercheur
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
     * @ORM\Column(name="adressemail", type="text")
     */
    private $adressemail;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
   
    protected $civilite;

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
     * @return Chercheur
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
     * Set adressemail
     *
     * @param string $adressemail
     * @return Chercheur
     */
    public function setAdressemail($adressemail)
    {
        $this->adressemail = $adressemail;

        return $this;
    }

    /**
     * Get adressemail
     *
     * @return string 
     */
    public function getAdressemail()
    {
        return $this->adressemail;
    }
    public function __toString() {
        return $this->nom;
    }

    /**
     * Set civilite
     *
     * @param string $civilite
     * @return Chercheur
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;

        return $this;
    }

    /**
     * Get civilite
     *
     * @return string 
     */
    public function getCivilite()
    {
        return $this->civilite;
    }
}
