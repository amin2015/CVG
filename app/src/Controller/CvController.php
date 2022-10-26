<?php

namespace App\Controller;

use App\Entity\Cv;
use App\Form\CvType;
use App\Repository\CvRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\ManagerRegistry;
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
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $cv = new Cv();
        $form = $this->createForm(CvType::class, $cv);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($cv);
            $em->flush();
            return $this->redirectToRoute('app_cv');
        }
        return $this->render('cv/new.html.twig', [
            'controller_name' => 'CvCon_newtroller',
            'form' => $form->createView()
        ]);
    }
}
