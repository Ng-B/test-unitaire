<?php

namespace App\DataFixtures;

use App\Entity\Lieu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CovoiturageTestFixture extends Fixture
{

    //remplissage DB
    private $lieu = [
        ['Paris','57:32,45:78'],
        ['Grenoble','67:32,15:78'],
        ['Lyon','67:32,85:98'],
    ];

    public function loadLieu(ObjectManager $manager){
        for($i = 0; $i < count($this->lieu); $i++){
            $l = new Lieu();
            $l->setName($this->lieu[$i][0]);
            $l->setCoordonnees($this->lieu[$i][1]);
            $manager->persist($l);
            // $manager->flush();
        }
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $this->loadLieu($manager);
        $manager->flush();
    }


}
