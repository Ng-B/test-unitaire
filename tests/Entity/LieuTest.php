<?php


namespace App\Tests\Entity;


use App\Entity\Lieu;
use Doctrine\Persistence\ObjectManager;
use PHPUnit\Framework\TestCase;

class LieuTest extends TestCase
{

    private $entityManager;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function adhProvider() {
        return [
            ["Grenoble" , 10],
            ["Paris" , '10:12;28:54']
        ];
    }

    ////////////////////////////////////
    ///       INSTANCIATION           //
    public function testNewLieu(): void
    {
        $lieu = new Lieu();
        $this->assertInstanceOf(Lieu::class, $lieu);
    }

    /**
     * @dataProvider adhProvider
     * @param $name
     * @param $coordonnees
     */
    public function testNewLieuWithConstruct($name, $coordonnees): void
    {
        $lieu = new Lieu();
        $lieu->setName($name);
        $lieu->setCoordonnees($coordonnees);
        $this->assertInstanceOf(Lieu::class, $lieu);
    }
    //////////////////////////////////////////////////////////////

    ////////////////////////////////////
    ///         METHODES              //
    public function testMethodeGetName()
    {
        $lieu = $this->entityManager
            ->getRepository(Lieu::class)
            ->findOneBy(['id' => 1]);

        $this->assertSame('BARBEY', $lieu->getName());
    }

    public function testMethodeGetCoordonnees()
    {
        $lieu = $this->entityManager
            ->getRepository(Lieu::class)
            ->findOneBy(['id' => 1]);

        $this->assertSame('48.3779377733, 2.96426271153', $lieu->getCoordonnees());
    }
    //////////////////////////////////////////////////////////////
}
