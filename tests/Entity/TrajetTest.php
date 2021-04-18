<?php


namespace App\Tests\Entity;


use App\Entity\Lieu;
use App\Entity\Trajet;
use DateTime;
use PHPUnit\Framework\TestCase;

class TrajetTest extends TestCase
{

    public function adhProvider() {
        return [
            // Test Fail ["" , "","","",""],
            [new \DateTime('now'),new \DateTime('now'), new Lieu("Paris" , '10:12;28:54'),new Lieu("Grenoble" , '10:12;28:54')]
        ];
    }

    //////////////////////////////////////////////////////////////
    ///             INSTANCIATION ////////////////////////////////
    /**
     * @dataProvider adhProvider
     * @param $dateDepart
     * @param $heureDepart
     * @param $lieuDepart
     * @param $lieuArrivee
     */
    public function testNewTrajettWithConstruct($dateDepart, $heureDepart, $lieuDepart, $lieuArrivee): void
    {
        $trajet = new Trajet();

        $trajet->setDateDepart($dateDepart);
        $trajet->setHeureDepart($heureDepart);
        $trajet->setLieuDepart($lieuDepart);
        $trajet->setLieuArrivee($lieuArrivee);
        $this->assertInstanceOf(Trajet::class, $trajet);
    }


    public function testNewTrajet(): void
    {
        $trajet = new Trajet();
        $this->assertInstanceOf(Trajet::class, $trajet);
    }
    ///////////////////////////////////////////////////////////////////////


    ////////////////////////////////////
    ///         METHODES              //
    public function testMethodeGetDateDepart()
    {
        $trajet = $this->entityManager
            ->getRepository(Trajet::class)
            ->findOneBy(['id' => 1]);

        $this->assertSame(DateTime::createFromFormat('j-M-Y', '31-Jul-2021'),  $trajet->getHeureDepart());
    }

    public function testMethodeGetNbrPlaces()
    {
        $trajet = $this->entityManager
            ->getRepository(Trajet::class)
            ->findOneBy(['id' => 1]);

        $this->assertSame(101,  $trajet->getNbrPlaces());
    }

    public function testMethodeGetLieuDepart()
    {
        $trajet = $this->entityManager
            ->getRepository(Trajet::class)
            ->findOneBy(['id' => 1]);

        $this->assertSame('COUTENCON',  $trajet->getLieuDepart()->getName());
    }

    public function testMethodeGetLieuArrivee()
    {
        $trajet = $this->entityManager
            ->getRepository(Trajet::class)
            ->findOneBy(['id' => 1]);

        $this->assertSame('BOUGLIGNY',  $trajet->getLieuArrivee()->getName());
    }


}
