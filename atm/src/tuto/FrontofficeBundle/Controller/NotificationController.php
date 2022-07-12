<?php

namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class NotificationController extends Controller {

public function notificationAction() {
$em = $this->getDoctrine()->getManager();
$notifications = $em->getRepository("tutoBackofficeBundle:Notification")->findBy(array('user' => $this->getUser(), 'lu' => false), array('dateNotif' => 'desc'));
return $this->render('tutoFrontofficeBundle:Notification:notification.html.twig', array(
'notifications' => $notifications));
}
public function notificationenAction() {
$em = $this->getDoctrine()->getManager();
$notifications = $em->getRepository("tutoBackofficeBundle:Notification")->findBy(array('user' => $this->getUser(), 'lu' => false), array('dateNotif' => 'desc'));
return $this->render('tutoFrontofficeBundle:Notification:notificationen.html.twig', array(
'notifications' => $notifications));
}

public function afficheAction() {
$em = $this->getDoctrine()->getManager();
$notifications = $em->getRepository("tutoBackofficeBundle:Notification")->findBy(array('user' => $this->getUser()), array('dateNotif' => 'desc'));
return $this->render('tutoFrontofficeBundle:Notification:affiche.html.twig', array(
'notifications' => $notifications));
}
public function affichenAction() {
$em = $this->getDoctrine()->getManager();
$notifications = $em->getRepository("tutoBackofficeBundle:Notification")->findBy(array('user' => $this->getUser()), array('dateNotif' => 'desc'));
return $this->render('tutoFrontofficeBundle:Notification:affichen.html.twig', array(
'notifications' => $notifications));
}

public function affiche1Action() {
$em = $this->getDoctrine()->getManager();
$soumission = $em->getRepository("tutoBackofficeBundle:Soumission")->getSoumissionNonLu($this->getUser()->getId());

//select * from demandes d where is NOT IN (select * from promposition p   where   p.demande_id = d.id and p.user = $this->getUsert() )
return $this->render('tutoFrontofficeBundle:Notification:affiche1.html.twig', array(
'soumission' => $soumission));
}
public function affiche1enAction() {
$em = $this->getDoctrine()->getManager();
$soumission = $em->getRepository("tutoBackofficeBundle:Soumission")->getSoumissionNonLu($this->getUser()->getId());

//select * from demandes d where is NOT IN (select * from promposition p   where   p.demande_id = d.id and p.user = $this->getUsert() )
return $this->render('tutoFrontofficeBundle:Notification:affiche1en.html.twig', array(
'soumission' => $soumission));
}
public function affiche2Action() {
$em = $this->getDoctrine()->getManager();
$evaluationreponse = $em->getRepository("tutoBackofficeBundle:EvaluationReponse")->getEvaluation($this->getUser()->getId());

//select * from demandes d where is NOT IN (select * from promposition p   where   p.demande_id = d.id and p.user = $this->getUsert() )
return $this->render('tutoFrontofficeBundle:Notification:affiche2.html.twig', array(
'evaluationreponse' => $evaluationreponse));
}
//public function afficheboutAction(\tuto\BackofficeBundle\Entity\Notification $notifId) {
//$em = $this->getDoctrine()->getManager();
//$evaluationreponse = $em->getRepository("tutoBackofficeBundle:EvaluationReponse")->getEvaluation1($notifId->getSoumission(),$this->getUser()->getId());
//$notification = $em->find("tutoBackofficeBundle:Notification", $notifId);
//$notification->setLu(true);
//$em->persist($notification);
//$em->flush();
//if ($evaluationreponse != NULL)
//select * from demandes d where is NOT IN (select * from promposition p   where   p.demande_id = d.id and p.user = $this->getUsert() )
//{return $this->render('tutoFrontofficeBundle:Soumission:affiche2.html.twig');}
//if ($evaluationreponse == NULL)
//{return $this->render('tutoFrontofficeBundle:Soumission:affiche3.html.twig', array(
 //'notification' => $notification)) ; 
//}


//}
public function affiche2enAction() {
$em = $this->getDoctrine()->getManager();
$evaluationreponse = $em->getRepository("tutoBackofficeBundle:EvaluationReponse")->getEvaluation($this->getUser()->getId());

//select * from demandes d where is NOT IN (select * from promposition p   where   p.demande_id = d.id and p.user = $this->getUsert() )
return $this->render('tutoFrontofficeBundle:Notification:affiche2en.html.twig', array(
'evaluationreponse' => $evaluationreponse));
}

public function coordonneeAction(\tuto\BackofficeBundle\Entity\Soumission $id, \tuto\BackofficeBundle\Entity\Notification $notifId) {
$em = $this->getDoctrine()->getManager();
$users = $em->getRepository("tutoBackofficeBundle:User")->findBy(array('id' => $id->getUser()->getId()));
$notification = $em->find("tutoBackofficeBundle:Notification", $notifId);
$notification->setLu(true);
$em->persist($notification);
$em->flush();
return $this->render('tutoFrontofficeBundle:Soumission:coordonnee.html.twig', array(
'users' => $users));
}

public function countAction() {
$em = $this->getDoctrine()->getManager();

$nb = array();
{
$nb[] = array(
'count' => $em->getRepository("tutoBackofficeBundle:Notification")->count($this->getUser())
);
}

return $this->render('tutoFrontofficeBundle:Notification:nb.html.twig', array('nb' => $nb));
}

}
