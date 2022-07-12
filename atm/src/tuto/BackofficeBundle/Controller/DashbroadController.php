<?php


namespace tuto\BackofficeBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;



/**
 * Description of DashbroadController
 *
 * @author HP
 */
class DashbroadController extends Controller{
    public function dashbroadAction()
    {
        return $this->render('tutoBackofficeBundle:Default:index.html.twig');
    }

    
    public function getNbCHERCHAction()       
       {    $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("tutoBackofficeBundle:User")->findAll();
         $nb=array();
        foreach ($user as $user){
            if ($user->hasRole('ROLE_CHERCH'))
           { $nb[]=array(
                'user'=>$user,
                'count'=>$em->getRepository("tutoBackofficeBundle:User")->getNbprof('ROLE_CHERCH')
                );}
        }
        
       
        return $this->render('tutoBackofficeBundle:Dashbroad:script.html.twig', array('nb' => $nb));
        }

  public function getNbEVALAction()       
       {    $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("tutoBackofficeBundle:User")->findAll();
         $nb=array();
        foreach ($user as $user){
            if ($user->hasRole('ROLE_EVAL'))
           { $nb[]=array(
                'user'=>$user,
                'count'=>$em->getRepository("tutoBackofficeBundle:User")->getNbprof('ROLE_EVAL')
                );}
        }
        
       
        return $this->render('tutoBackofficeBundle:Dashbroad:script.html.twig', array('nb' => $nb));
        }

        
   public function getNbadminAction()       
       {    $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("tutoBackofficeBundle:User")->findAll();
         $nb=array();
        foreach ($user as $user){
            if ($user->hasRole('ROLE_ADMIN'))
           { $nb[]=array(
                'user'=>$user,
                'count'=>$em->getRepository("tutoBackofficeBundle:User")->getNbprof('ROLE_ADMIN')
                );}
        }
        
       
        return $this->render('tutoBackofficeBundle:Dashbroad:script.html.twig', array('nb' => $nb));
        }
        public function scriptAction()
    {   
    	$em = $this->getDoctrine()->getManager();

    	$Type = $em->getRepository("tutoBackofficeBundle:Type")->findAll();
    	$nb=array();
    	foreach ($Type as $type){
    		$nb[]=array(
    			'type'=>$type,
    			'count'=>$em->getRepository("tutoBackofficeBundle:Soumission")->getNb($type)
    			);
    	}
    	
    	return $this->render('tutoBackofficeBundle:Dashbroad:script.html.twig',array('nb'=>$nb));
    }
}
    //put your code here

