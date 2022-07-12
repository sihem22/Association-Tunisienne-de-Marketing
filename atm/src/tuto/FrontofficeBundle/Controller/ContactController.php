<?php
namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Contact;
use tuto\BackofficeBundle\Form\ContactType;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller {
    public function ajoutAction() {

        $em = $this->getDoctrine()->getManager();
        $Contact = new Contact();
        $form = $this->createForm(new ContactType(), $Contact);
        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') 
        {
            $Contact->setEtat($em->getRepository("tutoBackofficeBundle:Etat")->findOneById('1'));
                    
            $form->handleRequest($request);
    
            if ($form->isValid()) 
            {
                $em->persist($Contact);
                $em->flush();

                $Contact = $form->getData();
                $this->addFlash("success", "votre email a été envoyé avec succès , merci pour nous contacter");            
            }   // $message="une Categorie est ajoutée";
        }
        return $this->render('tutoFrontofficeBundle:Contact:ajout.html.twig', array(
                    'form' => $form->createView(),
                        ));
    }
    //put your code here



    public function ajoutenAction()
    {
        $message="Send message";
        $em=$this->getDoctrine()->getManager();
        $Contact = new Contact();
        $form=$this-> createForm(new ContactType(),$Contact);
        $request=$this->getRequest();
        if ( $request->getMethod()=='POST')
            $form->handleRequest($request);
            
        { if ($form->isValid())
             
        { $em->persist($Contact);
        $em->flush();
       
        $Contact=$form->getData();
        $this->addFlash("success", "your mail has been sent successfuly, thank you for contacting us");
        return $this->redirectToRoute('front_contacten');
        // $message="une message est ajoutée";
        }
        }
        return $this->render('tutoFrontofficeBundle:Contact:ajouten.html.twig', array(
                'form'=>$form->createView() , 
                  'msg'=>$message ,
        )
        ) ;
    }
}
