<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;

use App\Repository\NumberRepository;
use App\Entity\Number;

class NumberController extends AbstractController
{
    #[Route('/number', name: 'app_number', methods: ['GET'])]
    public function index(NumberRepository $numberRepo): JsonResponse
    {
        // récupération de la liste des entités Number en base de données (via le repository)
        // tri de la liste des entités Number par ordre croissant (attribut "value")
        $numbers = $numberRepo->findBy([], ['value' => 'ASC']);

        // retour d'une réponse au format JSON
        return $this->json( $numbers );
    }

    // ajout d'un nombre dans la base de données via requete POST
    #[Route('/number', name: 'app_number_add', methods: ['POST'])]
    public function add(NumberRepository $numberRepo, ManagerRegistry $doctrine, Request $request): JsonResponse
    {
        // récupération de la valeur du nombre à ajouter
        $value = $request->get('value');

        // vérification que la valeur est bien un nombre
        if( is_numeric($value) )
        {
            // création d'une nouvelle entité Number
            $number = new Number();
            $number->setValue($value);
    
            // sauvegarde de l'entité Number en base de données
            $entityManager = $doctrine->getManager();
            $entityManager->persist($number);
            $entityManager->flush();
        }

        // retour de la liste des nombres triés par ordre croissant
        return $this->index($numberRepo);
    }


}
