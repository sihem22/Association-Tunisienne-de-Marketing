<?php namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class lockController extends Controller
{
    public function lockAction()
    {
        return $this->render('tutoBackofficeBundle:lock:lock.html.twig');
    }
}