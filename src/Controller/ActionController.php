<?php


namespace App\Controller;


use App\Entity\Utilisateur;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Constraints\DateTime;

class ActionController extends AbstractController
{
    public function loginSubmit() {
        dd('vide pour le moment');
    }

    public function inscriptionSubmit(Request $request, UserPasswordEncoderInterface $passwordEncoder) {

        $user = new Utilisateur();

        $nom = $request->get('unom');
        $prenom = $request->get('uprenom');
        $email = $request->get('uemail');
        $date_naissance  = \DateTime::createFromFormat("Y-m-d",$request->get('date-naissance'));
        $password = $request->get('psw-repeat');


        $encodedPassword = $passwordEncoder->encodePassword($user, $password);

        $user->setPrenom($prenom);
        $user->setNom($nom);
        $user->setEmail($email);
        $user->setDateNaissance($date_naissance);
        $user->setPassword($encodedPassword);
        $user->setIsAdherent(null);


        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();


    }

}