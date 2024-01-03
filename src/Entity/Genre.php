<?php

namespace App\Entity;

class Genre
{
    /**
     * @ORM\Column
     * @ORM\ManyToMany(targetEntity="Book", inversedBy="genres")
     */
    private $books;

    /**
     * @param mixed $books
     */
    public function setBooks($books): void
    {
        $this->books = $books;
    }

    /**
     * @return mixed
     */
    public function getBooks()
    {
        return $this->books;
    }
}