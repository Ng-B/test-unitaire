<?php

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Adherent;

class AdherentTest extends TestCase
{

    ////////////////////////////////////
    ///       INSTANCIATION           //
    public function testNewAdherent(): void
    {
        $adherent = new Adherent();
        $this->assertInstanceOf(Adherent::class, $adherent);
    }


    public function testNewAdherentWithConstruct($name, $coordonnees): void
    {
        $adherent = new Adherent();
        $adherent->setCotisation('26');
        $this->assertInstanceOf(Adherent::class, $adherent);
    }
    //////////////////////////////////////////////////////////////

    ////////////////////////////////////
    ///         METHODES              //
    public function testMethodeGetRoles()
    {
        $adherent = $this->entityManager
            ->getRepository(Adherent::class)
            ->findOneBy(['id' => 1]);

        $this->assertSame(false, $adherent->getCotisation());
    }
    //////////////////////////////////////////////////////////////

}
