<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{

    public function index() {
        return $this->render('base.html.twig', []);
    }

    public function inscription() {
        return $this->render('inscription.html.twig', []);
    }
}