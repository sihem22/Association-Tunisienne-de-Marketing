<?php namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Etat;
use tuto\BackofficeBundle\Form\EtatType;
use Symfony\Component\HttpFoundation\Response;

class EtatController extends Controller
{
    public function ajoutAction()
    {
        
        $em=$this->getDoctrine()->getManager();
        
        $Etat = new Etat();
        $form=$this-> createForm(new EtatType(),$Etat);
        $request=$this->getRequest();
        if ( $request->getMethod()=='POST')
            $form->handleRequest($request);
            
        { if ($form->isValid())
        { $em->persist($Etat);
        $em->flush();
         $this->addFlash("success", "votre Etat a été ajouté avec succès");
        return $this->redirectToRoute('tuto_etat');
       // $message="un Etat est ajouté";
        }
        }
        return $this->render('tutoBackofficeBundle:Etat:ajout.html.twig', array(
                'form'=>$form->createView() , 
                 
        )
        ) ;
    }
    public function afficheAction()
 
     { $em=$this->getDoctrine()->getManager();
       $etats =$em->getRepository('tutoBackofficeBundle:Etat')->findAll();
         return $this->render('tutoBackofficeBundle:Etat:affiche.html.twig', array('etats'=>$etats));
     }
    public function modifierAction($id)
    {
        
        $em=$this->getDoctrine()->getManager();
         $Etat =$em->getRepository('tutoBackofficeBundle:Etat')->find($id);
        
        
        $form=$this-> createForm(new EtatType(),$Etat);
        $request=$this->getRequest();
        if ( $request->getMethod()=='POST')
            $form->handleRequest($request);
            
        { if ($form->isValid())
        { 
        $em->flush();
        $this->addFlash("success", "votre Etat a été modifié avec succés");
        return $this->redirectToRoute('tuto_etat');
        //$message="un Etat est modifié";
        }
        }
        return $this->render('tutoBackofficeBundle:Etat:modif.html.twig', array(
                'form'=>$form->createView() , 
                  
        )
        ) ;
}
 public function supprimerAction($id)
          {$em=$this->getDoctrine()->getManager();
           $Etat =$em->find('tutoBackofficeBundle:Etat',$id);
           if (!$Etat)
           {
               throw $this->createNotFoundException('Etat avec l\'id ' .$id.' n\'existe pas');
           }
           $em->remove($Etat);
           $em->flush();
           $this->addFlash("success", "votre Etat a été supprimé avec succès");
           return $this->redirectToRoute('tuto_etat');
           //return new Response("Etat supprimé avec succées");
          }




     }



