<?php


namespace tuto\BackofficeBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;



/**
 * Description of Controller
 *
 * @author HP
 */
class CalendrierController extends Controller{
    public function calendrierAction()
    {
        return $this->render('tutoBackofficeBundle:Calendrier:calendrier.html.twig');
    }}