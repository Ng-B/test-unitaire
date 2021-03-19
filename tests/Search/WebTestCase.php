<?php


namespace App\Tests\Search;


class WebTestCase extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase
{


    /*
     * On test que la page n'existe pas
    */
    //    public function testAnonymePageInexistant(){
    //        $client = static::createClient();
    //        $client->request('GET','/');
    //        $this->assertEquals(500,$client->getResponse()->getStatusCode());
    //    }

    /*
    * On test que la page existe
    */
    public function testAnonymePageExiste(){
        $client = static::createClient();
        $client->request('GET','/');
        $this->assertEquals(200,$client->getResponse()->getStatusCode());
    }

    /*
     * On test que ka page anonyme existe et qu'il y a un lien vers inscription
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

    public function testResponsetoInscriptionPage(){
        $client = static::createClient();
        $client->request('GET','/inscription');
        $this->assertResponseIsSuccessful();
    }

}