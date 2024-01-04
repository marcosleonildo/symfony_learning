<?php

namespace App\Entity;

use App\Repository\AuthorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AuthorRepository::class)
 */
class Author
{
    /**
     * @ORM\Column
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    private int $id;

    /**
     * @ORM\OneToMany(targetEntity="Book", mappedBy="author")
     */
    private $books;

    /**
     * @var string
     * @ORM\Column
     */
    private string $name;

    public function __construct()
    {
        $this->books = new ArrayCollection();
    }

    /**
     * @param ArrayCollection $books
     */
    public function setBooks(Collection $books): void
    {
        $this->books = $books;
    }

    /**
     * @return Collection
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    /**
     * @param STRING $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param Book $book
     * @return void
     */
    public function addBook(Book $book): void
    {
        if (!$this->books->contains($book)) {
            $this->books->add($book);
            $book->setAuthor($this);
        }
    }

    public function removeBook(Book $book): void
    {
        if ($this->books->contains($book)) {
            $this->books->removeElement($book);
            $book->setAuthor(null);
        }
    }
}