<?php

namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AtelierDocController extends Controller
{
    public function atelierdocAction()
    {
        return $this->render('tutoFrontofficeBundle:AtelierDoc:atelierdoc.html.twig');
    }
     public function atelierdocenAction()
    {
        return $this->render('tutoFrontofficeBundle:AtelierDoc:atelierdocen.html.twig');
    }
    }