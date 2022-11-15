<?php

namespace App\Controller;

use App\Entity\Cv;
use App\Form\Cv1Type;
use App\Form\CvType;
use App\Repository\CvRepository;
use App\Service\CvService;
use App\Service\FileUploader;
use App\Service\SkillService;
use App\Service\SubthemeService;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\PhpDoc;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cv')]
class CvController extends AbstractController
{
    #[Route('/', name: 'app_cv')]
    public function index(EntityManagerInterface $em): Response
    {
        $cv = $em->getRepository(Cv::class)->findAll();
        return $this->render('cv/index.html.twig', [
            'controller_name' => 'CvController',
            'cv' => $cv
        ]);
    }

    #[Route('/new', name: 'app_cv_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em, PhpDoc $phpDoc, FileUploader $fileUploader): Response
    {
        $cv = new Cv();
        $form = $this->createForm(CvType::class, $cv);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('save')->isClicked()) {
                $em->persist($cv);
                $em->flush();

                if ($form['logo']->getData()) {
                    $fileName = $fileUploader->upload($form['logo']->getData());
                }

                return $this->redirectToRoute('app_cv');
            } else {
                return $phpDoc->generatePhpWord($form);
            }
        }
        return $this->render('cv/new.html.twig', [
            'controller_name' => 'CvCon_newtroller',
            'form' => $form->createView()
        ]);
    }

    #[Route('/{id}/edit', name: 'app_cv_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cv $cv, CvRepository $cvRepository): Response
    {
        $form = $this->createForm(CvType::class, $cv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cvRepository->add($cv, true);

            return $this->redirectToRoute('app_cv_controller2_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cv/new.html.twig', [
            'cv' => $cv,
            'form' => $form
        ]);
    }

    #[Route('/ajax-theme-choice', name: 'ajax_theme_choice', methods: ['GET'])]
    public function ajaxSkillChoice(Request $request, SkillService $skillService)
    {
        $term = $request->query->get('term');
        $field = $request->query->get('field');

        $skills = $skillService->getSkills($term, $field);

        return $this->json(['results'=>$skills]);
    }

    #[Route('/ajax-cv-choice', name: 'ajax_skill_choice', methods: ['GET'])]
    public function ajaxCvChoice(Request $request, CvService $cvService)
    {
        $field = $request->query->get('field');
        $skills = $cvService->getData($field);

        return $this->json($skills);
    }

    #[Route('/ajax-subtheme-choice', name: 'ajax_subtheme_choice', methods: ['GET'])]
    public function ajaxSubthemeChoice(Request $request, SubthemeService $skillService)
    {
        $term = $request->query->get('term');
        $field = $request->query->get('field');

        $datas = $skillService->getDatas($term, $field);

        return $this->json(['results'=>$datas]);
    }
}
