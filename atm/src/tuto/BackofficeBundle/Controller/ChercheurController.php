<?php

namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Chercheur;
use tuto\BackofficeBundle\Form\ChercheurType;
use Symfony\Component\HttpFoundation\Response;

class ChercheurController extends Controller {

    public function ajoutAction() {
       
        $em = $this->getDoctrine()->getManager();
        $Chercheur = new Chercheur();
        $form = $this->createForm(new ChercheurType(), $Chercheur,array('validation_groups'=>'Chercheur'));
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
            $form->handleRequest($request); {
            if ($form->isValid()) {
                $em->persist($Chercheur);
                $em->flush();
                
                $this->addFlash("success", "Un évaluateur a été ajouté avec succès");
                return $this->redirectToRoute('tuto_chercheur');
                // $message="une Delegation est ajoutée";
            }
        }
        return $this->render('tutoBackofficeBundle:Chercheur:ajout.html.twig', array(
                    'form' => $form->createView(),
                   
                        )
                );
    }

    public function afficheAction() {
        $em = $this->getDoctrine()->getManager();
        $chercheur = $em->getRepository('tutoBackofficeBundle:Chercheur')->findAll();
        return $this->render('tutoBackofficeBundle:Chercheur:affiche.html.twig', array('chercheur' => $chercheur));
    }

    public function modifierAction($id) {
        $message = "Modifier un chercheur";
        $em = $this->getDoctrine()->getManager();
        $Chercheur = $em->getRepository('tutoBackofficeBundle:Chercheur')->find($id);


        $form = $this->createForm(new ChercheurType(), $Chercheur);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
            $form->handleRequest($request); {
            if ($form->isValid()) {
                $em->flush();
                $this->addFlash("success", "Un évaluateur a été modifié avec succès");
                return $this->redirectToRoute('tuto_chercheur');
                
            }
        }
        return $this->render('tutoBackofficeBundle:Chercheur:modif.html.twig', array(
                    'form' => $form->createView(),
                    'msg' => $message,
                        )
                );
    }

    public function supprimerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $Chercheur = $em->find('tutoBackofficeBundle:Chercheur', $id);
        if (!$Chercheur) {
            throw $this->createNotFoundException('Chercheur avec l\'id ' . $id . ' n\'existe pas');
        }
        $em->remove($Chercheur);
        $em->flush();
        $this->addFlash("success", "Un évaluateur a été supprimé avec succès");
        return $this->redirectToRoute('tuto_chercheur');
      
    }

}

