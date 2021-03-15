<?php


namespace App\Search;

use App\Entity\Adherent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdherentSearch extends AbstractController {

    public function identifiantNormalise(Adherent $adherent) {
        $nom =  $adherent->getNom();
        $prenom =  $adherent->getPrenom();
        $date = $adherent->getDateNaissance();
        preg_replace("/[^A-Za-z]/", '', [$prenom, $nom]);

        $nom =  iconv('UTF-8','ASCII//TRANSLIT',$nom);
        $prenom =  iconv('UTF-8','ASCII//TRANSLIT',$prenom);

        $ident =  $date->format("dmY") . strtoupper($nom) . '_' . strtoupper($prenom);

        return $ident;
    }

    public function  rechercheNom($nom, $price) {


        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT p
            FROM App\Entity\Product p
            WHERE p.price > :price
            ORDER BY p.price ASC'
        )->setParameter('price', $price);

        // returns an array of Product objects
        return $query->getResult();

    }


}