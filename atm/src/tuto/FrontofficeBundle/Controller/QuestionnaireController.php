<?php

namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class QuestionnaireController extends Controller {

   public function questAction( \tuto\BackofficeBundle\Entity\Soumission $soumission, \Symfony\Component\HttpFoundation\Request $request) {
        $em = $this->getDoctrine()->getManager();
        if ($request->isMethod('POST')) {
             $evaluation = new \tuto\BackofficeBundle\Entity\Evaluation();
            //ajout questionnaire
            
            $evaluation->setDateEvaluation(new \DateTime());
            $evaluation->setUser($this->getUser());

            $evaluation->setEtat($em->getRepository("tutoBackofficeBundle:Etat")->findOneById('5'));
            $evaluation->setSoumission($soumission);
           $evaluation->setVu($em->getRepository("tutoBackofficeBundle:Vu")->findOneById('1'));


            //$demande-> setLocalite(sxxsxs);
            $em->persist($evaluation);
 
            $i = 1;
         
               foreach ($soumission->getQuestion() as $question ) {  
                   
                $evaluationReponse = new \tuto\BackofficeBundle\Entity\EvaluationReponse();
                
                //dump($request->request->get('question_' . $i));
                $resps = "";
                if (is_array($request->request->get('question_' . $i))) {
                    foreach ($request->request->get('question_' . $i) as $data)
                        $resps.="  /  " . $data;
                    $resps=  substr($resps, 5);
                } else
                    $resps = $request->request->get('question_' . $i);
                $evaluationReponse
                        ->setEvaluation($evaluation)
                        ->setQuestion($question)
                        ->setReponse($resps);

                $em->persist($evaluationReponse);
                $i++;
         }
         
                    
          
                          $adresse = $evaluation->getUser()->getEmail();
         
              $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, ' ssl')
                            ->setUsername('atmcolloque2018@gmail.com')->setPassword('ATM2018atm2018');

            $mailer = \Swift_Mailer::newInstance($transport);
            $message = \Swift_Message::newInstance()
                    ->setSubject('Réception évaluation papier ATM')
                    ->setFrom('atmcolloque2018@gmail.com')
                    ->setTo($adresse)
                   ->setBody($this->renderView('tutoBackofficeBundle:Soumission:email3.html.twig', array('evlt' => $evaluation ,'soumission' => $soumission )))
    ;
                    
            $this->get('mailer')->send($message);
           
           
           
            $em->flush();
            
            return $this->redirectToRoute('front_reponsesSucces', array(
                        'soumission' => $soumission->getId(),'id' => $evaluation->getId()
            ));
        }

        return $this->render('tutoFrontofficeBundle:Quest:quest.html.twig', array(
                    'soumission' => $soumission
        ));
    }
   

    public function reponsesAction(\tuto\BackofficeBundle\Entity\Soumission $soumission ,$id ) {
        $em = $this->getDoctrine()->getManager();
        $evaluation = $em->getRepository('tutoBackofficeBundle:Evaluation')->findBy(array('soumission' => $soumission, 'id'=>$id));
        $evaluationreponse = $em->getRepository('tutoBackofficeBundle:EvaluationReponse')->findBy(array('evaluation' => $evaluation));
        return $this->render('tutoFrontofficeBundle:Quest:affiche.html.twig', array('evaluationreponse' => $evaluationreponse));
       
    }
    public function reponsevalAction(\tuto\BackofficeBundle\Entity\Soumission $soumission ,$id ) {
        $em = $this->getDoctrine()->getManager();
        $evaluation = $em->getRepository('tutoBackofficeBundle:Evaluation')->findBy(array('soumission' => $soumission, 'id'=>$id));
        return $this->render('tutoFrontofficeBundle:Evaluation:reponses.html.twig', array('evaluation' => $evaluation));
    }
      

    public function reponsesevalAction(\tuto\BackofficeBundle\Entity\Soumission $soumission,$id, \tuto\BackofficeBundle\Entity\Notification $notifId) {
        $em = $this->getDoctrine()->getManager();
        $evaluationfinal = $em->getRepository('tutoBackofficeBundle:EvaluationFinal')->findBy(array('soumission' => $soumission, 'id'=>$id));
      
        $notification = $em->find("tutoBackofficeBundle:Notification", $notifId);
        $notification->setLu(true);
        $em->persist($notification);
        $em->flush();
        return $this->render('tutoFrontofficeBundle:Notification:notifEval.html.twig', array('evaluationfinal' => $evaluationfinal));
    }
       public function reponsesevalenAction(\tuto\BackofficeBundle\Entity\Soumission $soumission,$id, \tuto\BackofficeBundle\Entity\Notification $notifId) {
        $em = $this->getDoctrine()->getManager();
        $evaluationfinal = $em->getRepository('tutoBackofficeBundle:EvaluationFinal')->findBy(array('soumission' => $soumission, 'id'=>$id));
      
        $notification = $em->find("tutoBackofficeBundle:Notification", $notifId);
        $notification->setLu(true);
        $em->persist($notification);
        $em->flush();
        return $this->render('tutoFrontofficeBundle:Notification:notifEvalen.html.twig', array('evaluationfinal' => $evaluationfinal));
    }
    public function reponseseval1Action(\tuto\BackofficeBundle\Entity\Soumission $soumission) {
        $em = $this->getDoctrine()->getManager();
        
          $evaluationfinal = $em->getRepository('tutoBackofficeBundle:EvaluationFinal')->findBy(array('soumission' => $soumission));
      
        
        $em->flush();
         return $this->render('tutoFrontofficeBundle:Notification:notifEval.html.twig', array('evaluationfinal' => $evaluationfinal));
    }
    public function reponseseval2Action(\tuto\BackofficeBundle\Entity\Soumission $soumission) {
        $em = $this->getDoctrine()->getManager();
        
          $evaluationfinal = $em->getRepository('tutoBackofficeBundle:EvaluationFinal')->findBy(array('soumission' => $soumission));
      
        
        $em->flush();
         return $this->render('tutoFrontofficeBundle:Notification:notifEval1.html.twig', array('evaluationfinal' => $evaluationfinal));
    }
}
