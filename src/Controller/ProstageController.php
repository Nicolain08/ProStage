<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Entreprise;
use App\Entity\Formation;
use App\Entity\Stage;

class ProstageController extends AbstractController
{
    /**
     * @Route("/", name="stages")
     */
    public function afficherStages(): Response
    {
		$repositoryStage = $this->getDoctrine()->getRepository(Stage::class);
		$stages = $repositoryStage->findAll();
		$repositoryEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);
		$entreprises = $repositoryEntreprise->findAll();
		$repositoryFormation = $this->getDoctrine()->getRepository(Formation::class);
		$formations = $repositoryFormation->findAll();
		
        return $this->render('prostage/liste.html.twig', [
			'page_title' => 'Prostage_Liste des stages',
			'stages' => $stages,
			'entreprises' => $entreprises,
			'formations' => $formations,
        ]);
    }
	
	/**
     * @Route("/entreprise/{idEntreprise}", name="stagesEntreprise")
     */
    public function afficherStagesEntreprise($idEntreprise): Response
    {
		$repositoryStage = $this->getDoctrine()->getRepository(Stage::class);
		$stages = $repositoryStage->findBy(["entreprise" => $idEntreprise]);
		$repositoryEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);
		$entreprises = $repositoryEntreprise->findAll();
		$repositoryFormation = $this->getDoctrine()->getRepository(Formation::class);
		$formations = $repositoryFormation->findAll();
		$entreprise = $repositoryEntreprise->find($idEntreprise);
		
        return $this->render('prostage/stagesEntreprise.html.twig', [
			'page_title' => "Prostage_Liste des stages",
			'stages' => $stages,
			'entreprises' => $entreprises,
			'formations' => $formations,
			'entreprise' => $entreprise,
        ]);
    }
	
	/**
     * @Route("/formation/{idFormation}", name="stagesFormation")
     */
    public function afficherStagesFormation($idFormation): Response
    {
		$repositoryStage = $this->getDoctrine()->getRepository(Stage::class);
		$stages = $repositoryStage->findBy(["formations" => $idFormation]); //Ne fonctionne pas car formations contient plusieurs id de Formation. Nécessite de parcourir ces id pour trouver un qui correspond à $idFormation
		$repositoryEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);
		$entreprises = $repositoryEntreprise->findAll();
		$repositoryFormation = $this->getDoctrine()->getRepository(Formation::class);
		$formations = $repositoryFormation->findAll();
		$formation = $repositoryFormation->find($idFormation);
		
        return $this->render('prostage/stagesFormation.html.twig', [
			'page_title' => "Prostage_Liste des stages",
			'stages' => $stages,
			'entreprises' => $entreprises,
			'formations' => $formations,
			'formation' => $formation,
        ]);
    }
	
	/**
     * @Route("/detail/{id}", name="detailStage")
     */
    public function afficherDetailStage($id): Response
    {
		$repositoryStage = $this->getDoctrine()->getRepository(Stage::class);
		$stage = $repositoryStage->find($id);
		
        return $this->render('prostage/detail.html.twig', [
			'page_title' => 'Prostage_Detail de stage',
			'stage' => $stage,
        ]);
    }
}
