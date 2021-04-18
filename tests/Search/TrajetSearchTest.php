<?php


namespace App\Tests\Search;


use App\Entity\Trajet;
use App\Search\TrajetSearch;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Constraints\Date;

class TrajetSearchTest extends TestCase
{

    /**
     * @dataProvider adhProvider
     * @param $nom
     * @param $coordonnee
     * @param $identifiant
     */
    public function testTrajetIdentifiantNormalise($nom, $coordonnee, $identifiant) {
        $search = new TrajetSearch();
        $trajet = new Trajet();
        $trajet->setDateDepart(new \DateTime());
        $trajet->setHeureDepart(new \DateTime('now'));
        $this->assertEquals(
            $identifiant,
            $search->identifiantNormalise($trajet)
        );
    }
}
