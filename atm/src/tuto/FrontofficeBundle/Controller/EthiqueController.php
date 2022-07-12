<?php

namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EthiqueController extends Controller
{
    public function ethiqueAction()
    {
        return $this->render('tutoFrontofficeBundle:Ethique:ethique.html.twig');
    }
     public function ethiquenAction()
    {
        return $this->render('tutoFrontofficeBundle:Ethique:ethiqueen.html.twig');
    }
    }