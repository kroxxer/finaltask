<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        dump($entityManager->createQuery("SELECT * FROM user WHERE TO_TSVECTOR(email) @@ TO_TSQUERY('a@a.a') LIMIT 10;")->getSQL());
        $emails = $entityManager->createQuery("SELECT * FROM user WHERE TO_TSVECTOR(email) @@ TO_TSQUERY('a@a.a') LIMIT 10;")->getResult();
        return $this->render("default/index.html.twig", [
            'emails' => $emails
            ]
        );
    }
}
