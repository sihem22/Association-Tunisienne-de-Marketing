<?php namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\EvaluationReponse;
use tuto\BackofficeBundle\Form\EvaluationReponseType;
use Symfony\Component\HttpFoundation\Response;

class EvaluationReponseController extends Controller
{
    public function afficheAction(\tuto\BackofficeBundle\Entity\Evaluation $evaluation)
    {
        $em=$this->getDoctrine()->getManager();
        $evaluationreponses =$em->getRepository('tutoBackofficeBundle:EvaluationReponse')->findBy(array('evaluation'=>$evaluation));
        return $this->render('tutoBackofficeBundle:EvaluationReponse:evaluationreponses.html.twig', array('evaluationreponses'=>$evaluationreponses));
        
     }
}