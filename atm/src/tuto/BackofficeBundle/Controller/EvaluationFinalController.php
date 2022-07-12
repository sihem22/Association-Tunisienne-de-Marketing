<?php

namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\EvaluationFinal;
use tuto\BackofficeBundle\Form\EvaluationFinalType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class EvaluationFinalController extends Controller {

    public function evalAction(\tuto\BackofficeBundle\Entity\Soumission $soumission) {

        $em = $this->getDoctrine()->getManager();
        $EvaluationFinal = new EvaluationFinal();
        $form = $this->createForm(new EvaluationFinalType(), $EvaluationFinal);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {

            $EvaluationFinal->setSoumission($soumission);
            $EvaluationFinal->setEtat($em->getRepository("tutoBackofficeBundle:Etat")->findOneById('6'));

            $EvaluationFinal->setDateEvaluationFinal(new \DateTime());




            $valide = $EvaluationFinal->getEtat();
            if ($valide->getId() == 6) {

                $lastId = $soumission->getId();
                $soum = $em->find('tutoBackofficeBundle:Soumission', $lastId);
                $user = $soum->getUser();
               





                $notification = new \tuto\BackofficeBundle\Entity\Notification();
                $notification
                        ->setSoumission($soumission)
                        ->setEvaluationfinal($EvaluationFinal)
                        ->setUser($user)
                        ->setDateNotif(new \DateTime())
                        ->setLu(false);
                $em->persist($notification);
            }


            $form->handleRequest($request);

            if ($form->isValid()) {
                $em->persist($EvaluationFinal);
                $user = $soum->getUser();
                 $add = $user->getEmail();

                $transport1 = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, ' ssl')
                                ->setUsername('atmcolloque2018@gmail.com')->setPassword('ATM2018atm2018');
                $mailer = \Swift_Mailer::newInstance($transport1);
                $message1 = \Swift_Message::newInstance()
                        ->setSubject('Evaluation Papier ATM')
                        ->setFrom('atmcolloque2018@gmail.com')
                        ->setTo($add)
                        ->setBody($this->renderView('tutoBackofficeBundle:Soumission:email4.html.twig', array('evl' => $EvaluationFinal, 'soumission' => $soum)))
                ;

                $this->get('mailer')->send($message1);
                
                
                  foreach ($soum->getAuteurs() as $auteur) {
                       $email=$auteur->getEmail() ;

                    


                    $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, ' ssl')
                                    ->setUsername('atmcolloque2018@gmail.com')->setPassword('ATM2018atm2018');

                    $mailer = \Swift_Mailer::newInstance($transport);
                    $message = \Swift_Message::newInstance()
                            ->setSubject('Evaluation Papier ATM')
                            ->setFrom('atmcolloque2018@gmail.com')
                            ->setTo($email)
                            ->setBody($this->renderView('tutoBackofficeBundle:Soumission:email5.html.twig', array('evl' => $EvaluationFinal, 'soumission' => $soum)))
                    ;

                    $this->get('mailer')->send($message);
                  
                  }

$soum->setEtat($em->getRepository("tutoBackofficeBundle:Etat")->findOneById('6'));
 $em->persist($soum);

                $em->flush();

                $EvaluationFinal = $form->getData();


                $this->addFlash("success", "L'évaluation final a été ajoutée avec sucées");
                return $this->redirectToRoute('tuto_evaluationfinal');
                // $message="un membre est ajoutée";
            }
        }
        return $this->render('tutoBackofficeBundle:EvaluationFinal:ajout.html.twig', array(
                    'form' => $form->createView(),
                        )
        );
    }

    public function afficheAction() {
        $em = $this->getDoctrine()->getManager();
        $evaluationfinal = $em->getRepository('tutoBackofficeBundle:EvaluationFinal')->findAll();
        return $this->render('tutoBackofficeBundle:EvaluationFinal:affiche.html.twig', array('evaluationfinal' => $evaluationfinal));
    }

    public function supprimerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $EvaluationFinal = $em->find('tutoBackofficeBundle:EvaluationFinal', $id);
        if (!$EvaluationFinal) {
            throw $this->createNotFoundException('EvaluationFinal avec l\'id ' . $id . ' n\'existe pas');
        }
        $em->remove($EvaluationFinal);
        $em->flush();
        $this->addFlash("success", "l'évaluationFinal a été supprimée avec succès");
        return $this->redirectToRoute('tuto_evaluationfinal');
        //return new Response("Etat supprimé avec succées");
    }

}
