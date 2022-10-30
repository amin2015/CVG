<?php

namespace App\Controller;

use App\Entity\Cv;
use App\Form\CvType;
use App\Service\SkillService;
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
    public function new(Request $request, EntityManagerInterface $em, PhpDoc $phpDoc): Response
    {
        $cv = new Cv();
        $form = $this->createForm(CvType::class, $cv);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            if($form->get('save')->isClicked()){
                $em->persist($cv);
                $em->flush();
                return $this->redirectToRoute('app_cv');
            }else{
                return $phpDoc->generatePhpWord($form);
            }
        }
        return $this->render('cv/new.html.twig', [
            'controller_name' => 'CvCon_newtroller',
            'form' => $form->createView()
        ]);
    }
    #[Route('/ajax-skill-choice', name: 'ajax_skill_choice', methods: ['GET'])]
    public function ajaxSkillChoice(Request $request, SkillService $skillService)
    {
        $term = $request->query->get('term');
        $skills = $skillService->getSkills($term);

        return $this->json(['results'=>$skills]);
    }
}
