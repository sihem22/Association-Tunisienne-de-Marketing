<?php

namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OrgController extends Controller
{
   public function orgAction() {
        $em = $this->getDoctrine()->getManager();
        $membreorgs = $em->getRepository("tutoBackofficeBundle:Membreorg")->findAll();
        return $this->render('tutoFrontofficeBundle:Org:org.html.twig', array(
                    'membreorgs' => $membreorgs));
}
 public function orgenAction() {
        $em = $this->getDoctrine()->getManager();
        $membreorgs = $em->getRepository("tutoBackofficeBundle:Membreorg")->findAll();
        return $this->render('tutoFrontofficeBundle:Org:Orgen.html.twig', array(
                    'membreorgs' => $membreorgs));
}

}
