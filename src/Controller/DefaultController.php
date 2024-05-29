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
    dump($entityManager->createQuery("SELECT u FROM App\Entity\User u WHERE TSMATCH(TO_TSVECTOR(u.email), TO_TSQUERY('a@a.a'))=TRUE")->getSQL());
        $emails = $entityManager->createQuery("SELECT u FROM App\Entity\User u WHERE TSMATCH(TO_TSVECTOR(u.email), TO_TSQUERY('a@a.a'))=TRUE")->getResult();
        return $this->render("default/index.html.twig", [
            'emails' => $emails
            ]
        );
    }
}
