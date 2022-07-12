<?php

namespace tuto\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EnvoieMail
 *
 * @ORM\Table(name="envoie_mail")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\EnvoieMailRepository")
 */
class EnvoieMail
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
     * @ORM\ManyToMany(targetEntity="tuto\BackofficeBundle\Entity\Cherch")
     */
    protected $cherch;


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
     * Constructor
     */
    public function __construct()
    {
        $this->cherch = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add cherch
     *
     * @param \tuto\BackofficeBundle\Entity\Cherch $cherch
     * @return EnvoieMail
     */
    public function addCherch(\tuto\BackofficeBundle\Entity\Cherch $cherch)
    {
        $this->cherch[] = $cherch;

        return $this;
    }

    /**
     * Remove cherch
     *
     * @param \tuto\BackofficeBundle\Entity\Cherch $cherch
     */
    public function removeCherch(\tuto\BackofficeBundle\Entity\Cherch $cherch)
    {
        $this->cherch->removeElement($cherch);
    }

    /**
     * Get cherch
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCherch()
    {
        return $this->cherch;
    }
}
