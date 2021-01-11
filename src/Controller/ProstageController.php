<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProstageController extends AbstractController
{
    /**
     * @Route("/", name="stages")
     */
    public function afficherStages(): Response
    {
        return $this->render('prostage/liste.html.twig', [
			'page_title' => 'Prostage_Liste des stages',
        ]);
    }
	
	/**
     * @Route("/entreprise/{nomEntreprise}", name="stagesEntreprise")
     */
    public function afficherStagesEntreprise($nomEntreprise): Response
    {
        return $this->render('prostage/stagesEntreprise.html.twig', [
			'page_title' => "Prostage_Liste des stages proposés par $nomEntreprise",
			'entreprise' => "$nomEntreprise",
        ]);
    }
	
	/**
     * @Route("/formation/{nomFormation}", name="stagesFormation")
     */
    public function afficherStagesFormation($nomFormation): Response
    {
        return $this->render('prostage/stagesFormation.html.twig', [
			'page_title' => "Prostage_Liste des stages pour la formation $nomFormation",
			'formation' => "$nomFormation"
        ]);
    }
	
	/**
     * @Route("/detail/{id}", name="detailStage")
     */
    public function afficherDetailStage($id): Response
    {
        return $this->render('prostage/detail.html.twig', [
			'page_title' => 'Prostage_Detail : Titre du stage',
			'titre_stage' => 'Développement application web',
			'activite' => 'Recherche aéronautique',
			'description' => 'Une description',
			'formations' => 'DUT Informatique',
			'adresse' => '31 rue de l\'Entreprise, 64100 Bayonne',
			'mail' => 'adresseEmail@gmail.com',
        ]);
    }
}
