<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
<<<<<<< Updated upstream
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ClassroomRepository;
use App\Entity\Classroom;
use App\Form\ClassroomType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

=======

use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ClassroomRepository;
use App\Entity\Classroom;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\ClassroomType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
>>>>>>> Stashed changes

class ClassroomController extends AbstractController
{
    #[Route('/classroom', name: 'app_classroom')]
    public function index(): Response
    {
        return $this->render('classroom/index.html.twig', [
            'controller_name' => 'ClassroomController',
        ]);
    }
    #[Route('/affiche',name : 'aff')]
    function Affiche(ClassroomRepository $repo){
<<<<<<< Updated upstream
        $classroom=$repo->findall();
=======
        $classroom=$repo->findALL();
>>>>>>> Stashed changes
        return $this ->render('classroom/Affiche.html.twig',['cc'=>$classroom]);
    }
    //#[Route('/Detail/{id}',name:'app_detail')]
    //function Details($id,   ClassroomRepository $repo ){
     //   $classroom=$repo->find($id);
       // return $this ->render('classroom/Detail.html.twig',['cc'=>$classroom]);
    //}
    #[Route('/Detail/{id}',name:'app_detail')]
    function Details(   Classroom $classroom ){
        return $this ->render('classroom/Detail.html.twig',['cc'=>$classroom]);
<<<<<<< Updated upstream

    }
    #[Route('/Delete/{id}',name:'del')]
    function Delete( $id, ClassroomRepository $repo ){
        $classroom=$repo->find($id);
        $repo->remove($classroom,true);
        return $this ->redirectToRoute('aff');

    }
    #[Route('/Add',name:'add')]
    function Add(ClassroomRepository $repo,Request $req){
        $classroom=new Classroom();
        $form=$this->createForm(ClassroomType::class,$classroom)
        ->add('add',SubmitType::class);
        $form->handleRequest($req);
        if($form->isSubmitted()&&$form->isValid()){
            $repo->save($classroom,true);
            return $this->redirectToRoute('aff');
        }
        return $this->render('classroom/Add.html.twig',['form'=>$form->createView()]);



    }

}
=======

    }
    /*#[Route('/delete/{id}',name:'del')]
    function Delete( ClassroomRepository $repo,Classroom $classroom ){
        $repo->remove($classroom,true); 
        //peut remplacer les deux ligne louta
        
        return $this ->redirectToRoute('aff');

    }*/
    #[Route('/delete/{id}',name:'del')]
    function Delete( ManagerRegistry $doctrine,Classroom $classroom ){
        //$repo->remove($classroom,true); peut remplacer les deux ligne louta
        $em=$doctrine->getManager();
        $em->remove($classroom);
        $em->flush();
        return $this ->redirectToRoute('aff');

    }
    #[Route('/Ajout')]
    function Ajout(ClassroomRepository $repo,Request $req){
        $classroom=new Classroom();
        #form form builder interface 
        $form=$this->createForm(ClassroomType ::class,$classroom)->add('Ajout',SubmitType::class);
     //   $form->add('Ajout',SubmitType::class);    ken baad $classroom) ;
     $form->handleRequest($req);
     
        #isEmpty  isSubmitted        isValid
        if($form->isSubmitted()&& $form->isValid()){
            #insertion
            #2methode : 
            #1/  repo ->save()
            $repo->save($classroom,true);
            #2/  EM ->persist() flush()


            return $this ->redirectToRoute('aff');
        }
        return $this->render('classroom/Ajout.html.twig',['form'=>$form->createView()]);
    }
   /* #[Route('/Modification/{id}',name:'modifier')]
    function Modification (ClassroomRepository $repo,Request $req,$id){
     //   $classroom=new Classroom();
     $classroom=$repo->find($id);
             #form form builder interface 
        $form=$this->createForm(ClassroomType ::class,$classroom)->add('Modification',SubmitType::class);
     //   $form->add('Ajout',SubmitType::class);    ken baad $classroom) ;
     $form->handleRequest($req);
     
        #isEmpty  isSubmitted        isValid
        if($form->isSubmitted()&& $form->isValid()){
            #insertion
            #2methode : 
            #1/  repo ->save()
            $repo->save($classroom,true);
            #2/  EM ->persist() flush()


            return $this ->redirectToRoute('aff');
        }
        return $this->render('classroom/Ajout.html.twig',['form'=>$form->createView()]);
    }*/

    #[Route('/Update/{id}',name:'modifier')]
    function Update ( ManagerRegistry $doctrine,Request $req,Classroom $classroom){
     //   $classroom=new Classroom();
    
             #form form builder interface 
        $form=$this->createForm(ClassroomType ::class,$classroom)->add('Update',SubmitType::class);
     //   $form->add('Ajout',SubmitType::class);    ken baad $classroom) ;
     $form->handleRequest($req);
     
        #isEmpty  isSubmitted        isValid
        if($form->isSubmitted()&& $form->isValid()){
            #insertion
            #2methode : 
            #1/  repo ->save()
            $em=$doctrine->getManager();
            $em->flush();
            #2/  EM ->persist() flush()


            return $this ->redirectToRoute('aff');
        }
        return $this->render('classroom/Ajout.html.twig',['form'=>$form->createView()]);
    }
}

>>>>>>> Stashed changes
