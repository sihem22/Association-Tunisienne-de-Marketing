<?php

namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HotelController extends Controller
{
    public function hotelAction()
    {
        return $this->render('tutoFrontofficeBundle:Hotel:hotel.html.twig');
    }
     public function hotelenAction()
    {
        return $this->render('tutoFrontofficeBundle:Hotel:hotelen.html.twig');
    }
    }