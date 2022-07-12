<?php

namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Cherch;
use tuto\BackofficeBundle\Form\CherchType;
use Symfony\Component\HttpFoundation\Response;

class CherchController extends Controller {

    public function ajoutAction() {
       
        $em = $this->getDoctrine()->getManager();
        $Cherch = new Cherch();
        $form = $this->createForm(new CherchType(), $Cherch,array('validation_groups'=>'Cherch'));
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
            $form->handleRequest($request); {
            if ($form->isValid()) {
                $em->persist($Cherch);
                $em->flush();
                
                $this->addFlash("success", "Un chercheur a été ajouté avec succès");
                return $this->redirectToRoute('tuto_cherch');
                // $message="une Delegation est ajoutée";
            }
        }
        return $this->render('tutoBackofficeBundle:Cherch:ajout.html.twig', array(
                    'form' => $form->createView(),
                   
                        )
                );
    }

    public function afficheAction() {
        $em = $this->getDoctrine()->getManager();
        $cherch = $em->getRepository('tutoBackofficeBundle:Cherch')->findAll();
        return $this->render('tutoBackofficeBundle:Cherch:affiche.html.twig', array('cherch' => $cherch));
    }

    public function modifierAction($id) {
        $message = "Modifier un chercheur";
        $em = $this->getDoctrine()->getManager();
        $Cherch = $em->getRepository('tutoBackofficeBundle:Cherch')->find($id);


        $form = $this->createForm(new CherchType(), $Cherch);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
            $form->handleRequest($request); {
            if ($form->isValid()) {
                $em->flush();
                $this->addFlash("success", "Un chercheur a été modifié avec succès");
                return $this->redirectToRoute('tuto_cherch');
                
            }
        }
        return $this->render('tutoBackofficeBundle:Cherch:modif.html.twig', array(
                    'form' => $form->createView(),
                    'msg' => $message,
                        )
                );
    }

    public function supprimerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $Cherch = $em->find('tutoBackofficeBundle:Cherch', $id);
        if (!$Cherch) {
            throw $this->createNotFoundException('Chercheur avec l\'id ' . $id . ' n\'existe pas');
        }
        $em->remove($Cherch);
        $em->flush();
        $this->addFlash("success", "Un chercheur a été supprimé avec succès");
        return $this->redirectToRoute('tuto_cherch');
      
    }

}

