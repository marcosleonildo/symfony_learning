<?php

namespace App\Controller;

use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    /**
     * @param ManagerRegistry $registry
     * @return Response
     * @Route("/authors", name="authors")
     */
    public function getAllAuthors(ManagerRegistry $registry): Response
    {
        $em = $registry->getManager();
        $qb = new Quary($em);

        $qb->select('authors.id', 'authors.name', 'books.id as book_id', 'books.title')
            ->from('App\Entity\Author', 'authors')
            ->join('authors.books', 'books')
            ->where('authors.id != 1')
            ->orderBy('authors.id', 'ASC');

        $result = $qb->getQuery()->getResult();

        dump($result);
        die();
    }
}