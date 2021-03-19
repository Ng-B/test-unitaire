<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{

    public function index() {
        return $this->render('accueil.html.twig', []);
    }

    public function login() {
        return $this->render('login.html.twig', []);
    }

    public function inscription() {
        return $this->render('inscription.html.twig', []);
    }
}