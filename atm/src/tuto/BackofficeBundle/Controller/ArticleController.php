<?php

namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Article;
use tuto\BackofficeBundle\Form\ArticleType;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller {

    public function ajoutAction() {
        $message = "Ajouter un Article";
        $em = $this->getDoctrine()->getManager();
        $Article = new Article();
        $form = $this->createForm(new ArticleType(), $Article);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
            $form->handleRequest($request);
        {
            if ($form->isValid()) {
                $em->persist($Article);
                $em->flush();

                $Article = $form->getData();
                $this->addFlash("success", "Un article a été ajouté avec succès");
                return $this->redirectToRoute('tuto_article');
                // $message="un membre est ajoutée";
            }
        }
        return $this->render('tutoBackofficeBundle:Article:edit.html.twig', array(
                    'form' => $form->createView(),
                    'msg' => $message,
                        )
        );
    }

    public function afficheAction() {
        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository('tutoBackofficeBundle:Article')->findAll();
        return $this->render('tutoBackofficeBundle:Article:article.html.twig', array('articles' => $articles));
    }

    public function modifierAction($id) {
        $message = "Modifier un Article";
        $em = $this->getDoctrine()->getManager();
        $Article = $em->getRepository('tutoBackofficeBundle:Article')->find($id);


        $form = $this->createForm(new ArticleType(), $Article);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {

            $form->handleRequest($request);
            if (true) {
                $Article = $form->getData();
                $em->persist($Article);
                $em->flush();
                $this->addFlash("success", "L'article a été modifié avec succès");
                return $this->redirectToRoute('tuto_article');
                //$message="un membre est modifiée";
            }
        }
        return $this->render('tutoBackofficeBundle:Article:modif.html.twig', array(
                    'form' => $form->createView(),
                    'msg' => $message,
                        )
        );
    }

    public function supprimerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $Article = $em->find('tutoBackofficeBundle:Article', $id);
        if (!$Article) {
            throw $this->createNotFoundException('Article avec l\'id ' . $id . ' n\'existe pas');
        }
        $em->remove($Article);
        $em->flush();
        $this->addFlash("success", "L'article a été supprimé avec succès");
        return $this->redirectToRoute('tuto_article');

        //return new Response("Membre supprimée avec succées");
    }

}
