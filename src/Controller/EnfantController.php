<?php

namespace App\Controller;

use App\Entity\Enfant;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use  App\Repository\EnfantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EnfantController extends AbstractController 
{
     #[Route('/enfant/create', name: 'app_enfant_create')]
      public function create(Request $request, EntityManagerInterface $manager): Response 
      {
         $enfant = new Enfant();
          $form = $this->createFormBuilder($enfant)
            ->add('idE')
            ->add('Nom')
            ->add('Prenom')
            ->add('Age') 
            ->add('Adresse') 
            ->add('save', SubmitType::class, ['label' => 'Enregistrer'])
            ->getForm();
               
               $form->handleRequest($request);
                if ($form->isSubmitted() && $form->isValid()) {
                     $manager->persist($enfant);
                      $manager->flush();
                      
                      return $this->redirectToRoute('app_formType_success');
                     } 
                     return $this->render('enfant/enfant.index.html.twig',
                      [
                         'formEnfant' => $form->createView()
                         ]);
                         } 
                         
                #[Route('/formType/success', name:'app_formType_success')]
                 public function success(): Response 
            { 
                return $this->redirectToRoute('app_enfant_create'); 
            } 

 
    #[Route('/enfant/edit', name: 'app_enfant_edit')]
public function edit(Request $request, EnfantRepository $enfantRepository)
{
    $enfants = $enfantRepository->findAll();
    
    $form = $this->createFormBuilder()
        ->add('idE', EntityType::class, [
            'class' => Enfant::class,
            'choice_label' => 'idE',
            'choices' => $enfants,
            'placeholder' => 'Choisir un enfant',
        ])
        ->add('save', SubmitType::class, ['label' => 'Modifier'])
        ->getForm();
    
    $form->handleRequest($request);
    
    if ($form->isSubmitted() && $form->isValid()) {
        $enfant = $form['idE']->getData();
    
        return $this->redirectToRoute('enfant_show', ['id' => $enfant->getId()]);
    }
    
    return $this->render('enfant/enfant.edit.html.twig', [
        'enfants' => $enfants,
        'formEnfantEdit' => $form->createView(),
    ]);
}

#[Route('/enfant/edit/{id}', name: 'enfant_edit')]
public function update(Request $request, EnfantRepository $enfantRepository, EntityManagerInterface $manager, $id): Response
{
    $enfant = $enfantRepository->find($id);
    $form = $this->createFormBuilder($enfant)
        ->add('idE')
        ->add('Nom')
        ->add('Prenom')
        ->add('Age')
        ->add('Adresse')
        ->add('save', SubmitType::class, ['label' => 'Enregistrer'])
        ->getForm();
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
        $manager->flush();
        return $this->redirectToRoute('app_formType_success');
    }


    return $this->render('enfant/enfant.edit.html.twig', [
        'formEnfantEdit' => $form->createView()
    ]);
}

}