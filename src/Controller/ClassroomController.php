<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ClassroomRepository;
use App\Entity\Classroom;
use App\Form\ClassroomType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


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
        $classroom=$repo->findall();
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