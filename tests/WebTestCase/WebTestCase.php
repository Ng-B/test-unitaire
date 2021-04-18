<?php


namespace App\Tests\Search;


use http\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class WebTestCase extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase
{

    private $client = null;
    private $clientAdherent = null;

    // INITIALISTION
    // 2 connexions
    // connexion1 : anonyme
    // connexion2 : adherent
    public function setUp() :void
    {
        $this->client = static::createClient();

        // connexion 2 : adherent
        $this->clientAdherent = static::makeClient();
        $this->clientAdherent->request(
            'POST',
            '/tokens', [
            'username' => 'skubrick1',
            'password' => 'skubrick1'
        ], [
            // no files here
        ],
            $headers = [
                'HTTP_CONTENT_TYPE' => 'application/x-www-form-urlencoded',
                'HTTP_ACCEPT' => 'application/json',
            ]
        );

        $response = $this->clientAdherent->getResponse();

        $data = json_decode($response->getContent(), true);

        $this->client = static::createClient(
            array(),
            array(
                'HTTP_Authorization' => sprintf('%s %s', 'Bearer', $data['token']),
                'HTTP_CONTENT_TYPE' => 'application/json',
                'HTTP_ACCEPT'       => 'application/json',
            )
        );
    }

    /*
    * On test que la page existe
    */
    public function testAnonymePageExiste(){
        $client = static::createClient();
        $client->request('GET','/');
        $this->assertEquals(200,$client->getResponse()->getStatusCode());
    }

    /*
     * On test que la page anonyme existe et qu'il y a un lien vers inscription
     * */
    public function testLinkToInscription(){
        $client = static::createClient();
        $crawler = $client->request('GET','/');
        $linkCrawler = $crawler->filterXPath('//a[@href="/inscription"]');
        $link = $linkCrawler->link();
        $uri = $link->getUri();
        $this->assertIsString($uri,'url est bien un string');
        $this->assertEquals('http://localhost/inscription', $uri,'On a bien un url pour la page inscription');
    }

    // Verifie que /trajet => 200 OK
    public function testLinkToTrajets(){
            $client = static::createClient();
            $client->request('GET','/trajets');
            $this->assertEquals(200,$client->getResponse()->getStatusCode());
    }

    // Verifie que /inscription et /login => 200 OK
    public function testResponsetoPages(){
        $client = static::createClient();
        $client->request('GET','/inscription');
        $client->request('GET','/login');
        $this->assertResponseIsSuccessful();
    }

    // Connexion admin
    public function testAdminConnexion()
    {
        $this->logIn();
        $crawler = $this->client->request('GET', '/login');

        $this->assertSame(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());

    }

    // On verfie qu'un adherent a l'option de rechercher des trajets
    public function testAdherentRechercheTrajet() {
        $response =$this->clientAdherent->request('GET', '/trajet');
        $this->assertEquals(200,$response->getResponse()->getStatusCode());

        $linkCrawler = $response->filterXPath('//input[@id="myInput"]');
        $this->assertEquals(true,$linkCrawler);
    }

    // On verfie qu'un adherent a le formulaire pour creer un nouveau trajet
    public function testFormulaireAdherenteTrajet() {
        $response =$this->clientAdherent->request('GET', '/trajet');
        $this->assertEquals(200,$response->getResponse()->getStatusCode());

        $linkCrawler = $response->filterXPath('//form[@id="new_trajet"]');
        $this->assertEquals(true,$linkCrawler);
    }

    // Login admin
    private function logIn()
    {
        $session = $this->client->getContainer()->get('session');

        $firewallName = 'secure_area';

        $firewallContext = 'secured_area';

        $token = new UsernamePasswordToken('admin', null, $firewallName, array('ROLE_ADMIN'));
        $session->set('_security_'.$firewallContext, serialize($token));
        $session->save();

    }

}
