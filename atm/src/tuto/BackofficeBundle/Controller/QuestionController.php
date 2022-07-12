<?php namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Question;
use tuto\BackofficeBundle\Form\QuestionType;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{
   public function ajoutAction()
    {
        $message="Ajouter une Question";
        $em=$this->getDoctrine()->getManager();
        $Question = new Question();
        $form=$this-> createForm(new QuestionType(),$Question);
        $request=$this->getRequest();
        if ( $request->getMethod()=='POST')
            $form->handleRequest($request);
            
        { if ($form->isValid())
        { $em->persist($Question);
        $em->flush();
         $this->addFlash("success", "Une question a été ajoutée avec succès");
        return $this->redirectToRoute('tuto_question');
       // $message="une Delegation est ajoutée";
        }
        }
        return $this->render('tutoBackofficeBundle:Question:edit.html.twig', array(
                'form'=>$form->createView() , 
                  'msg'=>$message ,
        )
        ) ;
    }
     public function afficheAction()
 
     { $em=$this->getDoctrine()->getManager();
       $questions =$em->getRepository('tutoBackofficeBundle:Question')->findAll();
         return $this->render('tutoBackofficeBundle:Question:questions.html.twig', array('questions'=>$questions));
     }
   public function modifierAction($id)
    {
        $message="Modifier une question";
        $em=$this->getDoctrine()->getManager();
         $Question =$em->getRepository('tutoBackofficeBundle:Question')->find($id);
        
        
        $form=$this-> createForm(new QuestionType(),$Question);
        $request=$this->getRequest();
        if ( $request->getMethod()=='POST')
            $form->handleRequest($request);
            
        { if ($form->isValid())
        { 
        $em->flush();
         $this->addFlash("success", "Une question a été modifiée avec succès");
        return $this->redirectToRoute('tuto_question');
        //$message="une question est modifiée";
        }
        }
        return $this->render('tutoBackofficeBundle:Question:modif.html.twig', array(
                'form'=>$form->createView() , 
                  'msg'=>$message ,
        )
        ) ;
}
 public function supprimerAction($id)
          {$em=$this->getDoctrine()->getManager();
           $Question =$em->find('tutoBackofficeBundle:Question',$id);
           if (!$Question)
           {
               throw $this->createNotFoundException('Question avec l\'id ' .$id.' n\'existe pas');
           }
           $em->remove($Question);
           $em->flush();
            $this->addFlash("success", "Une question a été supprimée avec succès");
           return $this->redirectToRoute('tuto_question');
           //return new Response("Question supprimée avec succées");
          }

}


