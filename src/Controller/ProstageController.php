<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProstageController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function afficherAccueil(): Response
    {
        return $this->render('prostage/baseTP1.html.twig', [
            'controller_name' => 'Bienvenue sur la page d accueil de Prostages',
			'page_title' => 'Prostage_Accueil',
        ]);
    }
	
	/**
     * @Route("/entreprises", name="entreprises")
     */
    public function afficherEntreprises(): Response
    {
        return $this->render('prostage/baseTP1.html.twig', [
            'controller_name' => 'Cette page affichera la liste des entreprises proposant un stage',
			'page_title' => 'Prostage_Entreprises',
        ]);
    }
	
	/**
     * @Route("/formations", name="formations")
     */
    public function afficherFormations(): Response
    {
        return $this->render('prostage/baseTP1.html.twig', [
            'controller_name' => 'Cette page affichera la liste des formations de l IUT',
			'page_title' => 'Prostage_Formations',
        ]);
    }
	
	/**
     * @Route("/stages/{id}", name="stages")
     */
    public function afficherStages($id): Response
    {
        return $this->render('prostage/baseTP1.html.twig', [
            'controller_name' => "Cette page affichera le descriptif du stage ayant pour identifiant $id",
			'page_title' => 'Prostage_Stages',
        ]);
    }
}
