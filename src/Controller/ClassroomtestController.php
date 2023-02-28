<?php

namespace App\Controller;

use App\Entity\Classroom;
use App\Form\ClassroomType;
use App\Repository\ClassroomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/classroomtest')]
class ClassroomtestController extends AbstractController
{
    #[Route('/', name: 'app_classroomtest_index', methods: ['GET'])]
    public function index(ClassroomRepository $classroomRepository): Response
    {
        return $this->render('classroomtest/index.html.twig', [
            'classrooms' => $classroomRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_classroomtest_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ClassroomRepository $classroomRepository): Response
    {
        $classroom = new Classroom();
        $form = $this->createForm(ClassroomType::class, $classroom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $classroomRepository->save($classroom, true);

            return $this->redirectToRoute('app_classroomtest_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('classroomtest/new.html.twig', [
            'classroom' => $classroom,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_classroomtest_show', methods: ['GET'])]
    public function show(Classroom $classroom): Response
    {
        return $this->render('classroomtest/show.html.twig', [
            'classroom' => $classroom,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_classroomtest_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Classroom $classroom, ClassroomRepository $classroomRepository): Response
    {
        $form = $this->createForm(ClassroomType::class, $classroom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $classroomRepository->save($classroom, true);

            return $this->redirectToRoute('app_classroomtest_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('classroomtest/edit.html.twig', [
            'classroom' => $classroom,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_classroomtest_delete', methods: ['POST'])]
    public function delete(Request $request, Classroom $classroom, ClassroomRepository $classroomRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$classroom->getId(), $request->request->get('_token'))) {
            $classroomRepository->remove($classroom, true);
        }

        return $this->redirectToRoute('app_classroomtest_index', [], Response::HTTP_SEE_OTHER);
    }
}
