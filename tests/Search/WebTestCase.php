<?php


namespace App\Tests\Search;


class WebTestCase extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase
{


    /*
     * On test que la page n'existe pas
    */
    public function testAnonymePage(){
        $client = static::createClient();
        $client->request('GET','/');
        $this->assertEquals(500,$client->getResponse()->getStatusCode());
    }

    /*
     * On test que ka page anonyme existe et qu'il y a un lien vers inscription
     * */
}