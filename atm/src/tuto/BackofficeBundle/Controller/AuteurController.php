<?php 
namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Auteur;
use tuto\BackofficeBundle\Form\AuteurType;
use Symfony\Component\HttpFoundation\Response;

class AuteurController extends Controller
{
   public function auteurAction()
 
     { $em=$this->getDoctrine()->getManager();
       $auteurs =$em->getRepository('tutoBackofficeBundle:Auteur')->findAll();
         return $this->render('tutoBackofficeBundle:Auteur:auteur.html.twig', array('auteurs'=>$auteurs));
     }

     }