<?php

namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Membre;
use tuto\BackofficeBundle\Form\MembreType;
use Symfony\Component\HttpFoundation\Response;

class MembreController extends Controller {

    public function ajoutAction() {
        $message = "Ajouter un Membre";
        $em = $this->getDoctrine()->getManager();
        $Membre = new Membre();
        $form = $this->createForm(new MembreType(), $Membre);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
            $form->handleRequest($request);
        {
            if ($form->isValid()) {
                $em->persist($Membre);
                $em->flush();

                $Membre = $form->getData();
                $this->addFlash("success", "Le membre a été ajouté avec succès");
                return $this->redirectToRoute('tuto_membre');
                // $message="un membre est ajoutée";
            }
        }
        return $this->render('tutoBackofficeBundle:Membre:edit.html.twig', array(
                    'form' => $form->createView(),
                    'msg' => $message,
                        )
        );
    }

    public function afficheAction() {
        $em = $this->getDoctrine()->getManager();
        $membres = $em->getRepository('tutoBackofficeBundle:Membre')->findAll();
        return $this->render('tutoBackofficeBundle:Membre:membre.html.twig', array('membres' => $membres));
    }

    public function modifierAction($id) {
        $message = "Modifier un membre";
        $em = $this->getDoctrine()->getManager();
        $Membre = $em->getRepository('tutoBackofficeBundle:Membre')->find($id);


        $form = $this->createForm(new MembreType(), $Membre);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {

            $form->handleRequest($request);
            if (true) {
                $Membre = $form->getData();
                $em->persist($Membre);
                $em->flush();
                $this->addFlash("success", "Le membre a été modifié avec succès");
                return $this->redirectToRoute('tuto_membre');
                //$message="un membre est modifiée";
            }
        }
        return $this->render('tutoBackofficeBundle:Membre:modif.html.twig', array(
                    'form' => $form->createView(),
                    'msg' => $message,
                        )
        );
    }

    public function supprimerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $Membre = $em->find('tutoBackofficeBundle:Membre', $id);
        if (!$Membre) {
            throw $this->createNotFoundException('Membre avec l\'id ' . $id . ' n\'existe pas');
        }
        $em->remove($Membre);
        $em->flush();
        $this->addFlash("success", "Le membre a été supprimé avec succès");
        return $this->redirectToRoute('tuto_membre');

        //return new Response("Membre supprimée avec succées");
    }

}

