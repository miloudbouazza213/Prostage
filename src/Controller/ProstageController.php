<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Stage;
use App\Entity\Formation;
use App\Entity\Entreprise;


class ProstageController extends AbstractController
{

    public function index()
    {

      $RepositoryStage=$this->getDoctrine()->getRepository(Stage::class);
      $stages=$RepositoryStage->findAll();

        return $this->render('prostage/accueil.html.twig',['stages'=>$stages]);
    }

// lister les differentes
    /**
    * @Route("/entreprises", name="Prostages_entreprises")
    */
    public function afficherEntreprise()
    {
      $RepositoryEntreprise=$this->getDoctrine()->getRepository(Entreprise::class);
      $entreprises=$RepositoryEntreprise->findAll();
          return $this->render('prostage/affichageEntreprise.html.twig',['entreprises'=>$entreprises]);
    }

    //lster les stages d'une Entreprise
        /**
        * @Route("/entreprise/{id}", name="Prostages_stagesEntreprise")
        */
        public function ListerStageEntreprise($id)
        {
          $Repositorystage=$this->getDoctrine()->getRepository(Stage::class);
          $stages=$Repositorystage->findByEntreprise($id);
              return $this->render('prostage/StagesparEntreprise.html.twig',['stages' => $stages]);
        }

// lister les differentes formations
    /**
    * @Route("/formations", name="Prostages_formations")
    */
    public function afficherFormation()
    {
      $RepositoryFormation=$this->getDoctrine()->getRepository(Formation::class);
      $formations=$RepositoryFormation->findAll();
          return $this->render('prostage/affichageFormations.html.twig',['formations'=>$formations]);
    }
    /**
    * @Route("/stage/{id}", name="Prostages_stage")
    */
    public function afficherStage($id)
    {
      $RepositoryStage=$this->getDoctrine()->getRepository(Stage::class);
      $stage=$RepositoryStage->find($id);

          return $this->render('prostage/affichageStage.html.twig',['stage' => $stage]);
    }

//lster les stages d'une formation
    /**
    * @Route("/formation/{id}", name="Prostages_stagesformation")
    */
    public function ListerStageFormation($id)
    {
      $RepositoryStage=$this->getDoctrine()->getRepository(Stage::class);
      $stages=$RepositoryStage->findByFormations($id);
          return $this->render('prostage/StagesparFormation.html.twig',['stages' => $stages]);
    }
}
