<?php


namespace App\Search;


use App\Entity\Lieu;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LieuSearch extends AbstractController
{
    public function identifiantNormalise(Lieu $lieu) {
        $nom =  $lieu->getName();
        $coordonnee = $lieu->getCoordonnees();
        preg_replace("/[^A-Za-z]/", '', [$nom,$coordonnee]);

        $nom =  iconv('UTF-8','ASCII//TRANSLIT',$nom);
        $coordonnee =  iconv('UTF-8','ASCII//TRANSLIT',$coordonnee);

        $ident =  strtoupper($nom) . '_' . strtoupper($coordonnee);

        return $ident;
    }
}