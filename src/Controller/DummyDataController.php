<?php

namespace App\Controller;

use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Genre;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DummyDataController extends AbstractController
{
    /**
     * @param ManagerRegistry $registry
     * @return Response
     * @Route("/add-dummy-data", name="add_dummy_data")
     */
    public function index(ManagerRegistry $registry): Response
    {
        $entityManager = $registry->getManager();

        $author = new Author();
        $author->setName('John Doe');

        $genre = new Genre();
        $genre->setName('Fantasy');

        $book = new Book();
        $book->setTitle('The Lord of the Rings');
        $book->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
        $book->setAuthor($author);
        $book->addGenre($genre);

        $author2 = new Author();
        $author2->setName('Douglas Adams');

        $genre2 = new Genre();
        $genre2->setName('Science Fiction');

        $book2 = new Book();
        $book2->setTitle('The Hitchhiker\'s Guide to the Galaxy');
        $book2->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
        $book2->setAuthor($author2);
        $book2->addGenre($genre2);

        $author3 = new Author();
        $author3->setName('J. K. Rowling');

        $genre3 = new Genre();
        $genre3->setName('Fantasy');

        $book3 = new Book();
        $book3->setTitle('Harry Potter and the Philosopher\'s Stone');
        $book3->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
        $book3->setAuthor($author3);
        $book3->addGenre($genre3);

        $entityManager->persist($author);
        $entityManager->persist($genre);
        $entityManager->persist($book);

        $entityManager->persist($author2);
        $entityManager->persist($genre2);
        $entityManager->persist($book2);

        $entityManager->persist($author3);
        $entityManager->persist($genre3);
        $entityManager->persist($book3);

        // dump(array(
        //     array(
        //         'author' => $author,
        //         'genre' => $genre,
        //         'book' => $book
        //     ),
        //     array(
        //         'author' => $author2,
        //         'genre' => $genre2,
        //         'book' => $book2
        //     ),
        //     array(
        //         'author' => $author3,
        //         'genre' => $genre3,
        //         'book' => $book3
        //     )
        // ));
        // die();

        $entityManager->flush();

        return new Response('Dummy data added!');
    }

}