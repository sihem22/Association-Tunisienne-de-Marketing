<?php

namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ColloqueController extends Controller
{
    public function colloqueAction()
    {
        return $this->render('tutoFrontofficeBundle:Colloque:colloque.html.twig');
    }

     public function colloquengAction()
    {
        return $this->render('tutoFrontofficeBundle:Colloque:colloqueng.html.twig');
    }
}
