<?php

namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NotificationController extends Controller {

    public function afficheAction() {
        $em = $this->getDoctrine()->getManager();
        $notifications = $em->getRepository('tutoBackofficeBundle:Notification')->findAll();
        return $this->render('tutoBackofficeBundle:Notifications:affiche.html.twig', array('notifications' => $notifications));
    }

    public function affiche1Action() {
        $em = $this->getDoctrine()->getManager();
        $notifications = $em->getRepository('tutoBackofficeBundle:Notification')->findAll();
        return $this->render('tutoBackofficeBundle:Notifications:affiche1.html.twig', array('notifications' => $notifications));
    }

    public function supprimerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $Notification = $em->find('tutoBackofficeBundle:Notification', $id);
        if (!$Notification) {
            throw $this->createNotFoundException('Notification avec l\'id ' . $id . ' n\'existe pas');
        }
        $em->remove($Notification);
        $em->flush();
        $this->addFlash("success", "la notification a été supprimée avec succès");
        if ($Notification->getEvaluationfinal() == null) {
            return $this->redirectToRoute('tuto_notification');
        } else {
            return $this->redirectToRoute('tuto_notification1');
        }

        //return new Response("Question supprimée avec succées");
    }

}
