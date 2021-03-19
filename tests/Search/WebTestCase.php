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

<<<<<<< HEAD
    /*
     * On test que ka page anonyme existe et qu'il y a un lien vers inscription
     * */
    public function testLinkToInscription(){
        $client = static::createClient();
        $crawler = $client->request('GET','/');
        $link = $crawler->filter('a:contains("inscription")');
        $theLink = $link[0];
        $this->assertContains('inscription', $crawler->filter('a')->text());
    }
=======

>>>>>>> 9b7d3f0e33094a1c193edbf10fe4cd1bebb7b4d0
}