<?php

namespace App\Entity;

use App\Repository\GenreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GenreRepository::class)
 */
class Genre
{
    /**
     * @ORM\Column
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    private int $id;

    /**
     * @ORM\Column
     * @ORM\ManyToMany(targetEntity="Book", inversedBy="genres")
     */
    private Collection $books;

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
     * @param Collection $books
     */
    public function setBooks(Collection $books): void
    {
        $this->books = $books;
    }

    /**
     * @return ArrayCollection
     */
    public function getBooks(): ArrayCollection
    {
        return $this->books;
    }

    /**
     * @param string $name
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
}