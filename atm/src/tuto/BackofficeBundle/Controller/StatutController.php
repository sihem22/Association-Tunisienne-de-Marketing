<?php

namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Statut;
use tuto\BackofficeBundle\Form\StatutType;
use Symfony\Component\HttpFoundation\Response;

class StatutController extends Controller {

    public function ajoutAction() {
       
        $em = $this->getDoctrine()->getManager();
        $Statut = new Statut();
        $form = $this->createForm(new StatutType(), $Statut,array('validation_groups'=>'Statut'));
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
            $form->handleRequest($request); {
            if ($form->isValid()) {
                $em->persist($Statut);
                $em->flush();
                
                $this->addFlash("success", "Le titre a été ajouté avec succès");
                return $this->redirectToRoute('tuto_statut');
                // $message="une Delegation est ajoutée";
            }
        }
        return $this->render('tutoBackofficeBundle:Statut:ajout.html.twig', array(
                    'form' => $form->createView(),
                   
                        )
                );
    }

    public function afficheAction() {
        $em = $this->getDoctrine()->getManager();
        $statut = $em->getRepository('tutoBackofficeBundle:Statut')->findAll();
        return $this->render('tutoBackofficeBundle:Statut:affiche.html.twig', array('statut' => $statut));
    }

    public function modifierAction($id) {
       
        $em = $this->getDoctrine()->getManager();
        $Statut = $em->getRepository('tutoBackofficeBundle:Statut')->find($id);


        $form = $this->createForm(new StatutType(), $Statut);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
            $form->handleRequest($request); {
            if ($form->isValid()) {
                $em->flush();
                $this->addFlash("success", "le titre été modifié avec succés");
                return $this->redirectToRoute('tuto_statut');
                
            }
        }
        return $this->render('tutoBackofficeBundle:Statut:modif.html.twig', array(
                    'form' => $form->createView(),
                  
                        )
                );
    }

    public function supprimerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $Statut = $em->find('tutoBackofficeBundle:Statut', $id);
        if (!$Statut) {
            throw $this->createNotFoundException('Statut avec l\'id ' . $id . ' n\'existe pas');
        }
        $em->remove($Statut);
        $em->flush();
        $this->addFlash("success", "le titre a été supprimé avec succès");
        return $this->redirectToRoute('tuto_statut');
      
    }

}

