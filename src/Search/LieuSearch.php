<?php


namespace App\Search;


use App\Entity\Lieu;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LieuSearch extends AbstractController
{
    public function identifiantNormalise(Lieu $lieu) {
        setlocale(LC_ALL, "en_US.utf8");
        $nomWithoutAccents = iconv('UTF-8', 'ASCII//TRANSLIT', $lieu->getName());
        $prenomWithoutAccents= iconv('UTF-8', 'ASCII//TRANSLIT', $lieu->getCoordonnees());
        $nomWithoutNonAlphanumerical = preg_replace('/[^a-z\s]/i','', $lieu->getName());
        $coordonneeWithoutNonAlphanumerical = preg_replace('/[^a-zA-Z0-9 ]/','', $lieu->getCoordonnees());
        $nom = $nomWithoutNonAlphanumerical;
        $coordonnee = $coordonneeWithoutNonAlphanumerical;
        $ident = strtoupper($nom) . '_' . strtoupper($coordonnee);
        return $ident;
    }
}