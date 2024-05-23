<?php

namespace App\Controller;

use App\Entity\DossierMedical;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Repository\DossierMedicalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DossiermedicalController extends AbstractController
{
    #[Route('/dossiermedical/create', name: 'app_dossiermedical_create')]
    public function create(Request $request, EntityManagerInterface $manager): Response
    {
        $dossiermedical = new DossierMedical();
        $form = $this->createFormBuilder($dossiermedical)
            ->add('idDM')
            ->add('Traitementcourant')
            ->add('Allergie')
            ->add('SuiviPsychologique')
            ->add('CertificatMedical')
           
            ->add('save', SubmitType::class, ['label' => 'Enregistrer'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($dossiermedical);
            $manager->flush();

            return $this->redirectToRoute('app_formType_success');
        }

        return $this->render('dossiermedical/dmindex.html.twig', [
            'formDossiermedical' => $form->createView()
        ]);
    }

    #[Route('/formType/success',name:'app_formType_success')] 
    public function success(): Response 
    {
         return $this->render('dossiermedical/dmindex.html.twig');
    }

    
#[Route('/dossiermedical/edit', name:'app_dossiermedical_edit')]

public function edit(Request $request, EntityManagerInterface $entityManager) : Response
{
    $dossiersMedical = $entityManager->getRepository(DossierMedical::class)->findAll();

    return $this->render('dossiermedical/dm.edit.html.twig', [
        'dossiersMedical' => $dossiersMedical,
    ]);
}
      
}
        
 