<?php

namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MembrescController extends Controller
{
   public function membrescAction() {
        $em = $this->getDoctrine()->getManager();
        $membres = $em->getRepository("tutoBackofficeBundle:Membre")->findAll();
        return $this->render('tutoFrontofficeBundle:Membresc:membresc.html.twig', array(
                    'membres' => $membres));
}
public function membrescenAction() {
        $em = $this->getDoctrine()->getManager();
        $membres = $em->getRepository("tutoBackofficeBundle:Membre")->findAll();
        return $this->render('tutoFrontofficeBundle:Membresc:membrescen.html.twig', array(
                    'membres' => $membres));
}
   }
