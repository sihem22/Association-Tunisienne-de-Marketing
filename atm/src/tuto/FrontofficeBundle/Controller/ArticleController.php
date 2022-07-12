<?php

namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends Controller {

    

    public function recherchettAction(Request $request) {
        $em = $this->getDoctrine()->getManager();




        if (is_array($motcle1 = $request->request->get('motcle1_'))) {
            foreach ($request->request->get('motcle1_') as $data) {
                $motcle1 = "," . $data;
                $motcle1 = substr($motcle, 6);
            }
        } else {
            $motcle1 = $request->request->get('motcle1_');
        }
        if (is_array($motcle2 = $request->request->get('motcle2_'))) {
            foreach ($request->request->get('motcle2_') as $data) {
                $motcle2 = "," . $data;
                $motcle2 = substr($motcle2, 6);
            }
        } else {
            $motcle2 = $request->request->get('motcle2_');
        }
        if (is_array($motcle3 = $request->request->get('motcle3_'))) {
            foreach ($request->request->get('motcle3_') as $data) {
                $motcle3 = "," . $data;
                $motcle3 = substr($motcle3, 6);
            }
        } else {
            $motcle3 = $request->request->get('motcle3_');
        }
        if (is_array($motcle4 = $request->request->get('motcle4_'))) {
            foreach ($request->request->get('motcle4_') as $data) {
                $motcle4 = "," . $data;
                $motcle4 = substr($motcle4, 6);
            }
        } else {
            $motcle4 = $request->request->get('motcle4_');
        }
        $articles1 = $em->getRepository('tutoBackofficeBundle:Article')->findByTitre($motcle1);
        $articles2 = $em->getRepository('tutoBackofficeBundle:Article')->findByType($motcle2);
        $articles3 = $em->getRepository('tutoBackofficeBundle:Article')->findByAnnee($motcle3);
        $articles4 = $em->getRepository('tutoBackofficeBundle:Article')->findByMotcle($motcle4);



        return $this->render('tutoFrontofficeBundle:Article:rechtt.html.twig', array(
                    'articles1' => $articles1, 'articles2' => $articles2, 'articles3' => $articles3, 'articles4' => $articles4));
    }
    public function recherchettenAction(Request $request) {
        $em = $this->getDoctrine()->getManager();




      
            $motcle1 = $request->request->get('motcle1_');
        
    
            $motcle2 = $request->request->get('motcle2_');
        
       
        
            $motcle3 = $request->request->get('motcle3_');
        
     
      
            $motcle4 = $request->request->get('motcle4_');
        
        $articles1 = $em->getRepository('tutoBackofficeBundle:Article')->findByTitre($motcle1);
        $articles2 = $em->getRepository('tutoBackofficeBundle:Article')->findByType($motcle2);
        $articles3 = $em->getRepository('tutoBackofficeBundle:Article')->findByAnnee($motcle3);
        $articles4 = $em->getRepository('tutoBackofficeBundle:Article')->findByMotcle($motcle4);



        return $this->render('tutoFrontofficeBundle:Article:rechtten.html.twig', array(
                    'articles1' => $articles1, 'articles2' => $articles2, 'articles3' => $articles3, 'articles4' => $articles4));
    }

    public function afficheAction() {
        $em = $this->getDoctrine()->getManager();
        $annee = $em->getRepository('tutoBackofficeBundle:Annee')->findAll();
        return $this->render('tutoFrontofficeBundle:Article:anne.html.twig', array('annee' => $annee));
    }
     public function affichenAction() {
        $em = $this->getDoctrine()->getManager();
        $annee = $em->getRepository('tutoBackofficeBundle:Annee')->findAll();
        return $this->render('tutoFrontofficeBundle:Article:Anneen.html.twig', array('annee' => $annee));
    }

    public function affiche1Action(\tuto\BackofficeBundle\Entity\Annee $id) {
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('tutoBackofficeBundle:Article')->findBy(array('annee' => $id));
        return $this->render('tutoFrontofficeBundle:Article:affiche.html.twig', array('article' => $article));
    }
    public function affiche1enAction(\tuto\BackofficeBundle\Entity\Annee $id) {
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('tutoBackofficeBundle:Article')->findBy(array('annee' => $id));
        return $this->render('tutoFrontofficeBundle:Article:affichen.html.twig', array('article' => $article));
    }

    public function affiche2Action(\tuto\BackofficeBundle\Entity\Annee $id, \tuto\BackofficeBundle\Entity\Type $id2) {
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('tutoBackofficeBundle:Article')->findBy(array('annee' => $id, 'type' => $id2));
        return $this->render('tutoFrontofficeBundle:Article:affiche.html.twig', array('article' => $article));
    }
    public function affiche2enAction(\tuto\BackofficeBundle\Entity\Annee $id, \tuto\BackofficeBundle\Entity\Type $id2) {
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('tutoBackofficeBundle:Article')->findBy(array('annee' => $id, 'type' => $id2));
        return $this->render('tutoFrontofficeBundle:Article:affichen.html.twig', array('article' => $article));
    }

}
