<?php

namespace App\Controller;
use App\Entity\Student;
use App\Repository\StudentRepository;
use App\Entity\Classroom;
use App\Form\ClassroomType;
use App\Repository\ClassroomRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Request;


class StudentController extends AbstractController
{
    #[Route('/student', name: 'app_student')]
    public function index(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }
    #[Route('/affichestu',name : 'afff')]
    function Affiche(StudentRepository $repo){
        $student=$repo->findall();
        return $this ->render('student/Affiche.html.twig',['ss'=>$student]);
    }
    #[Route('/ajout',name:'ajout')]
    function Add(ClassroomRepository $repo,Request $req){
        $student=new Student();
        $form=$this->createForm(StudentType::class,$student)
        ->add('add',SubmitType::class);
        $form->handleRequest($req);
        if($form->isSubmitted()&&$form->isValid()){
            $repo->save($student,true);
            return $this->redirectToRoute('afff');
        }
        return $this->render('student/Affiche.html.twig',['form'=>$form->createView()]);



    }
}
