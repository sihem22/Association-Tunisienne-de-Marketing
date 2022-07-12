<?php

namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Membreorg;
use tuto\BackofficeBundle\Form\MembreorgType;
use Symfony\Component\HttpFoundation\Response;

class MembreorgController extends Controller {

    public function ajoutAction() {
        $message = "Ajouter un Membre";
        $em = $this->getDoctrine()->getManager();
        $Membreorg = new Membreorg();
        $form = $this->createForm(new MembreorgType(), $Membreorg);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
            $form->handleRequest($request);
        {
            if ($form->isValid()) {
                $em->persist($Membreorg);
                $em->flush();

                $Membreorg = $form->getData();
                $this->addFlash("success", "Le membre a été ajouté avec succès");
                return $this->redirectToRoute('tuto_membreorg');
                // $message="un membre est ajoutée";
            }
        }
        return $this->render('tutoBackofficeBundle:Membreorg:edit.html.twig', array(
                    'form' => $form->createView(),
                    'msg' => $message,
                        )
        );
    }

    public function afficheAction() {
        $em = $this->getDoctrine()->getManager();
        $membreorgs = $em->getRepository('tutoBackofficeBundle:Membreorg')->findAll();
        return $this->render('tutoBackofficeBundle:Membreorg:membreorg.html.twig', array('membreorgs' => $membreorgs));
    }

    public function modifierAction($id) {
        $message = "Modifier un membre";
        $em = $this->getDoctrine()->getManager();
        $Membreorg = $em->getRepository('tutoBackofficeBundle:Membreorg')->find($id);


        $form = $this->createForm(new MembreorgType(), $Membreorg);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {

            $form->handleRequest($request);
            if (true) {
                $Membreorg = $form->getData();
                $em->persist($Membreorg);
                $em->flush();
                $this->addFlash("success", "Le membre a été modifié avec succès");
                return $this->redirectToRoute('tuto_membreorg');
                //$message="un membre est modifiée";
            }
        }
        return $this->render('tutoBackofficeBundle:Membreorg:modif.html.twig', array(
                    'form' => $form->createView(),
                    'msg' => $message,
                        )
        );
    }

    public function supprimerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $Membreorg = $em->find('tutoBackofficeBundle:Membreorg', $id);
        if (!$Membreorg) {
            throw $this->createNotFoundException('Membre avec l\'id ' . $id . ' n\'existe pas');
        }
        $em->remove($Membreorg);
        $em->flush();
        $this->addFlash("success", "Le membre a été supprimé avec succès");
        return $this->redirectToRoute('tuto_membreorg');

        //return new Response("Membre supprimée avec succées");
    }

}
