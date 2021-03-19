<?php


namespace App\Tests\Entity;


use App\Entity\Lieu;
use PHPUnit\Framework\TestCase;

class LieuTest extends TestCase
{

    public function adhProvider() {
        return [
            ["Grenoble" , 10],
            /*["Paris" , '10:12;28:54']*/
        ];
    }

    public function testNewAdherent(): void
    {
        $lieu = new Lieu();
        $this->assertInstanceOf(Lieu::class, $lieu);
    }

    /**
     * @dataProvider adhProvider
     * @param $name
     * @param $coordonnees
     */
    public function testNewAdherentWithConstruct($name, $coordonnees): void
    {
        $lieu = new Lieu();
        $lieu->setName($name);
        $lieu->setCoordonnees($coordonnees);
        // dd($lieu->getCoordonnees());
        $this->assertInstanceOf(Lieu::class, $lieu);
    }
}