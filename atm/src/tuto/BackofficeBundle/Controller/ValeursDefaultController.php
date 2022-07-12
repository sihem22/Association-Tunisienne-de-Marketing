<?php 
namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\ValeursDefault;
use tuto\BackofficeBundle\Form\ValeursDefaultType;
use Symfony\Component\HttpFoundation\Response;

class ValeursDefaultController extends Controller
{
   public function ajoutAction()
    {
        $message="Ajouter une valeur";
        $em=$this->getDoctrine()->getManager();
        $ValeursDefault = new ValeursDefault();
        $form=$this-> createForm(new ValeursDefaultType(),$ValeursDefault);
        $request=$this->getRequest();
        if ( $request->getMethod()=='POST')
            $form->handleRequest($request);
            
        { if ($form->isValid())
             
        { $em->persist($ValeursDefault);
        $em->flush();
       
        $ValeursDefault=$form->getData();
        $this->addFlash("success", "le ValeursDefault a été ajouté avec succès");
        return $this->redirectToRoute('tuto_ValeursDefault');
       // $message="une Categorie est ajoutée";
        }
        }
        return $this->render('tutoBackofficeBundle:ValeursDefault:edit.html.twig', array(
                'form'=>$form->createView() , 
                  'msg'=>$message ,
        )
        ) ;
    }
    public function afficheAction()
 
     { $em=$this->getDoctrine()->getManager();
       $ValeursDefaults =$em->getRepository('tutoBackofficeBundle:ValeursDefault')->findAll();
         return $this->render('tutoBackofficeBundle:ValeursDefault:ValeursDefaults.html.twig', array('ValeursDefaults'=>$ValeursDefaults));
     }
     public function modifierAction($id)
    {
        $message="Modifier une valeur";
        $em=$this->getDoctrine()->getManager();
         $ValeursDefault =$em->getRepository('tutoBackofficeBundle:ValeursDefault')->find($id);
        
        
        $form=$this-> createForm(new ValeursDefaultType(),$ValeursDefault);
        $request=$this->getRequest();
        if ( $request->getMethod()=='POST')
            $form->handleRequest($request);
            
        { if ($form->isValid())
        { 
        $em->flush();
        
         $this->addFlash("success", "Le ValeursDefault a été modifié avec succès");
         return $this->redirectToRoute('tuto_ValeursDefault');
        //$message="une categorie est modifiée";
        }
        }
        return $this->render('tutoBackofficeBundle:ValeursDefault:modifier.html.twig', array(
                'form'=>$form->createView() , 
                  'msg'=>$message ,
        )
        ) ;
}
          public function supprimerAction($id)
          {$em=$this->getDoctrine()->getManager();
           $ValeursDefault =$em->find('tutoBackofficeBundle:ValeursDefault',$id);
           if (!$ValeursDefault)
           {
               throw $this->createNotFoundException('ValeursDefault avec l\'id ' .$id.' n\'existe pas');
           }
           
           $em->remove($ValeursDefault);
           $em->flush();
            $this->addFlash("success", "Le ValeursDefault a été supprimé avec succès");
           return $this->redirectToRoute('tuto_ValeursDefault');
          
           
           //return new Response("ValeursDefault supprimée avec succées");
          }
}