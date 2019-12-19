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


    /**
    * @Route("/entreprises", name="Prostages_entreprises")
    */
    public function afficherEntreprise()
    {
          return $this->render('prostage/affichageEntreprise.html.twig');
    }
    /**
    * @Route("/formations", name="Prostages_formations")
    */
    public function afficherFormation()
    {
          return $this->render('prostage/affichageFormations.html.twig');
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

//lster les stages d'une entreprise
    /**
    * @Route("/formations/{id}", name="Prostages_stages")
    */
    public function ListerStage($id)
    {
          return $this->render('prostage/affichageStage.html.twig',['id' => $id]);
    }
}
