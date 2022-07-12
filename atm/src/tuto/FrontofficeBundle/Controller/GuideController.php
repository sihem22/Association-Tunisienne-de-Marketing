<?php

namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GuideController extends Controller
{
    public function guideAction()
    {
        return $this->render('tutoFrontofficeBundle:Guide:guide.html.twig');
    }

    public function guidenAction()
    {
        return $this->render('tutoFrontofficeBundle:Guide:guiden.html.twig');
    }
}
