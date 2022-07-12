<?php

namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Contact;
use tuto\BackofficeBundle\Form\ContactType;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller {

    public function contactAction() {
        $em = $this->getDoctrine()->getManager();
        $contacts = $em->getRepository('tutoBackofficeBundle:Contact')->findAll();
        return $this->render('tutoBackofficeBundle:Contact:contact.html.twig', array('contacts' => $contacts));
    }

    public function modifierAction($id, Request $request) {
        $em = $this->getDoctrine()->getManager();
        $Contact = $em->find("tutoBackofficeBundle:Contact", $id);
        $Contact->setEtat($em->getRepository("tutoBackofficeBundle:Etat")->findOneById('8'));
        
        $em->persist($Contact);

        if ($request->getMethod() == "POST") {
            $valide = $Contact->getEtat();
            $adresse = $Contact->getEmail();
            if ($valide->getId() == 8) {

                $Subject = $request->request->get('Subject');

                $message = $request->request->get('message');

                $mailer = $this->container->get('mailer');
               $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, ' ssl')
                            ->setUsername('yahia1.sarra2@gmail.com')->setPassword('SSsarra753..');


                $mailer = \Swift_Mailer::newInstance($transport);
                $message = \Swift_Message::newInstance()
                        ->setSubject($Subject)
                        ->setFrom('yahia1.sarra2@gmail.com')
                        ->setTo($adresse)
                        ->setBody($message)
                ;

                $this->get('mailer')->send($message);
            }

            $em->flush();
            $this->addFlash("success", "votre email a été envoyé avec succés");
            return $this->redirectToRoute('tuto_contact');
            //$message="une categorie est modifiée";
        }
        return $this->render('tutoBackofficeBundle:Default:mail.html.twig', array(
                    'Contact' => $Contact
                        )
        );
    }

    public function notifcontactadminAction() {
        $em = $this->getDoctrine()->getManager();
        $contacts = $em->getRepository('tutoBackofficeBundle:Contact')->findByetat();
        return $this->render('tutoBackofficeBundle:Contact:notifcontactadmin.html.twig', array('contacts' => $contacts));
    }

    public function countAction() {
        $em = $this->getDoctrine()->getManager();
        $nb = $em->getRepository('tutoBackofficeBundle:Contact')->count();

        return new Response($nb);
    }
      public function supprimerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $Contact = $em->find('tutoBackofficeBundle:Contact', $id);
        if (!$Contact) {
            throw $this->createNotFoundException('Contact avec l\'id ' . $id . ' n\'existe pas');
        }
        $em->remove($Contact);
        $em->flush();
        $this->addFlash("success", "le contact a été supprimé avec succès");
        return $this->redirectToRoute('tuto_contact');
      
    }
     public function afficheAction($id) {
        $em = $this->getDoctrine()->getManager();
        $contact = $em->getRepository('tutoBackofficeBundle:Contact')->findBy(array('id' => $id));
       
        return $this->render('tutoBackofficeBundle:Contact:affiche.html.twig', array('contact' => $contact));
    }



}
