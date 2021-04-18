<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Security;

class DefaultController extends AbstractController
{

    public function index(Security $security) {

        $communes = json_decode(file_get_contents('/home/ngB/Documents/LP-AW/Test_Unitaire/test-unitaire/public/json/france.json'));

        if ($security->getUser()) {
            return $this->render('accueil.html.twig', ['user' => $security->getUser()]);
        }
        return $this->render('accueil.html.twig', []);
    }

    public function login() {
        return $this->render('login.html.twig', []);
    }

    public function inscription() {
        return $this->render('inscription.html.twig', []);
    }
}
