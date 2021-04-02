<?php

namespace App\DataFixtures;

use App\Entity\Lieu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    //remplissage DB


    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $manager->flush();
    }
}
