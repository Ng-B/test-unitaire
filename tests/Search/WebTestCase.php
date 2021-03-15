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


}