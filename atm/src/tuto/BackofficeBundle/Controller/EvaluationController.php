<?php

namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Evaluation;
use tuto\BackofficeBundle\Form\EvaluationType;
use Symfony\Component\HttpFoundation\Response;

class EvaluationController extends Controller {

    public function afficheAction() {
        $em = $this->getDoctrine()->getManager();
        $evaluations = $em->getRepository('tutoBackofficeBundle:Evaluation')->findAll();
        return $this->render('tutoBackofficeBundle:Evaluation:evaluations.html.twig', array('evaluations' => $evaluations));
    }
//masta3mlthech ama nes7a9lha
    public function modifierAction($id) {
        $em = $this->getDoctrine()->getManager();

        $Evaluation = $em->find("tutoBackofficeBundle:Evaluation", $id);
        $Evaluation->setEtat($em->getRepository("tutoBackofficeBundle:Etat")->findOneById('6'));
        $em->persist($Evaluation);




        $lastId = $Evaluation->getId();
        $evaluation = $em->find('tutoBackofficeBundle:Evaluation', $lastId);

        $valide = $evaluation->getEtat();
        if ($valide->getId() == 6) {
            $user = $evaluation->getSoumission()->getUser();
            $soumission = $evaluation->getSoumission();

           
              
        
                        $notification = new \tuto\BackofficeBundle\Entity\Notification();
                        $notification
                                ->setSoumission($soumission)
                                ->setEvaluationfinal($evaluation)
                                ->setUser($user)
                                ->setDateNotif(new \DateTime())
                                ->setLu(false);
                        $em->persist($notification);

                      
                    }
              



            
                
                
                //$message="une Demande est modifiée";
       
        $em->flush();
        $this->addFlash("success", "Une Evaluation a été envoyée avec succès");
        return $this->redirectToRoute('tuto_evaluation');
        
        
    } 

    public function etatAction() {
        $em = $this->getDoctrine()->getManager();
        $evaluations = $em->getRepository('tutoBackofficeBundle:Evaluation')->findAll();
        return $this->render('tutoBackofficeBundle:Evaluation:evaluations.html.twig', array('evaluations' => $evaluations));
    }
  public function notifadminAction()
 
     { $em=$this->getDoctrine()->getManager();
       $evaluations =$em->getRepository('tutoBackofficeBundle:Evaluation')->findByetat();

         return $this->render('tutoBackofficeBundle:Evaluation:notifadmin.html.twig', array('evaluations'=>$evaluations));
     }

     public function countAction() {
        $em = $this->getDoctrine()->getManager();
        $nb = $em->getRepository('tutoBackofficeBundle:Evaluation')->count();

        return new Response($nb);
    }
    public function supprimerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $Evaluation = $em->find('tutoBackofficeBundle:Evaluation', $id);
        if (!$Evaluation) {
            throw $this->createNotFoundException('Evaluation avec l\'id ' . $id . ' n\'existe pas');
        }
        $em->remove($Evaluation);
        $em->flush();
        $this->addFlash("success", "votre question a été supprimé avec succes");
      
            return $this->redirectToRoute('tuto_evaluation');
       
        
    }
    public function modifier1Action($id) {
        $em = $this->getDoctrine()->getManager();

        $Evaluation = $em->find("tutoBackofficeBundle:Evaluation", $id);
        $Evaluation->setVu($em->getRepository("tutoBackofficeBundle:Vu")->findOneById('2'));
        $em->persist($Evaluation);

        $em->flush();
       
        return $this->redirectToRoute('tuto_evaluation');
        
        
    } 
        //return new Response("Question supprimée avec succées");
    



}
