<?php

namespace tuto\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notification
 *
 * @ORM\Table(name="notification")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\NotificationRepository")
 */
class Notification
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
     * @ORM\Column(name="dateNotif", type="datetime")
     */
    private $dateNotif;

    /**
     * @var bool
     *
     * @ORM\Column(name="lu", type="boolean")
     */
    private $lu;
       /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\User", inversedBy="Notification")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $user;

       /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Soumission", inversedBy="Notification")
     * @ORM\JoinColumn(name="soumission_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $soumission;
    
     
    
    /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\EvaluationFinal", inversedBy="Notification")
     * @ORM\JoinColumn(name="evaluationfinal_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $evaluationfinal;


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
     * Set dateNotif
     *
     * @param \DateTime $dateNotif
     * @return Notification
     */
    public function setDateNotif($dateNotif)
    {
        $this->dateNotif = $dateNotif;

        return $this;
    }

    /**
     * Get dateNotif
     *
     * @return \DateTime 
     */
    public function getDateNotif()
    {
        return $this->dateNotif;
    }

    /**
     * Set lu
     *
     * @param boolean $lu
     * @return Notification
     */
    public function setLu($lu)
    {
        $this->lu = $lu;

        return $this;
    }

    /**
     * Get lu
     *
     * @return boolean 
     */
    public function getLu()
    {
        return $this->lu;
    }

    /**
     * Set user
     *
     * @param \tuto\BackofficeBundle\Entity\User $user
     * @return Notification
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
     * Set soumission
     *
     * @param \tuto\BackofficeBundle\Entity\Soumission $soumission
     * @return Notification
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

    
    public function setEvaluationfinal(\tuto\BackofficeBundle\Entity\EvaluationFinal $evaluationfinal = null)
    {
        $this->evaluationfinal = $evaluationfinal;

        return $this;
    }

    /**
     * Get evaluationfinal
     *
     * @return \tuto\BackofficeBundle\Entity\EvaluationFinal 
     */
    public function getEvaluationfinal()
    {
        return $this->evaluationfinal;
    }

}
