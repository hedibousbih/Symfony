<?php

namespace App\Controller;
<<<<<<< Updated upstream
use App\Entity\Student;
use App\Repository\StudentRepository;
use App\Entity\Classroom;
use App\Form\ClassroomType;
use App\Repository\ClassroomRepository;
=======
>>>>>>> Stashed changes

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
<<<<<<< Updated upstream
use App\Controller\Request;

=======
use App\Repository\StudentRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Student;
use App\Form\StudentType;
>>>>>>> Stashed changes

class StudentController extends AbstractController
{
    #[Route('/student', name: 'app_student')]
    public function index(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }
<<<<<<< Updated upstream
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
=======
    
    #[Route('/affiche2',name : 'aff2')]
    function Affiche(StudentRepository $repo){
        $student=$repo->findALL();
        return $this ->render('student/Affiche.html.twig',['cc'=>$student]);
    }
    #[Route('/Ajouter',name:'ajouter')]
    function Ajouter(StudentRepository $repo,Request $req){
        $student=new Student();
        #form form builder interface 
        $form=$this->createForm(StudentType::class,$student)->add('Ajout',SubmitType::class);
     //   $form->add('Ajout',SubmitType::class);    ken baad $student) ;
     $form->handleRequest($req);
     
        #isEmpty  isSubmitted        isValid
        if($form->isSubmitted()&& $form->isValid()){
            #insertion
            #2methode : 
            #1/  repo ->save()
            $repo->save($student,true);
            #2/  EM ->persist() flush()


            return $this ->redirectToRoute('aff2');
        }
        return $this->render('student/Ajout.html.twig',['form'=>$form->createView()]);
    }
    #[Route('/delete1/{nsc}',name:'delete')]
    function Delete( ManagerRegistry $doctrine,Student $student ){
        //$repo->remove($student,true); peut remplacer les deux ligne louta
        $em=$doctrine->getManager();
        $em->remove($student);
        $em->flush();
        return $this ->redirectToRoute('aff2');

    }


    
    #[Route('/Update/{nsc}',name:'modifier')]
    function Update ( ManagerRegistry $doctrine,Request $req,Student $student){
     //   $student=new Student();
    
             #form form builder interface 
        $form=$this->createForm(StudentType ::class,$student)->add('Update',SubmitType::class);
     //   $form->add('Ajout',SubmitType::class);    ken baad $student) ;
     $form->handleRequest($req);
     
        #isEmpty  isSubmitted        isValid
        if($form->isSubmitted()&& $form->isValid()){
            #insertion
            #2methode : 
            #1/  repo ->save()
            $em=$doctrine->getManager();
            $em->flush();
            #2/  EM ->persist() flush()


            return $this ->redirectToRoute('aff2');
        }
        return $this->render('student/Ajout.html.twig',['form'=>$form->createView()]);
    }
   #[route('/Search',name:'search')]
   function search(StudentRepository $repo,Request $req){
   $email=$req->get('e');
   $student=$repo->searchEmail($email);
   return $this->render('student/Affiche.html.twig',
                 ['cc'=>$student]);

   }
}



>>>>>>> Stashed changes
