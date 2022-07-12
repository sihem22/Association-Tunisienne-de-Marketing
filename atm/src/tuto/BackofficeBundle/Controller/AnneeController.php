<?php

namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Annee;
use tuto\BackofficeBundle\Form\AnneeType;
use Symfony\Component\HttpFoundation\Response;

class AnneeController extends Controller {

    public function ajoutAction() {
        
        $em = $this->getDoctrine()->getManager();
        $Annee = new Annee();
        $form = $this->createForm(new AnneeType(), $Annee,array('validation_groups'=>'Annee'));
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
            $form->handleRequest($request); {
            if ($form->isValid()) {
                $em->persist($Annee);
                $em->flush();
                
                $this->addFlash("success", "une  année a été ajoutée avec succès");
                return $this->redirectToRoute('tuto_annee');
                // $message="une Delegation est ajoutée";
            }
        }
        return $this->render('tutoBackofficeBundle:Annee:ajout.html.twig', array(
                    'form' => $form->createView(),
                    
                        )
                );
    }

    public function afficheAction() {
        $em = $this->getDoctrine()->getManager();
        $annee = $em->getRepository('tutoBackofficeBundle:Annee')->findAll();
        return $this->render('tutoBackofficeBundle:Annee:affiche.html.twig', array('annee' => $annee));
    }



    public function supprimerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $Annee = $em->find('tutoBackofficeBundle:Annee', $id);
        if (!$Annee) {
            throw $this->createNotFoundException('Annee avec l\'id ' . $id . ' n\'existe pas');
        }
        $em->remove($Annee);
        $em->flush();
        $this->addFlash("success", "Une année a été supprimée avec succès");
        return $this->redirectToRoute('tuto_annee');
      
    }
     public function modifierAction($id) {
        $message = "Modifier une Année";
        $em = $this->getDoctrine()->getManager();
        $Annee = $em->getRepository('tutoBackofficeBundle:Annee')->find($id);


        $form = $this->createForm(new AnneeType(), $Annee);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {

            $form->handleRequest($request);
            if (true) {
                $Annee = $form->getData();
                $em->persist($Annee);
                $em->flush();
                $this->addFlash("success", "L'article a été modifié avec succès");
                return $this->redirectToRoute('tuto_annee');
                //$message="un membre est modifiée";
            }
        }
        return $this->render('tutoBackofficeBundle:Annee:modif.html.twig', array(
                    'form' => $form->createView(),
                    'msg' => $message,
                        )
        );
    }

}

