<?php

namespace App\Controller;

use App\Entity\Cv;
use App\Form\CvType;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\PhpDoc;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cv')]
class CvController extends AbstractController
{
    #[Route('/', name: 'cv_list')]
    public function index(EntityManagerInterface $em): Response
    {
        $cvList = $em->getRepository(Cv::class)->findAll();
        return $this->render('cv/index.html.twig', [
            'controller_name' => 'CvController',
            'cvList' => $cvList
        ]);
    }

    #[Route('/new', name: 'cv_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em, PhpDoc $phpDoc): Response
    {
        $cv = new Cv();
        $form = $this->createForm(CvType::class, $cv);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            if($form->get('save')->isClicked()){
                $em->persist($cv);
                $em->flush();
                return $this->redirectToRoute('cv_list');
            }else{
                return $phpDoc->generatePhpWord($form);
            }
        }
        return $this->render('cv/new.html.twig', [
            'controller_name' => 'CvCon_newtroller',
            'form' => $form->createView()
        ]);
    }

    #[Route('/edit/{id}', name: 'cv_edit', methods: ['GET', 'POST'])]
    public function edit(Cv $cv, Request $request, EntityManagerInterface $em, PhpDoc $phpDoc): Response
    {
        $form = $this->createForm(CvType::class, $cv);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            if($form->get('save')->isClicked()){
                $em->persist($cv);
                $em->flush();
                return $this->redirectToRoute('cv_list');
            }else{
                return $phpDoc->generatePhpWord($form);
            }
        }
        return $this->render('cv/new.html.twig', [
            'controller_name' => 'CvCon_newtroller',
            'form' => $form->createView()
        ]);
    }
}
