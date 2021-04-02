<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Security;

class DefaultController extends AbstractController
{

    public function index(Security $security) {
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