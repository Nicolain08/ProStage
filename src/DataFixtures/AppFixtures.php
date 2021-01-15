<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Entreprise;
use App\Entity\Formation;
use App\Entity\Stage;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
		$faker = \Faker\Factory::create('fr_FR');
		
		//Création d'Entreprises
        $Ubisoft = new Entreprise();
		$Ubisoft->setNom("Ubisoft");
		$Ubisoft->setActivite("Jeux vidéo");
		$Ubisoft->setAdresse($faker->address);
        $manager->persist($Ubisoft);
		
		$SopraSteria = new Entreprise();
		$SopraSteria->setNom("SopraSteria");
		$SopraSteria->setActivite("Aéronautique");
		$SopraSteria->setAdresse($faker->address);
        $manager->persist($SopraSteria);

		$Parrot = new Entreprise();
		$Parrot->setNom("Parrot");
		$Parrot->setActivite("Drones");
		$Parrot->setAdresse($faker->address);
        $manager->persist($Parrot);
		
		//Création de Formations
		$DUTINFO = new Formation();
		$DUTINFO->setNom("DUT Informatique");
		$DUTINFO->setDescription($faker->text($maxNbChars = 250));
		$manager->persist($DUTINFO);
		
		$LPM = new Formation();
		$LPM->setNom("Licence Professionnelle Multimédia");
		$LPM->setDescription($faker->text($maxNbChars = 250));
		$manager->persist($LPM);
		
		$DUTIC = new Formation();
		$DUTIC->setNom("DU TIC");
		$DUTIC->setDescription($faker->text($maxNbChars = 250));
		$manager->persist($DUTIC);
		
		//Création de Stages
			//Stage #1
			$stage1 = new Stage();
			$stage1->setIntitule("Développement application web");
			$stage1->setMission($faker->text($maxNbChars = 250));
			$stage1->setEmail($faker->safeEmail);
			
			$stage1->addFormation($LPM);
			$LPM->addStage($stage1);
			$manager->persist($LPM);
			$stage1->addFormation($DUTINFO);
			$DUTINFO->addStage($stage1);
			$manager->persist($DUTINFO);
			$stage1->addFormation($DUTIC);
			$DUTIC->addStage($stage1);
			$manager->persist($DUTIC);
			
			$stage1->setEntreprise($SopraSteria);
			$SopraSteria->addStage($stage1);
			$manager->persist($SopraSteria);
			
			$manager->persist($stage1);
			
			//Stage #2
			$stage2 = new Stage();
			$stage2->setIntitule("Développement jeu mobile");
			$stage2->setMission($faker->text($maxNbChars = 250));
			$stage2->setEmail($faker->safeEmail);
			
			$stage2->addFormation($DUTINFO);
			$DUTINFO->addStage($stage2);
			$manager->persist($DUTINFO);
			$stage2->addFormation($LPM);
			$LPM->addStage($stage2);
			$manager->persist($LPM);
			
			$stage2->setEntreprise($Ubisoft);
			$Ubisoft->addStage($stage2);
			$manager->persist($Ubisoft);
			
			$manager->persist($stage2);
			
			//Stage #3
			$stage3 = new Stage();
			$stage3->setIntitule("Développement application mobile en mode déconnecté");
			$stage3->setMission($faker->text($maxNbChars = 250));
			$stage3->setEmail($faker->safeEmail);
			
			$stage3->addFormation($DUTIC);
			$DUTIC->addStage($stage3);
			$manager->persist($DUTIC);
			
			$stage3->setEntreprise(SopraSteria);
			$SopraSteria->addStage($stage3);
			$manager->persist($SopraSteria);
			
			$manager->persist($stage3);
			
			//Stage #4
			$stage4 = new Stage();
			$stage4->setIntitule("Restructuration Base de Données");
			$stage4->setMission($faker->text($maxNbChars = 250));
			$stage4->setEmail($faker->safeEmail);
			
			$stage4->addFormation($DUTIC);
			$DUTIC->addStage($stage4);
			$manager->persist($DUTIC);
			$stage4->addFormation($DUTINFO);
			$DUTINFO->addStage($stage4);
			$manager->persist($DUTINFO);
			
			$stage4->setEntreprise($Parrot);
			$Parrot->addStage($stage4);
			$manager->persist($Parrot);
			
			$manager->persist($stage4);
			
			//Stage #5
			$stage5 = new Stage();
			$stage5->setIntitule("Configuration de réseaux");
			$stage5->setMission($faker->text($maxNbChars = 250));
			$stage5->setEmail($faker->safeEmail);
			
			$stage5->addFormation($DUTINFO);
			$DUTINFO->addStage($stage5);
			$manager->persist($DUTINFO);
			
			$stage5->setEntreprise($SopraSteria);
			$SopraSteria->addStage($stage5);
			$manager->persist($SopraSteria);
			
			$manager->persist($stage5);
			
			//Stage #6
			$stage6 = new Stage();
			$stage6->setIntitule("Création API");
			$stage6->setMission($faker->text($maxNbChars = 250));
			$stage6->setEmail($faker->safeEmail);
			
			$stage6->addFormation($DUTIC);
			$DUTIC->addStage($stage6);
			$manager->persist($DUTIC);
			
			$stage6->setEntreprise($Parrot);
			$Parrot->addStage($stage6);
			$manager->persist($Parrot);
			
			$manager->persist($stage6);
			
        $manager->flush();
    }
}
