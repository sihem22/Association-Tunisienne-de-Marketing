<?php

namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Pays;
use tuto\BackofficeBundle\Form\PaysType;
use Symfony\Component\HttpFoundation\Response;

class PaysController extends Controller {

    public function ajoutAction() {
       
        $em = $this->getDoctrine()->getManager();
        $Pays = new Pays();
        $form = $this->createForm(new PaysType(), $Pays,array('validation_groups'=>'Pays'));
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
            $form->handleRequest($request); {
            if ($form->isValid()) {
                $em->persist($Pays);
                $em->flush();
                
                $this->addFlash("success", "Un pays a été ajouté avec sucées");
                return $this->redirectToRoute('tuto_pays');
                // $message="une Delegation est ajoutée";
            }
        }
        return $this->render('tutoBackofficeBundle:Pays:ajout.html.twig', array(
                    'form' => $form->createView(),
                   
                        )
                );
    }

    public function afficheAction() {
        $em = $this->getDoctrine()->getManager();
        $pays = $em->getRepository('tutoBackofficeBundle:Pays')->findAll();
        return $this->render('tutoBackofficeBundle:Pays:affiche.html.twig', array('pays' => $pays));
    }

    public function modifierAction($id) {
      
        $em = $this->getDoctrine()->getManager();
        $Pays = $em->getRepository('tutoBackofficeBundle:Pays')->find($id);


        $form = $this->createForm(new PaysType(), $Pays);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
            $form->handleRequest($request); {
            if ($form->isValid()) {
                $em->flush();
                $this->addFlash("success", "votre Pays a été modifié avec sucées");
                return $this->redirectToRoute('tuto_pays');
                
            }
        }
        return $this->render('tutoBackofficeBundle:Pays:modif.html.twig', array(
                    'form' => $form->createView(),
                   
                        )
                );
    }

    public function supprimerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $Pays = $em->find('tutoBackofficeBundle:Pays', $id);
        if (!$Pays) {
            throw $this->createNotFoundException('Pays avec l\'id ' . $id . ' n\'existe pas');
        }
        $em->remove($Pays);
        $em->flush();
        $this->addFlash("success", "Un pays a été supprimé avec sucées");
        return $this->redirectToRoute('tuto_pays');
      
    }

}

