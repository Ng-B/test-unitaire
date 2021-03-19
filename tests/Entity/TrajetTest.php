<?php


namespace App\Tests\Entity;


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
            [new \DateTime('now'),]
            new \DateTime();
echo $time->format('H:i:s \O\n Y-m-d');
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