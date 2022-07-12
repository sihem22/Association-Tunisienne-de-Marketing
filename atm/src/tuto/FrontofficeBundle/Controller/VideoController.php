<?php

namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VideoController extends Controller {

    public function videoAction() {
        return $this->render('tutoFrontofficeBundle:Video:video.html.twig');
    }

    public function video1Action() {
        return $this->render('tutoFrontofficeBundle:Video:video1.html.twig');
    }

    public function video2Action() {
        return $this->render('tutoFrontofficeBundle:Video:video2.html.twig');
    }

    public function video3Action() {
        return $this->render('tutoFrontofficeBundle:Video:video3.html.twig');
    }

    public function videoenAction() {
        return $this->render('tutoFrontofficeBundle:Video:videoen.html.twig');
    }

}
