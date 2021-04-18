<?php


namespace App\Search;


use App\Entity\Trajet;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TrajetSearch extends AbstractController
{
    public function identifiantNormalise(Trajet $trajet) {
        setlocale(LC_ALL, "en_US.utf8");
        $nomWithoutAccents = iconv('UTF-8', 'ASCII//TRANSLIT', $trajet->getName());
        $prenomWithoutAccents= iconv('UTF-8', 'ASCII//TRANSLIT', $trajet->getCoordonnees());
        $nomWithoutNonAlphanumerical = preg_replace('/[^a-z\s]/i','', $trajet->getName());
        $coordonneeWithoutNonAlphanumerical = preg_replace('/[^a-zA-Z0-9 ]/','', $trajet->getCoordonnees());
        $nom = $nomWithoutNonAlphanumerical;
        $coordonnee = $coordonneeWithoutNonAlphanumerical;
        $ident = strtoupper($nom) . '_' . strtoupper($coordonnee);
        return $ident;
    }
}
