<?php

namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction() {
        return $this->render('tutoFrontofficeBundle:Default:index.html.twig');
    }
     public function indexenAction() {
        return $this->render('tutoFrontofficeBundle:Default:indexen.html.twig');
    }

    public function signupAction() {
        return $this->render('tutoFrontofficeBundle:SignUp:signup.html.twig');
    }
    public function signupenAction() {
        return $this->render('tutoFrontofficeBundle:SignUp:signupen.html.twig');
    }

    public function afficheAction() {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('tutoBackofficeBundle:User')->findById($this->getUser());
        return $this->render('tutoFrontofficeBundle:Chercheur:image.html.twig', array('user' => $user));
    }
     public function affiche1Action() {
        $em = $this->getDoctrine()->getManager();
        $slider = $em->getRepository("tutoBackofficeBundle:Slider")->findAll();
        return $this->render('tutoFrontofficeBundle:Default:affiche.html.twig', array(
                    'slider' => $slider));
    }
    public function affiche2Action() {
        $em = $this->getDoctrine()->getManager();
        $file = $em->getRepository("tutoBackofficeBundle:File")->findAll();
        return $this->render('tutoFrontofficeBundle:file:coverletter.html.twig', array(
                    'file' => $file));
    }
     public function affiche3Action() {
        $em = $this->getDoctrine()->getManager();
        $file = $em->getRepository("tutoBackofficeBundle:File")->findAll();
        return $this->render('tutoFrontofficeBundle:file:manuscript.html.twig', array(
                    'file' => $file));
    }
     public function affiche4Action() {
        $em = $this->getDoctrine()->getManager();
        $file = $em->getRepository("tutoBackofficeBundle:File")->findAll();
        return $this->render('tutoFrontofficeBundle:file:AtelierDoctoral.html.twig', array(
                    'file' => $file));
    }
    public function affiche5Action() {
        $em = $this->getDoctrine()->getManager();
        $file = $em->getRepository("tutoBackofficeBundle:File")->findAll();
        return $this->render('tutoFrontofficeBundle:file:communication.html.twig', array(
                    'file' => $file));
    }
    public function affiche6Action() {
        $em = $this->getDoctrine()->getManager();
        $file = $em->getRepository("tutoBackofficeBundle:File")->findAll();
        return $this->render('tutoFrontofficeBundle:file:modeleEtFigure.html.twig', array(
                    'file' => $file));
    }
     public function affiche7Action() {
        $em = $this->getDoctrine()->getManager();
        $file = $em->getRepository("tutoBackofficeBundle:File")->findAll();
        return $this->render('tutoFrontofficeBundle:file:inscription.html.twig', array(
                    'file' => $file));
    }
}
