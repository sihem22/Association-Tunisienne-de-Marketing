<?php

namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FAQController extends Controller
{
    public function faqAction()
    {
        return $this->render('tutoFrontofficeBundle:FAQ:faq.html.twig');
    }

     public function faqenAction()
    {
        return $this->render('tutoFrontofficeBundle:FAQ:faqen.html.twig');
    }
}
