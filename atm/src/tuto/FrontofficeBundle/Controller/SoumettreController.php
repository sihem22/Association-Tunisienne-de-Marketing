<?php

namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SoumettreController extends Controller
{
    public function soumettreAction()
    {
        return $this->render('tutoFrontofficeBundle:Soumettre:soumettre.html.twig');
    }
    public function soumettreenAction()
    {
        return $this->render('tutoFrontofficeBundle:Soumettre:soumettreen.html.twig');
    }
    }