<?php

namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CallpaperController extends Controller
{
    public function callpaperAction()
    {
        return $this->render('tutoFrontofficeBundle:Callpaper:callpaper.html.twig');
    }
     public function callpaperenAction()
    {
        return $this->render('tutoFrontofficeBundle:Callpaper:callpaperen.html.twig');
    }
    }