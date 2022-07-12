<?php

namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\File;
use tuto\BackofficeBundle\Form\FileType;
use Symfony\Component\HttpFoundation\Response;

class FileController extends Controller {

    public function ajoutAction() {
        
        $em = $this->getDoctrine()->getManager();
        $File = new File();
        $form = $this->createForm(new FileType(), $File,array('validation_groups'=>'File'));
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
            $form->handleRequest($request); {
            if ($form->isValid()) {
                $em->persist($File);
                $em->flush();
                
                $this->addFlash("success", "un fichier a été ajouté avec succès");
                return $this->redirectToRoute('tuto_file');
                // $message="une Delegation est ajoutée";
            }
        }
        return $this->render('tutoBackofficeBundle:file:ajout.html.twig', array(
                    'form' => $form->createView(),
                    
                        )
                );
    }

    public function afficheAction() {
        $em = $this->getDoctrine()->getManager();
        $file = $em->getRepository('tutoBackofficeBundle:File')->findAll();
        return $this->render('tutoBackofficeBundle:File:affiche.html.twig', array('file' => $file));
    }



    public function supprimerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $File = $em->find('tutoBackofficeBundle:File', $id);
        if (!$File) {
            throw $this->createNotFoundException('File avec l\'id ' . $id . ' n\'existe pas');
        }
        $em->remove($File);
        $em->flush();
        $this->addFlash("success", "Un fichier a été supprimé avec succès");
        return $this->redirectToRoute('tuto_file');
      
    }
      public function modifierAction($id) {
        $message = "Modifier un fichier";
        $em = $this->getDoctrine()->getManager();
        $File = $em->getRepository('tutoBackofficeBundle:File')->find($id);


        $form = $this->createForm(new FileType(), $File);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {

            $form->handleRequest($request);
            if (true) {
                $File = $form->getData();
                $em->persist($File);
                $em->flush();
                $this->addFlash("success", "Le fichier a été modifié avec succès");
                return $this->redirectToRoute('tuto_file');
                //$message="un membre est modifiée";
            }
        }
        return $this->render('tutoBackofficeBundle:File:modif.html.twig', array(
                    'form' => $form->createView(),
                    'msg' => $message,
                        )
        );
    }

}

