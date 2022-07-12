<?php

namespace tuto\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notification
 *
 * @ORM\Table(name="notif")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\NotifRepository")
 */
class Notif
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
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $user;

    
    
     
    
    /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Evaluation")
     * @ORM\JoinColumn(name="evaluationid", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $evaluation;
    /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Contact")
     * @ORM\JoinColumn(name="contact_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $contact;


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
     * @return Notif
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
     * @return Notif
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
     * @return Notif
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
     * Set contact
     *
     * @param \tuto\BackofficeBundle\Entity\Contact $contact
     * @return Notif
     */
    public function setContact(\tuto\BackofficeBundle\Entity\Contact $contact = null)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return \tuto\BackofficeBundle\Entity\Contact 
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set evaluation
     *
     * @param \tuto\BackofficeBundle\Entity\Evaluation $evaluation
     * @return Notif
     */
    public function setEvaluation(\tuto\BackofficeBundle\Entity\Evaluation $evaluation = null)
    {
        $this->evaluation = $evaluation;

        return $this;
    }

    /**
     * Get evaluation
     *
     * @return \tuto\BackofficeBundle\Entity\Evaluation 
     */
    public function getEvaluation()
    {
        return $this->evaluation;
    }
}
