<?php

namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Slider;
use tuto\BackofficeBundle\Form\SliderType;
use Symfony\Component\HttpFoundation\Response;

class SliderController extends Controller {

    public function ajoutAction() {
       
        $em = $this->getDoctrine()->getManager();
        $Slider = new Slider();
        $form = $this->createForm(new SliderType(), $Slider,array('validation_groups'=>'Slider'));
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
            $form->handleRequest($request); {
            if ($form->isValid()) {
                $em->persist($Slider);
                $em->flush();
                
                $this->addFlash("success", "Un slider a été ajouté avec sucées");
                return $this->redirectToRoute('tuto_slider');
                // $message="une Delegation est ajoutée";
            }
        }
        return $this->render('tutoBackofficeBundle:Slider:ajout.html.twig', array(
                    'form' => $form->createView(),
                   
                        )
                );
    }

    public function afficheAction() {
        $em = $this->getDoctrine()->getManager();
        $slider = $em->getRepository('tutoBackofficeBundle:Slider')->findAll();
        return $this->render('tutoBackofficeBundle:Slider:affiche.html.twig', array('slider' => $slider));
    }

    public function modifierAction($id) {
      
        $em = $this->getDoctrine()->getManager();
        $Slider = $em->getRepository('tutoBackofficeBundle:Slider')->find($id);


        $form = $this->createForm(new SliderType(), $Slider);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
            $form->handleRequest($request); {
            if ($form->isValid()) {
                $em->flush();
                $this->addFlash("success", "votre Slider a été modifié avec sucées");
                return $this->redirectToRoute('tuto_slider');
                
            }
        }
        return $this->render('tutoBackofficeBundle:Slider:modif.html.twig', array(
                    'form' => $form->createView(),
                   
                        )
                );
    }

    public function supprimerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $Slider = $em->find('tutoBackofficeBundle:Slider', $id);
        if (!$Slider) {
            throw $this->createNotFoundException('Slider avec l\'id ' . $id . ' n\'existe pas');
        }
        $em->remove($Slider);
        $em->flush();
        $this->addFlash("success", "Un slider a été supprimé avec sucées");
        return $this->redirectToRoute('tuto_slider');
      
    }

}

