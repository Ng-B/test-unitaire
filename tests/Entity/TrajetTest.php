<?php


namespace App\Tests\Entity;


use App\Entity\Lieu;
use App\Entity\Trajet;
use PHPUnit\Framework\TestCase;

class TrajetTest extends TestCase
{
    public function testNewTrajet(): void
    {
        $trajet = new Trajet();
        $this->assertInstanceOf(Trajet::class, $trajet);
    }


    public function adhProvider() {
        return [
            // Test Fail ["" , "","","",""],
            [new \DateTime('now'),new \DateTime('now'), new Lieu("Paris" , '10:12;28:54'),new Lieu("Grenoble" , '10:12;28:54')]
        ];
    }

    /**
     * @dataProvider adhProvider
     * @param $dateDepart
     * @param $heureDepart
     * @param $lieuDepart
     * @param $lieuArrivee
     */
    public function testNewAdherentWithConstruct($dateDepart, $heureDepart, $lieuDepart, $lieuArrivee): void
    {
        $trajet = new Trajet();

        $trajet->setDateDepart($dateDepart);
        $trajet->setHeureDepart($heureDepart);
        $trajet->setLieuDepart($lieuDepart);
        $trajet->setLieuArrivee($lieuArrivee);
        $this->assertInstanceOf(Trajet::class, $trajet);
    }

}