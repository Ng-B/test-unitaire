<?php


namespace App\Tests\Search;


use App\Entity\Lieu;
use App\Search\LieuSearch;
use PHPUnit\Framework\TestCase;

class LieuSearchTest extends TestCase
{

    public function adhProvider() {

        return [
            ["GrE*noBl@2e" , "10&:1:12", "GRENOBLE_10112"]
        ];
    }

    /**
     * @dataProvider adhProvider
     * @param $nom
     * @param $coordonnee
     * @param $identifiant
     */
    public function testLieuIdentifiantNormalise($nom, $coordonnee, $identifiant) {
        $search = new LieuSearch();
        $lieu = new Lieu();
        $lieu->setName($nom);
        $lieu->setCoordonnees($coordonnee);
        $this->assertEquals(
            $identifiant,
            $search->identifiantNormalise($lieu)
        );
    }
}