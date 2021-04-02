<?php

namespace App\DataFixtures;

use App\Entity\Lieu;
use App\Entity\Trajet;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CovoiturageTestFixture extends Fixture
{

    //DATA
    private $lieu = [
        ['Paris','57:32,45:78'],
        ['Grenoble','67:32,15:78'],
        ['Lyon','67:32,85:98'],
        ['Toulouse','67:32,85:98'],
        ['Bordeaux','67:32,85:98'],
        ['Brest','67:32,85:98'],
        ['Marseille','67:32,85:98'],
    ];

    private $adherent =
        [
            ['']
        ];

    //date - heure
    private $trajet =
        [
            ['2021-01-01 08:00:00','2021-01-01 08:00:00'],
            ['2021-01-02 08:00:00','2021-01-02 12:00:00'],
            ['2021-01-03 08:00:00','2021-01-03 12:00:00'],
        ];


    //Fonction CREATION et Remplissage BD
    public function loadLieu(ObjectManager $manager){
        for($i = 0; $i < count($this->lieu); $i++){
            $l = new Lieu();
            $l->setName($this->lieu[$i][0]);
            $l->setCoordonnees($this->lieu[$i][1]);
            $manager->persist($l);
            // $manager->flush();
        }
    }

    public function loadTrajet(ObjectManager $manager){
        for($i = 0; $i < count($this->trajet); $i++){
            $t = new Trajet();
            $lieu = $manager->getRepository(Lieu::class);
            $t->setLieuDepart($this->finByCityName($this->lieu[0][0],$manager));
           // $t->setLieuArrivee($lieu->find($this->lieu[$i][0]));
           // $t->setLieuDepart($lieu->find($this->lieu[$i][0]));
           // $t->setHeureDepart($this->trajet[$i][1]);
            $t->setHeureDepart(new \DateTime('now'));
           // $t->setDateDepart($this->trajet[$i][0]);
            $t->setDateDepart(new \DateTime('now'));
            //$t->setLieuDepart($this->lieu[0][0]);
            //$t->setLieuArrivee($this->lieu[0][1]);
            $manager->persist($t);
            // $manager->flush();
        }
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $this->loadLieu($manager);
        $manager->flush();
        $this->loadTrajet($manager);
        $manager->flush();
    }


    //Search function
    public function finByCityName($string,ObjectManager $manager){

        $db = new SQLite3();
        $statement = $db->prepare('SELECT * FROM lieu WHERE name  = :string;');
        $statement->bindValue(':name', $string);
        $result = $statement->execute();
        dd($result);
        return $result;
    }


}
