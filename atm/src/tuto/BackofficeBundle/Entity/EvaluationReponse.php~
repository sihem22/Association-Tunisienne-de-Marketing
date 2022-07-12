<?php

namespace tuto\BackofficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EvaluationReponse
 *
 * @ORM\Table(name="evaluation_reponse")
 * @ORM\Entity(repositoryClass="tuto\BackofficeBundle\Repository\EvaluationReponseRepository")
 */
class EvaluationReponse
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
     * @ORM\Column(name="reponse", type="string", length=255)
    
     */
    private $reponse;
     /**
     
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Evaluation")
      * @ORM\JoinColumn(name="evaluation_id", referencedColumnName="id",onDelete="SET NULL")
      * 
     */
    protected $evaluation;

     /**
     * @ORM\ManyToOne(targetEntity="tuto\BackofficeBundle\Entity\Question")
       * @ORM\JoinColumn(name="question_id", referencedColumnName="id",onDelete="SET NULL")
     */
    protected $question;


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
     * Set reponse
     *
     * @param string $reponse
     * @return EvaluationReponse
     */
    public function setReponse($reponse)
    {
        $this->reponse = $reponse;

        return $this;
    }

    /**
     * Get reponse
     *
     * @return string 
     */
    public function getReponse()
    {
        return $this->reponse;
    }

    
    /**
     * Set question
     *
     * @param \tuto\BackofficeBundle\Entity\Question $question
     * @return EvaluationReponse
     */
    public function setQuestion(\tuto\BackofficeBundle\Entity\Question $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \tuto\BackofficeBundle\Entity\Question 
     */
    public function getQuestion()
    {
        return $this->question;
    }

  

   

    /**
     * Set evaluation
     *
     * @param \tuto\BackofficeBundle\Entity\Evaluation $evaluation
     * @return EvaluationReponse
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
