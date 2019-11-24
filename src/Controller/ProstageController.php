<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProstageController extends AbstractController
{

    public function index()
    {
        return $this->render('prostage/index.html.twig');
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
    * @Route("/stages/{id}", name="Prostages_stages")
    */
    public function afficherStage($id)
    {
          return $this->render('prostage/affichageStage.html.twig',['id' => $id]);
    }
}
