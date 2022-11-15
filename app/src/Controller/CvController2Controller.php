<?php

namespace App\Controller;

use App\Entity\Cv;
use App\Form\Cv1Type;
use App\Repository\CvRepository;
use App\Service\CvGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cv/controller2')]
class CvController2Controller extends AbstractController
{
    #[Route('/', name: 'app_cv_controller2_index', methods: ['GET'])]
    public function index(CvRepository $cvRepository): Response
    {
        return $this->render('cv_controller2/index.html.twig', [
            'cvs' => $cvRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_cv_controller2_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CvRepository $cvRepository): Response
    {
        $cv = new Cv();
        $form = $this->createForm(Cv1Type::class, $cv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cvRepository->add($cv, true);

            return $this->redirectToRoute('app_cv_controller2_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cv_controller2/new.html.twig', [
            'cv' => $cv,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cv_controller2_show', methods: ['GET'])]
    public function show(Cv $cv, CvGenerator $cvGenerator): Response
    {
        $cvGenerator->generate($cv);
//        return $this->render('cv_controller2/show.html.twig', [
//            'cv' => $cv,
//        ]);
    }

    #[Route('/{id}/edit', name: 'app_cv_controller2_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cv $cv, CvRepository $cvRepository): Response
    {
        $form = $this->createForm(Cv1Type::class, $cv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cvRepository->add($cv, true);

            return $this->redirectToRoute('app_cv_controller2_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cv_controller2/edit.html.twig', [
            'cv' => $cv,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cv_controller2_delete', methods: ['POST'])]
    public function delete(Request $request, Cv $cv, CvRepository $cvRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cv->getId(), $request->request->get('_token'))) {
            $cvRepository->remove($cv, true);
        }

        return $this->redirectToRoute('app_cv_controller2_index', [], Response::HTTP_SEE_OTHER);
    }
}
