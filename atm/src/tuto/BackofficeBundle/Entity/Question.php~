<?php

namespace tuto\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\QuestionRepository")
 */
class Question
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
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="TypeQuestion", type="string", length=255)
     */
    private $typeQuestion;
     /**
     
     * @ORM\OrderBy({"ordre" = "asc"})
     * @ORM\ManyToMany(targetEntity="tuto\BackofficeBundle\Entity\ValeursDefault")
     
     */
    protected $ValeursDefault;
     
    


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
     * Set libelle
     *
     * @param string $libelle
     * @return Question
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set typeQuestion
     *
     * @param string $typeQuestion
     * @return Question
     */
    public function setTypeQuestion($typeQuestion)
    {
        $this->typeQuestion = $typeQuestion;

        return $this;
    }

    /**
     * Get typeQuestion
     *
     * @return string 
     */
    public function getTypeQuestion()
    {
        return $this->typeQuestion;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ValeursDefault = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ValeursDefault
     *
     * @param \tuto\BackofficeBundle\Entity\ValeursDefault $valeursDefault
     * @return Question
     */
    public function addValeursDefault(\tuto\BackofficeBundle\Entity\ValeursDefault $valeursDefault)
    {
        $this->ValeursDefault[] = $valeursDefault;

        return $this;
    }

    /**
     * Remove ValeursDefault
     *
     * @param \tuto\BackofficeBundle\Entity\ValeursDefault $valeursDefault
     */
    public function removeValeursDefault(\tuto\BackofficeBundle\Entity\ValeursDefault $valeursDefault)
    {
        $this->ValeursDefault->removeElement($valeursDefault);
    }

    /**
     * Get ValeursDefault
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getValeursDefault()
    {
        return $this->ValeursDefault;
    }
       public function __toString() {
        return $this->libelle;
    }

  
}
