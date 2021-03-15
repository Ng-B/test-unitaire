<?php

namespace App\Tests;

use Doctrine\Persistence\ObjectRepository;
use PHPUnit\Framework\TestCase;

use App\Search\AdherentSearch;
use App\Entity\Adherent;

class AdherentSearchTest extends TestCase
{
    public function adhProvider() {

        return [
            ["Dupont" , "Pierre", "01012000_DUPONT_PIERRE"]
        ];
    }

    /**
     * @dataProvider adhProvider
     * @param $nom
     * @param $prenom
     * @param $identifiant
     */
    public function testAdherentIdentifiantNormalise($nom, $prenom, $identifiant) {
        $search = new AdherentSearch();
        $adherent = new Adherent();
        $adherent->setNom($nom);

        // Cree une doublure de tests pour AdherentRepository
        // qui renvoie une liste vide come resultat de findBy
        $adherentRepo = $this->createMock(ObjectRepository::class);
        $adherentRepo->expects($this->any())
            ->method('findBy')
            ->willReturn();
    }

}
