<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\Stage;
use App\Entity\Formation;
use App\Entity\Entreprise;

class DonneesDeTest extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        // creation de generation de donnee faker
        $faker = \Faker\Factory::create('fr_FR');
//creation de formations
        $dutinfo = new Formation();
        $dutinfo->setNom("dut info");
        $manager->persist($dutinfo);

        $dutgim = new Formation();
        $dutgim->setNom("dut gim");
        $manager->persist($dutgim);

        $lpinfo = new Formation();
        $lpinfo->setNom("licence info");
        $manager->persist($lpinfo);

        $tabformation = array($dutinfo,$dutgim,$lpinfo);
        //activite et domaine possible
        $taActivite = array("aeronautique","commerce","jeux videos");
        $tabDomaine = array("web","reseau","mobile");


        // creation d'Entreprise et leur stage
        for ($i=0; $i <5 ; $i++)
        {


          $entreprise = new Entreprise();
          $entreprise->setNom($faker->company);
          $entreprise->setActivite(rand(0,2));
          $entreprise->setAdresse($faker->address);
          $entreprise->setSiteweb($faker->domainName);
          $manager->persist($entreprise);
          //creation de 2 stage par entreprise
          for ($j=0; $j <3 ; $j++)
          {
            $stage =new Stage();
            $stage->setTitre($faker->realText($maxNbChars = 50, $indexSize = 2));
            $stage->setDomaine(rand(0,2));
            $stage->setDescription($faker->realText($maxNbChars = 200, $indexSize = 2));
            $stage->setEmail($faker->email);
            $stage->setEntreprise($entreprise);
            $entreprise->addStage($stage);
           $stage->addFormation($tabformation[$j]);
          $tabformation[$j]->addStage($stage);
            $manager->persist($stage);

          }
          $manager->persist($entreprise);
        }


        $manager->flush();
    }
}
