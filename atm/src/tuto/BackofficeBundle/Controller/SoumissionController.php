<?php

namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Soumission;
use tuto\BackofficeBundle\Form\SoumissionType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class SoumissionController extends Controller {

    public function afficheAction() {
        $em = $this->getDoctrine()->getManager();
        $soumission = $em->getRepository('tutoBackofficeBundle:Soumission')->findAll();
        return $this->render('tutoBackofficeBundle:Soumission:affiche.html.twig', array('soumission' => $soumission));
    }

    public function affiche1Action() {
        $em = $this->getDoctrine()->getManager();
        $soumission = $em->getRepository('tutoBackofficeBundle:Soumission')->findAll();
        return $this->render('tutoBackofficeBundle:Soumission:affiche1.html.twig', array('soumission' => $soumission));
    }

    public function affiche2Action() {
        $em = $this->getDoctrine()->getManager();
        $soumission = $em->getRepository('tutoBackofficeBundle:Soumission')->findAll();
        return $this->render('tutoBackofficeBundle:Soumission:affiche3.html.twig', array('soumission' => $soumission));
    }

    public function affiche3Action() {
        $em = $this->getDoctrine()->getManager();
        $soumission = $em->getRepository('tutoBackofficeBundle:Soumission')->findAll();
        return $this->render('tutoBackofficeBundle:Soumission:affiche4.html.twig', array('soumission' => $soumission));
    }

    public function modifierAction($id, Request $request) {

        $em = $this->getDoctrine()->getManager();
        $Soumission = $em->getRepository('tutoBackofficeBundle:Soumission')->find($id);
        $Soumission->setEtat($em->getRepository("tutoBackofficeBundle:Etat")->findOneById('2'));



        $form = $this->createForm(new SoumissionType(), $Soumission);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            $lastId = $Soumission->getId();
            $soum = $em->find('tutoBackofficeBundle:Soumission', $lastId);

            $valide = $soum->getEtat();
            if ($valide->getId() == 2) {

                //dump($request->request->get('question_' . $i));

                foreach ($soum->getEvaluateur() as $evlt) {

                    $adresse = $evlt->getAdressemail();


                    $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, ' ssl')
                                    ->setUsername('atmcolloque2018@gmail.com')->setPassword('ATM2018atm2018');

                    $mailer = \Swift_Mailer::newInstance($transport);
                    $message = \Swift_Message::newInstance()
                            ->setSubject('Inscription site ATM')
                            ->setFrom('atmcolloque2018@gmail.com')
                            ->setTo($adresse)
                            ->setBody($this->renderView('tutoBackofficeBundle:Soumission:email.html.twig', array('evlt' => $evlt)))
                    ;

                    $this->get('mailer')->send($message);
                }

                $em->persist($Soumission);
                $em->flush();
                $this->addFlash("success", "votre email a été envoyé avec succées au destinataire");
                return $this->redirectToRoute('tuto_soumission');
                //$message="un Etat est modifié";
            }
        }
        return $this->render('tutoBackofficeBundle:Soumission:modif.html.twig', array(
                    'form' => $form->createView(),
                        )
        );
    }

    public function envoieAction($id, Request $request) {

        $em = $this->getDoctrine()->getManager();
        $Soumission = $em->getRepository('tutoBackofficeBundle:Soumission')->find($id);
        $Soumission->setEtat($em->getRepository("tutoBackofficeBundle:Etat")->findOneById('4'));



        $form = $this->createForm(new SoumissionType(), $Soumission);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            $users = $em->getRepository('tutoBackofficeBundle:User')->findAll();



            $lastId = $Soumission->getId();
            $soum = $em->find('tutoBackofficeBundle:Soumission', $lastId);

            $valide = $soum->getEtat();

            if ($valide->getId() == 4) {

                //dump($request->request->get('question_' . $i));

                foreach ($soum->getEvaluateur() as $evlt) {
                    $i = 0;
                    $prof = array();
                    foreach ($users as $user) {
                        $adresse = $evlt->getAdressemail();
                        $email = $user->getEmail();
                        if ($adresse == $email) {


                            $prof[] = $user;

                            foreach ($prof as $element) {

                                if ($element->getEtat()->getId() == 3) {

                                    $notification = new \tuto\BackofficeBundle\Entity\Notification();

                                    $notification->setSoumission($soum);
                                    $notification->setEvaluationfinal();
                                    $notification->setUser($element);
                                    $notification->setDateNotif(new \DateTime());
                                    $notification->setLu(false);
                                    $em->persist($notification);
                                    $i++;
                                    $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, ' ssl')
                                                    ->setUsername('atmcolloque2018@gmail.com')->setPassword('ATM2018atm2018');

                                    $mailer = \Swift_Mailer::newInstance($transport);
                                    $message = \Swift_Message::newInstance()
                                            ->setSubject('Papier à évaluer')
                                            ->setFrom('atmcolloque2018@gmail.com')
                                            ->setTo($adresse)
                                           
                                            ->setBody($this->renderView('tutoBackofficeBundle:Soumission:email2.html.twig', array('soumission' => $soum, 'evlt' => $evlt)))
                                    ;

                                    $this->get('mailer')->send($message);



                                    $em->persist($Soumission);
                                    $em->flush();
                                    $this->addFlash("success", "le papier a été envoyé avec succés");
                                }
                            }
                            return $this->redirectToRoute('tuto_soumission');
                            //$message="un Etat est modifié";
                        }
                    }
                }
            }
        }
        return $this->render('tutoBackofficeBundle:Soumission:modif.html.twig', array(
                    'form' => $form->createView(),
                        )
        );
    }

    public function envoie1Action($id, Request $request) {

        $em = $this->getDoctrine()->getManager();
        $Soumission = $em->getRepository('tutoBackofficeBundle:Soumission')->find($id);
        $Soumission->setEtat($em->getRepository("tutoBackofficeBundle:Etat")->findOneById('7'));

        $lastId = $Soumission->getId();
        $soum = $em->find('tutoBackofficeBundle:Soumission', $lastId);
        $add = $soum->getUser()->getEmail();
        $valide = $soum->getEtat();

        if ($valide->getId() == 7) {

            $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, ' ssl')
                            ->setUsername('atmcolloque2018@gmail.com')->setPassword('ATM2018atm2018');

            $mailer = \Swift_Mailer::newInstance($transport);
            $message = \Swift_Message::newInstance()
                    ->setSubject('Papier en cours d\'évaluation')
                    ->setFrom('atmcolloque2018@gmail.com')
                    ->setTo($add)
                    ->setBody($this->renderView('tutoBackofficeBundle:Email:mail.html.twig', array('soumission' => $soum)))
            ;

            $this->get('mailer')->send($message);

            //dump($request->request->get('question_' . $i));


            $em->persist($Soumission);
            $em->flush();
            $this->addFlash("success", "l'email a été envoyé avec succés");
        }

        return $this->redirectToRoute('tuto_soumission');
        //$message="un Etat est modifié";
    }

    public function notifsoumadminAction() {
        $em = $this->getDoctrine()->getManager();
        $soumissions = $em->getRepository('tutoBackofficeBundle:Soumission')->findByetat();
        return $this->render('tutoBackofficeBundle:Soumission:notifsoumadmin.html.twig', array('soumissions' => $soumissions));
    }

    public function notifsoumadmin1Action() {
        $em = $this->getDoctrine()->getManager();
        $soumissions = $em->getRepository('tutoBackofficeBundle:Soumission')->findAll();
        return $this->render('tutoBackofficeBundle:Soumission:ttenotif.html.twig', array('soumissions' => $soumissions));
    }

    public function countAction() {
        $em = $this->getDoctrine()->getManager();
        $nb = $em->getRepository('tutoBackofficeBundle:Soumission')->count();

        return new Response($nb);
    }

    public function supprimerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $Soumission = $em->find('tutoBackofficeBundle:Soumission', $id);
        if (!$Soumission) {
            throw $this->createNotFoundException('Soumission avec l\'id ' . $id . ' n\'existe pas');
        }
        $em->remove($Soumission);
        $em->flush();
        $this->addFlash("success", " la soumission a été supprimée avec succés");
        if ($Soumission->getType()->getId() == '1')
            return $this->redirectToRoute('tuto_soumission');
        else
        if ($Soumission->getType()->getId() == '2')
            return $this->redirectToRoute('tuto_soumission1');
        else
        if ($Soumission->getType()->getId() == '3')
            return $this->redirectToRoute('tuto_soumission2');
        else
        if ($Soumission->getType()->getId() == '4')
            return $this->redirectToRoute('tuto_soumission3');
        //return new Response("Etat supprimé avec succées");
    }
    public function auteurAction($id) {
        $em = $this->getDoctrine()->getManager();
        $soumission = $em->getRepository('tutoBackofficeBundle:Soumission')->findBy(array('id' => $id));
       
        return $this->render('tutoBackofficeBundle:Soumission:auteur.html.twig', array('soumission' => $soumission));
    }

}
