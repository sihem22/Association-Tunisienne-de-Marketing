<?php

namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\EnvoieMail;
use tuto\BackofficeBundle\Form\EnvoieMailType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class EnvoieMailController extends Controller {



    public function modifierAction( Request $request) {
 $em = $this->getDoctrine()->getManager();
        $EnvoieMail= new EnvoieMail();
        $form = $this->createForm(new EnvoieMailType(), $EnvoieMail,array('validation_groups'=>'EnvoieMail'));
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
            $form->handleRequest($request); {
            if ($form->isValid()) {
    

                //dump($request->request->get('question_' . $i));

                foreach ($EnvoieMail->getCherch() as $cherch) {

                    $adresse = $cherch->getAdresse();


                    $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, ' ssl')
                                    ->setUsername('atmcolloque2018@gmail.com')->setPassword('ATM2018atm2018');

                    $mailer = \Swift_Mailer::newInstance($transport);
                    $message = \Swift_Message::newInstance()
                            ->setSubject('Inscription sur le site du colloque ATM')
                            ->setFrom('atmcolloque2018@gmail.com')
                            ->setTo($adresse)
                           ->setBody($this->renderView('tutoBackofficeBundle:Email:mail1.html.twig', array('cherch' => $cherch)));
                    ;

                    $this->get('mailer')->send($message);
                
                }
               
                 $em->persist($EnvoieMail);
                $em->flush();
                
                $this->addFlash("success", "votre Email a été envoyé avec sucées");
                return $this->redirectToRoute('tuto_envoie_ajout');
                // $message="une Delegation est ajoutée";
            }
        }
        return $this->render('tutoBackofficeBundle:EnvoieMail:modif.html.twig', array(
                    'form' => $form->createView(),
                   
                        )
                );
}}