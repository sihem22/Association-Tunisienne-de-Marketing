<?php

namespace tuto\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluation
 *
 * @ORM\Table(name="evaluation")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\EvaluationRepository")
  * @ORM\HasLifecycleCallbacks 
 */
class Evaluation
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
     * @ORM\Column(name="dateEvaluation", type="datetime")
     */
    private $dateEvaluation;
     /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\User", inversedBy="Evaluation")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $user;
     /**
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Soumission", inversedBy="evaluation")
     * @ORM\JoinColumn(name="soumission_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $soumission;
       /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Etat")
     * @ORM\JoinColumn(name="IdEtatEvaluation", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $etat;
 
     /**
      *  @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Vu")

     * @ORM\JoinColumn(name="IdVuEvaluation", referencedColumnName="id",onDelete="SET NULL")
     */
    private $vu;
   
   
    

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
     * Set dateEvaluation
     *
     * @param \DateTime $dateEvaluation
     * @return Evaluation
     */
    public function setDateEvaluation($dateEvaluation)
    {
        $this->dateEvaluation = $dateEvaluation;

        return $this;
    }

    /**
     * Get dateEvaluation
     *
     * @return \DateTime 
     */
    public function getDateEvaluation()
    {
        return $this->dateEvaluation;
    }

    /**
     * Set user
     *
     * @param \tuto\BackofficeBundle\Entity\User $user
     * @return Evaluation
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
     * Set etat
     *
     * @param \tuto\BackofficeBundle\Entity\Etat $etat
     * @return Evaluation
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
     * Constructor
     */
    public function __construct()
    {
        $this->soumission = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add soumission
     *
     * @param \tuto\BackofficeBundle\Entity\Soumission $soumission
     * @return Evaluation
     */
    public function addSoumission(\tuto\BackofficeBundle\Entity\Soumission $soumission)
    {
        $this->soumission[] = $soumission;

        return $this;
    }

    /**
     * Remove soumission
     *
     * @param \tuto\BackofficeBundle\Entity\Soumission $soumission
     */
    public function removeSoumission(\tuto\BackofficeBundle\Entity\Soumission $soumission)
    {
        $this->soumission->removeElement($soumission);
    }

    /**
     * Get soumission
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSoumission()
    {
        return $this->soumission;
    }

    /**
     * Set soumission
     *
     * @param \tuto\BackofficeBundle\Entity\Soumission $soumission
     * @return Evaluation
     */
    public function setSoumission(\tuto\BackofficeBundle\Entity\Soumission $soumission = null)
    {
        $this->soumission = $soumission;

        return $this;
    }
    

    /**
     * Set vu
     *
     * @param string $vu
     * @return Evaluation
     */
    public function setVu($vu)
    {
        $this->vu = $vu;

        return $this;
    }

    /**
     * Get vu
     *
     * @return string 
     */
    public function getVu()
    {
        return $this->vu;
    }
}
