<?php

namespace App\Controller;

use App\Entity\DossierStage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Repository\DossierstageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DossierstageController extends AbstractController
{
    #[Route('/dossierstage/create', name: 'app_dossierstage_create')]
    public function create(Request $request, EntityManagerInterface $manager): Response
    {
        $dossierstage = new Dossierstage();
        $form = $this->createFormBuilder($dossierstage)
            ->add('idDST')
            ->add('Priseencharge')
            ->add('ModuleOpt')
                       
            ->add('save', SubmitType::class, ['label' => 'Enregistrer'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($dossierstage);
            $manager->flush();

            return $this->redirectToRoute('app_formType_success');
        }

        return $this->render('dossierstage/dstindex.html.twig', [
            'formDossierstage' => $form->createView()
        ]);
    }

    #[Route('/formType/success',name:'app_formType_success')] 
    public function success(): Response 
    {
        
        return $this->render('dossierstage/dstindex.html.twig', [
            'controller_name' => 'DossierstageController',
        ]);
    }
    #[Route('/dossierstage/edit', name:'app_dossierstage_edit')]
    public function edit(Request $request, EntityManagerInterface $entityManager) : Response
    {
        $dossiersStage = $entityManager->getRepository(dossierstage::class)->findAll();

        return $this->render('dossierstage/dst.edit.html.twig', [
            'dossiersStage' => $dossiersStage,
        ]);
    }
}
