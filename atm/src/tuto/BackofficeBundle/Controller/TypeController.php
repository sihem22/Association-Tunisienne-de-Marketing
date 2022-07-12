<?php namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Type;
use tuto\BackofficeBundle\Form\TypeType;
use Symfony\Component\HttpFoundation\Response;

class TypeController extends Controller
{
    public function ajoutAction()
    {
        
        $em=$this->getDoctrine()->getManager();
        
        $Type = new Type();
        $form=$this-> createForm(new TypeType(),$Type);
        $request=$this->getRequest();
        if ( $request->getMethod()=='POST')
            $form->handleRequest($request);
            
        { if ($form->isValid())
        { $em->persist($Type);
        $em->flush();
         $this->addFlash("success", "le type a été ajouté avec succès");
        return $this->redirectToRoute('tuto_type');
       // $message="un Etat est ajouté";
        }
        }
        return $this->render('tutoBackofficeBundle:Type:ajout.html.twig', array(
                'form'=>$form->createView() , 
                 
        )
        ) ;
    }
    public function afficheAction()
 
     { $em=$this->getDoctrine()->getManager();
       $types =$em->getRepository('tutoBackofficeBundle:Type')->findAll();
         return $this->render('tutoBackofficeBundle:Type:affiche.html.twig', array('types'=>$types));
     }
    public function modifierAction($id)
    {
        
        $em=$this->getDoctrine()->getManager();
         $Type =$em->getRepository('tutoBackofficeBundle:Type')->find($id);
        
        
        $form=$this-> createForm(new TypeType(),$Type);
        $request=$this->getRequest();
        if ( $request->getMethod()=='POST')
            $form->handleRequest($request);
            
        { if ($form->isValid())
        { 
        $em->flush();
        $this->addFlash("success", "le type a été modifié avec succès");
        return $this->redirectToRoute('tuto_type');
        //$message="un Etat est modifié";
        }
        }
        return $this->render('tutoBackofficeBundle:Type:modif.html.twig', array(
                'form'=>$form->createView() , 
                  
        )
        ) ;
}
 public function supprimerAction($id)
          {$em=$this->getDoctrine()->getManager();
           $Type =$em->find('tutoBackofficeBundle:Type',$id);
           if (!$Type)
           {
               throw $this->createNotFoundException('Type avec l\'id ' .$id.' n\'existe pas');
           }
           $em->remove($Type);
           $em->flush();
           $this->addFlash("success", "Le type a été supprimé avec succès");
           return $this->redirectToRoute('tuto_type');
           //return new Response("Etat supprimé avec succées");
          }




     }




