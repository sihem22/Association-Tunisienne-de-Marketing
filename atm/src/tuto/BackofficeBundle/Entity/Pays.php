<?php

namespace tuto\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * Pays
 *
 * @ORM\Table(name="pays")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\PaysRepository")
 * @UniqueEntity(fields="code", message="Un pays existe déjà avec ce code.")
 * @UniqueEntity(fields="alpha2", message="Un pays existe déjà avec cet alpha2.")
 * @UniqueEntity(fields="alpha3", message="Un pays existe déjà avec cet alpha3.")
 */
class Pays
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
     * @var int
     *
     * @ORM\Column(name="code", type="integer", unique=true)
     * @Assert\NotBlank(message="veuillez entrer votre code")
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="alpha2", type="string", length=2, unique=true)
     * @Assert\NotBlank(message="veuillez entrer votre alpha2")
     */
    private $alpha2;

    /**
     * @var string
     *
     * @ORM\Column(name="alpha3", type="string", length=3, unique=true)
     */
    private $alpha3;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_en_gb", type="string", length=45)
     */
    private $nomEnGb;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_fr_fr", type="string", length=45)
     */
    private $nomFrFr;


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
     * Set code
     *
     * @param integer $code
     * @return Pays
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return integer 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set alpha2
     *
     * @param string $alpha2
     * @return Pays
     */
    public function setAlpha2($alpha2)
    {
        $this->alpha2 = $alpha2;

        return $this;
    }

    /**
     * Get alpha2
     *
     * @return string 
     */
    public function getAlpha2()
    {
        return $this->alpha2;
    }

    /**
     * Set alpha3
     *
     * @param string $alpha3
     * @return Pays
     */
    public function setAlpha3($alpha3)
    {
        $this->alpha3 = $alpha3;

        return $this;
    }

    /**
     * Get alpha3
     *
     * @return string 
     */
    public function getAlpha3()
    {
        return $this->alpha3;
    }

    /**
     * Set nomEnGb
     *
     * @param string $nomEnGb
     * @return Pays
     */
    public function setNomEnGb($nomEnGb)
    {
        $this->nomEnGb = $nomEnGb;

        return $this;
    }

    /**
     * Get nomEnGb
     *
     * @return string 
     */
    public function getNomEnGb()
    {
        return $this->nomEnGb;
    }

    /**
     * Set nomFrFr
     *
     * @param string $nomFrFr
     * @return Pays
     */
    public function setNomFrFr($nomFrFr)
    {
        $this->nomFrFr = $nomFrFr;

        return $this;
    }

    /**
     * Get nomFrFr
     *
     * @return string 
     */
    public function getNomFrFr()
    {
        return $this->nomFrFr;
    }
    public function __toString() {
        return $this->nomFrFr;
    }
}
