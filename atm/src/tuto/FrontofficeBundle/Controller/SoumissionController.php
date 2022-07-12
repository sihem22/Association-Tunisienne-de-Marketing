<?php

namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Soumission;
use tuto\BackofficeBundle\Form\SoumissionType1;

use Symfony\Component\HttpFoundation\Response;

class SoumissionController extends Controller {

    public function ajoutAction() {

        $em = $this->getDoctrine()->getManager();
        $Soumission = new Soumission();

        $form = $this->createForm(new SoumissionType1(), $Soumission
        );


        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') {

            $Soumission->setEtat($em->getRepository("tutoBackofficeBundle:Etat")->findOneById('1'));
            $Soumission->setType($em->getRepository("tutoBackofficeBundle:Type")->findOneById('1'));
            $Soumission->setUser($this->getUser());
            $Soumission->setDateSoumission(new \DateTime());



            $questions = $em->getRepository('tutoBackofficeBundle:Question')->findAll();

            foreach ($questions as $quest) {


                $Soumission->addQuestion($quest);
            }

            $form->handleRequest($request);
            if ($form->isValid()) {
                $em->persist($Soumission);
                $adresse = $Soumission->getUser()->getEmail();


                $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, ' ssl')
                                ->setUsername('atmcolloque2018@gmail.com')->setPassword('ATM2018atm2018');

                $mailer = \Swift_Mailer::newInstance($transport);
                $message = \Swift_Message::newInstance()
                        ->setSubject('Votre papier a été soumis')
                        ->setFrom('atmcolloque2018@gmail.com')
                        ->setTo($adresse)
                        ->setBody($this->renderView('tutoBackofficeBundle:Soumission:email1.html.twig', array('soumission' => $Soumission)))
                ;

                $this->get('mailer')->send($message);

                $em->flush();

                $Soumission = $form->getData();



                $this->addFlash("success", "votre soumission a été ajoutée avec succès");
                return $this->redirectToRoute('tuto_soumission_ajout');
                // $message="un Etat est ajouté";
            }
        }
        return $this->render('tutoFrontofficeBundle:Soumission:ajout.html.twig', array(
                    'form' => $form->createView(),
                        )
        );
    }

    public function ajout1Action() {

        $em = $this->getDoctrine()->getManager();
        $Soumission = new Soumission();

        $form = $this->createForm(new SoumissionType1(), $Soumission);

        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') {

            $Soumission->setEtat($em->getRepository("tutoBackofficeBundle:Etat")->findOneById('1'));
            $Soumission->setType($em->getRepository("tutoBackofficeBundle:Type")->findOneById('2'));
            $Soumission->setUser($this->getUser());
            $Soumission->setDateSoumission(new \DateTime());
            $questions = $em->getRepository('tutoBackofficeBundle:Question')->findAll();

            foreach ($questions as $quest) {


                $Soumission->addQuestion($quest);
            }
            $form->handleRequest($request);


            if ($form->isValid()) {
                $em->persist($Soumission);
                $adresse = $Soumission->getUser()->getEmail();


                $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, ' ssl')
                                ->setUsername('atmcolloque2018@gmail.com')->setPassword('ATM2018atm2018');

                $mailer = \Swift_Mailer::newInstance($transport);
                $message = \Swift_Message::newInstance()
                        ->setSubject('Votre papier a été soumis ')
                        ->setFrom('atmcolloque2018@gmail.com')
                        ->setTo($adresse)
                        ->setBody($this->renderView('tutoBackofficeBundle:Soumission:email1.html.twig', array('soumission' => $Soumission)))
                ;

                $this->get('mailer')->send($message);

                $em->flush();

                $Soumission = $form->getData();
                $this->addFlash("success", "votre soumission a été ajoutée avec succès");
                return $this->redirectToRoute('tuto_soumission_ajout');
                // $message="un Etat est ajouté";
            }
        }
        return $this->render('tutoFrontofficeBundle:Soumission:ajout.html.twig', array(
                    'form' => $form->createView(),
                        )
        );
    }

    public function ajout2Action() {

        $em = $this->getDoctrine()->getManager();
        $Soumission = new Soumission();

        $form = $this->createForm(new SoumissionType1(), $Soumission);

        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') {

            $Soumission->setEtat($em->getRepository("tutoBackofficeBundle:Etat")->findOneById('1'));
            $Soumission->setType($em->getRepository("tutoBackofficeBundle:Type")->findOneById('3'));
            $Soumission->setUser($this->getUser());
            $Soumission->setDateSoumission(new \DateTime());
            $questions = $em->getRepository('tutoBackofficeBundle:Question')->findAll();

            foreach ($questions as $quest) {


                $Soumission->addQuestion($quest);
            }
            $form->handleRequest($request);


            if ($form->isValid()) {
                $em->persist($Soumission);
                $adresse = $Soumission->getUser()->getEmail();


                $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, ' ssl')
                                ->setUsername('atmcolloque2018@gmail.com')->setPassword('ATM2018atm2018');

                $mailer = \Swift_Mailer::newInstance($transport);
                $message = \Swift_Message::newInstance()
                        ->setSubject('Votre papier a été soumis')
                        ->setFrom('atmcolloque2018@gmail.com')
                        ->setTo($adresse)
                        ->setBody($this->renderView('tutoBackofficeBundle:Soumission:email1.html.twig', array('soumission' => $Soumission)))
                ;

                $this->get('mailer')->send($message);
                $em->flush();

                $Soumission = $form->getData();
                $this->addFlash("success", "votre soumission a été ajoutée avec succès");
                return $this->redirectToRoute('tuto_soumission_ajout');
                // $message="un Etat est ajouté";
            }
        }
        return $this->render('tutoFrontofficeBundle:Soumission:ajout.html.twig', array(
                    'form' => $form->createView(),
                        )
        );
    }

    public function ajout3Action() {

        $em = $this->getDoctrine()->getManager();
        $Soumission = new Soumission();

        $form = $this->createForm(new SoumissionType1(), $Soumission);

        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') {

            $Soumission->setEtat($em->getRepository("tutoBackofficeBundle:Etat")->findOneById('1'));
            $Soumission->setType($em->getRepository("tutoBackofficeBundle:Type")->findOneById('4'));
            $Soumission->setUser($this->getUser());
            $Soumission->setDateSoumission(new \DateTime());
            $questions = $em->getRepository('tutoBackofficeBundle:Question')->findAll();

            foreach ($questions as $quest) {


                $Soumission->addQuestion($quest);
            }
            $form->handleRequest($request);


            if ($form->isValid()) {
                $em->persist($Soumission);
                $adresse = $Soumission->getUser()->getEmail();


                $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, ' ssl')
                                ->setUsername('atmcolloque2018@gmail.com')->setPassword('ATM2018atm2018');

                $mailer = \Swift_Mailer::newInstance($transport);
                $message = \Swift_Message::newInstance()
                        ->setSubject('Votre papier a été soumis ')
                        ->setFrom('atmcolloque2018@gmail.com')
                        ->setTo($adresse)
                        ->setBody($this->renderView('tutoBackofficeBundle:Soumission:email1.html.twig', array('soumission' => $Soumission)))
                ;

                $this->get('mailer')->send($message);
                $em->flush();

                $Soumission = $form->getData();
                $this->addFlash("success", "votre soumission a été ajoutée avec succès");
                return $this->redirectToRoute('tuto_soumission_ajout');
                // $message="un Etat est ajouté";
            }
        }
        return $this->render('tutoFrontofficeBundle:Soumission:ajout.html.twig', array(
                    'form' => $form->createView(),
                        )
        );
    }
    public function ajoutenAction() {

        $em = $this->getDoctrine()->getManager();
        $Soumission = new Soumission();

        $form = $this->createForm(new SoumissionType1(), $Soumission
        );


        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') {

            $Soumission->setEtat($em->getRepository("tutoBackofficeBundle:Etat")->findOneById('1'));
            $Soumission->setType($em->getRepository("tutoBackofficeBundle:Type")->findOneById('1'));
            $Soumission->setUser($this->getUser());
            $Soumission->setDateSoumission(new \DateTime());



            $questions = $em->getRepository('tutoBackofficeBundle:Question')->findAll();

            foreach ($questions as $quest) {


                $Soumission->addQuestion($quest);
            }

            $form->handleRequest($request);
            if ($form->isValid()) {
                $em->persist($Soumission);
                $adresse = $Soumission->getUser()->getEmail();


                $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, ' ssl')
                                ->setUsername('atmcolloque2018@gmail.com')->setPassword('ATM2018atm2018');

                $mailer = \Swift_Mailer::newInstance($transport);
                $message = \Swift_Message::newInstance()
                        ->setSubject('Votre papier a été soumis ')
                        ->setFrom('atmcolloque2018@gmail.com')
                        ->setTo($adresse)
                        ->setBody($this->renderView('tutoBackofficeBundle:Soumission:email1.html.twig', array('soumission' => $Soumission)))
                ;

                $this->get('mailer')->send($message);

                $em->flush();

                $Soumission = $form->getData();



                $this->addFlash("success", "votre soumission a été ajoutée avec succès");
                return $this->redirectToRoute('tuto_soumission_ajout');
                // $message="un Etat est ajouté";
            }
        }
        return $this->render('tutoFrontofficeBundle:Soumission:ajouten.html.twig', array(
                    'form' => $form->createView(),
                        )
        );
    }

    public function ajout1enAction() {

        $em = $this->getDoctrine()->getManager();
        $Soumission = new Soumission();

        $form = $this->createForm(new SoumissionType1(), $Soumission);

        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') {

            $Soumission->setEtat($em->getRepository("tutoBackofficeBundle:Etat")->findOneById('1'));
            $Soumission->setType($em->getRepository("tutoBackofficeBundle:Type")->findOneById('2'));
            $Soumission->setUser($this->getUser());
            $Soumission->setDateSoumission(new \DateTime());
            $questions = $em->getRepository('tutoBackofficeBundle:Question')->findAll();

            foreach ($questions as $quest) {


                $Soumission->addQuestion($quest);
            }
            $form->handleRequest($request);


            if ($form->isValid()) {
                $em->persist($Soumission);
                $adresse = $Soumission->getUser()->getEmail();


                $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, ' ssl')
                                ->setUsername('atmcolloque2018@gmail.com')->setPassword('ATM2018atm2018');

                $mailer = \Swift_Mailer::newInstance($transport);
                $message = \Swift_Message::newInstance()
                        ->setSubject('Votre papier a été soumis')
                        ->setFrom('atmcolloque2018@gmail.com')
                        ->setTo($adresse)
                        ->setBody($this->renderView('tutoBackofficeBundle:Soumission:email1.html.twig', array('soumission' => $Soumission)))
                ;

                $this->get('mailer')->send($message);

                $em->flush();

                $Soumission = $form->getData();
                $this->addFlash("success", "votre soumission a été ajoutée avec succès");
                return $this->redirectToRoute('tuto_soumission_ajout');
                // $message="un Etat est ajouté";
            }
        }
        return $this->render('tutoFrontofficeBundle:Soumission:ajouten.html.twig', array(
                    'form' => $form->createView(),
                        )
        );
    }

    public function ajout2enAction() {

        $em = $this->getDoctrine()->getManager();
        $Soumission = new Soumission();

        $form = $this->createForm(new SoumissionType1(), $Soumission);

        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') {

            $Soumission->setEtat($em->getRepository("tutoBackofficeBundle:Etat")->findOneById('1'));
            $Soumission->setType($em->getRepository("tutoBackofficeBundle:Type")->findOneById('3'));
            $Soumission->setUser($this->getUser());
            $Soumission->setDateSoumission(new \DateTime());
            $questions = $em->getRepository('tutoBackofficeBundle:Question')->findAll();

            foreach ($questions as $quest) {


                $Soumission->addQuestion($quest);
            }
            $form->handleRequest($request);


            if ($form->isValid()) {
                $em->persist($Soumission);
                $adresse = $Soumission->getUser()->getEmail();


                $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, ' ssl')
                                ->setUsername('atmcolloque2018@gmail.com')->setPassword('ATM2018atm2018');

                $mailer = \Swift_Mailer::newInstance($transport);
                $message = \Swift_Message::newInstance()
                        ->setSubject('ACCUSE RECEPTION SOUMISSION ATM ')
                        ->setFrom('atmcolloque2018@gmail.com')
                        ->setTo($adresse)
                        ->setBody($this->renderView('tutoBackofficeBundle:Soumission:email1.html.twig', array('soumission' => $Soumission)))
                ;

                $this->get('mailer')->send($message);
                $em->flush();

                $Soumission = $form->getData();
                $this->addFlash("success", "votre soumission a été ajoutée avec succès");
                return $this->redirectToRoute('tuto_soumission_ajout');
                // $message="un Etat est ajouté";
            }
        }
        return $this->render('tutoFrontofficeBundle:Soumission:ajouten.html.twig', array(
                    'form' => $form->createView(),
                        )
        );
    }

    public function ajout3enAction() {

        $em = $this->getDoctrine()->getManager();
        $Soumission = new Soumission();

        $form = $this->createForm(new SoumissionType1(), $Soumission);

        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') {

            $Soumission->setEtat($em->getRepository("tutoBackofficeBundle:Etat")->findOneById('1'));
            $Soumission->setType($em->getRepository("tutoBackofficeBundle:Type")->findOneById('4'));
            $Soumission->setUser($this->getUser());
            $Soumission->setDateSoumission(new \DateTime());
            $questions = $em->getRepository('tutoBackofficeBundle:Question')->findAll();

            foreach ($questions as $quest) {


                $Soumission->addQuestion($quest);
            }
            $form->handleRequest($request);


            if ($form->isValid()) {
                $em->persist($Soumission);
                $adresse = $Soumission->getUser()->getEmail();


                $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, ' ssl')
                                ->setUsername('atmcolloque2018@gmail.com')->setPassword('ATM2018atm2018');

                $mailer = \Swift_Mailer::newInstance($transport);
                $message = \Swift_Message::newInstance()
                        ->setSubject('ACCUSE RECEPTION SOUMISSION ATM ')
                        ->setFrom('atmcolloque2018@gmail.com')
                        ->setTo($adresse)
                        ->setBody($this->renderView('tutoBackofficeBundle:Soumission:email1.html.twig', array('soumission' => $Soumission)))
                ;

                $this->get('mailer')->send($message);
                $em->flush();

                $Soumission = $form->getData();
                $this->addFlash("success", "votre soumission a été ajoutée avec succès");
                return $this->redirectToRoute('tuto_soumission_ajout');
                // $message="un Etat est ajouté";
            }
        }
        return $this->render('tutoFrontofficeBundle:Soumission:ajouten.html.twig', array(
                    'form' => $form->createView(),
                        )
        );
    }

    public function afficheAction(\tuto\BackofficeBundle\Entity\Soumission $id, \tuto\BackofficeBundle\Entity\Notification $notifId) {
        $em = $this->getDoctrine()->getManager();
        $notification = $em->getRepository('tutoBackofficeBundle:Notification')->findBy(array('soumission' => $id, 'user' => $this->getUser()));
        $notif = $em->find("tutoBackofficeBundle:Notification", $notifId);

        $notif->setLu(true);
        $em->persist($notif);
        $em->flush();
        return $this->render('tutoFrontofficeBundle:Soumission:affiche.html.twig', array('notification' => $notification));
    }
   
     public function affichenAction(\tuto\BackofficeBundle\Entity\Soumission $id, \tuto\BackofficeBundle\Entity\Notification $notifId) {
        $em = $this->getDoctrine()->getManager();
        $notification = $em->getRepository('tutoBackofficeBundle:Notification')->findBy(array('soumission' => $id, 'user' => $this->getUser()));
        $notif = $em->find("tutoBackofficeBundle:Notification", $notifId);

        $notif->setLu(true);
        $em->persist($notif);
        $em->flush();
        return $this->render('tutoFrontofficeBundle:Soumission:affichen.html.twig', array('notification' => $notification));
    }

    public function affiche1Action(\tuto\BackofficeBundle\Entity\Soumission $id) {
        $em = $this->getDoctrine()->getManager();
        $notification = $em->getRepository('tutoBackofficeBundle:Notification')->findBy(array('soumission' => $id, 'user' => $this->getUser()));


        $em->flush();
        return $this->render('tutoFrontofficeBundle:Soumission:affiche.html.twig', array('notification' => $notification));
    }
    public function pagetypeAction() {
       
        return $this->render('tutoFrontofficeBundle:Soumission:pagetype.html.twig');
    }

}
