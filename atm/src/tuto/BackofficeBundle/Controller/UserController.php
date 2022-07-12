<?php

namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\User;
use tuto\BackofficeBundle\Form\UserType;
use tuto\BackofficeBundle\Form\User1Type;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller {

    public function ajoutAction() {
        
        $em = $this->getDoctrine()->getManager();

        $User = new User();
        $form = $this->createForm(new UserType(), $User);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
            $form->handleRequest($request); {
            if ($form->isValid()) {
                $User=$form->getData();
                $User->setEtat($em->getRepository("tutoBackofficeBundle:Etat")->findOneById('3'));
                $em->persist($User->addRole('ROLE_ADMIN')->setEnabled(true));
                $em->flush();
                $this->addFlash("success", "Votre utilsateur a été ajouté avec succés");
                return $this->redirectToRoute('tuto_userAdmin');
            }
        }
        return $this->render('tutoBackofficeBundle:User:ajout.html.twig', array(
                    'form' => $form->createView(),
                  
                        )
                );
    }

    public function afficheAction() {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('tutoBackofficeBundle:User')->findAll();
        return $this->render('tutoBackofficeBundle:User:affiche.html.twig', array('users' => $users));
    }
     public function affiche1Action() {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('tutoBackofficeBundle:User')->findAll();
        return $this->render('tutoBackofficeBundle:User:afficheEVAL.html.twig', array('users' => $users));
    }
     public function affiche2Action() {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('tutoBackofficeBundle:User')->findAll();
        return $this->render('tutoBackofficeBundle:User:afficheCHERCH.html.twig', array('users' => $users));
    }

    public function modifierAction($id) {
        $message = "Modifier un utilisateur";
        $em = $this->getDoctrine()->getManager();
        $User = $em->getRepository('tutoBackofficeBundle:User')->find($id);


        $form = $this->createForm(new User1Type(), $User);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
        {  $form->handleRequest($request); 
            if ($form->isValid()) {
                
                $em->persist($User);
                $em->flush();
                   $this->addFlash("success", "Votre utilsateur a été modifié avec succés");
                   if($User->hasRole('ROLE_ADMIN'))
                   {  return $this->redirectToRoute('tuto_userAdmin');}
            else if($User->hasRole('ROLE_EVAL'))
            { return $this->redirectToRoute('tuto_userEval');
            }
            else {
                return $this->redirectToRoute('tuto_userCherch');
            }  // $message="un utilisateur est modifié";
            }
        }
        return $this->render('tutoBackofficeBundle:User:modif.html.twig', array(
                    'form' => $form->createView(),
                    'msg' => $message,
                        )
                );
    }

    public function supprimerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $User = $em->find('tutoBackofficeBundle:User', $id);
        if (!$User) {
            throw $this->createNotFoundException('User avec l\'id ' . $id . ' n\'existe pas');
        }
        $em->remove($User);
        $em->flush();
           $this->addFlash("success", "Votre utilsateur a été supprimé avec succés");
         if($User->hasRole('ROLE_ADMIN'))
                   {  return $this->redirectToRoute('tuto_userAdmin');}
            else if($User->hasRole('ROLE_EVAL'))
            { return $this->redirectToRoute('tuto_userEval');
            }
            else {
                return $this->redirectToRoute('tuto_userCherch');
            }  // $message="un utilisateur est modifié";
            }
        
    public function notifevaladminAction() {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('tutoBackofficeBundle:User')->findByetat('ROLE_EVAL');
        return $this->render('tutoBackofficeBundle:User:notifuseradmin.html.twig', array('users' => $users));
    }
     public function notifevaladmin1Action() {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('tutoBackofficeBundle:User')->findByetat('ROLE_EVAL');
        return $this->render('tutoBackofficeBundle:User:ttenotif.html.twig', array('users' => $users));
    }

    public function countAction() {
        $em = $this->getDoctrine()->getManager();
        $nb = $em->getRepository('tutoBackofficeBundle:User')->count('ROLE_EVAL');

        return new Response($nb);
    }

 public function imageadminAction() {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('tutoBackofficeBundle:User')->findById($this->getUser());
        return $this->render('tutoBackofficeBundle:User:imageadmin.html.twig', array('user' => $user));
    }
    
}