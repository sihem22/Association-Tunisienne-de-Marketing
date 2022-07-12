<?php

namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NouveauteController extends Controller {
     public function nouveauteAction()
    {
        return $this->render('tutoFrontofficeBundle:Nouveaute:nouveaute.html.twig');
    }

    public function nouveauteenAction()
    {
        return $this->render('tutoFrontofficeBundle:Nouveaute:nouveauteen.html.twig');
    }
    //put your code here
}
