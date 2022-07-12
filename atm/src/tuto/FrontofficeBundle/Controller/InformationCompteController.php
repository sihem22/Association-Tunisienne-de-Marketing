<?php

namespace tuto\FrontofficeBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use tuto\BackofficeBundle\Entity\User;
use tuto\BackofficeBundle\Form\User1Type;
use Symfony\Component\HttpFoundation\Response;

class InformationCompteController extends Controller {

    public function modifierAction() {
        $message = "Modifier un utilisateur";
        $em = $this->getDoctrine()->getManager();


        $User = $em->getRepository('tutoBackofficeBundle:User')->findOneById($this->getUser());
     
  
     

        $form = $this->createForm(new User1Type(), $User);

        $form->setData($User);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
            $form->handleRequest($request); {
            if ($form->isValid()) {
                $em->persist($User);
                $em->flush();
                $this->addFlash("success", "Vos coordonnées sont modifiées avec succès");
                return $this->redirectToRoute('fos_user_profile_show');
                // $message="un utilisateur est modifié";
            }
        }
        return $this->render('tutoFrontofficeBundle:InformationCompte:modifier.html.twig', array(
                    'form' => $form->createView(),
                    'msg' => $message,
                        )
        );
    }
public function modifierenAction() {
        $message = "Modifier un utilisateur";
        $em = $this->getDoctrine()->getManager();


        $User = $em->getRepository('tutoBackofficeBundle:User')->findOneById($this->getUser());
     
  
     

        $form = $this->createForm(new User1Type(), $User);

        $form->setData($User);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
            $form->handleRequest($request); {
            if ($form->isValid()) {
                $em->persist($User);
                $em->flush();
                $this->addFlash("success", "Vos coordonnées sont modifiées avec succès");
                return $this->redirectToRoute('fos_user_profile_showen');
                // $message="un utilisateur est modifié";
            }
        }
        return $this->render('tutoFrontofficeBundle:InformationCompte:modifieren.html.twig', array(
                    'form' => $form->createView(),
                    'msg' => $message,
                        )
        );
    }
}
