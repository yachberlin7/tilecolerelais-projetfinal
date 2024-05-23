<?php

namespace App\Controller;

use App\Entity\DossierScolaire;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DossierscolaireController extends AbstractController
{
    #[Route('/dossierscolaire/create', name: 'app_dossierscolaire_create')]
    public function create(Request $request, EntityManagerInterface $manager): Response
    {
        $dossierscolaire = new Dossierscolaire();
        $form = $this->createFormBuilder($dossierscolaire)
            ->add('idDS')
            ->add('ParcoursScolaire')
            ->add('Classe')
                       
            ->add('save', SubmitType::class, ['label' => 'Enregistrer'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($dossierscolaire);
            $manager->flush();

            return $this->redirectToRoute('app_formType_success');
        }

        return $this->render('dossierscolaire/dscindex.html.twig', [
            'formDossierscolaire' => $form->createView()
        ]);
    }

    #[Route('/formType/success',name:'app_formType_success')] 
    public function success(): Response 
    {
         
        return $this->render('dossierscolaire/dscindex.html.twig', [
            'controller_name' => 'DossierscolaireController',
        ]);
    }
}