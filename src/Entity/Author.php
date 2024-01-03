<?php

namespace App\Entity;

class Author
{
    /**
     * @ORM\OneToMany(targetEntity="Book", mappedBy="author")
     */
    private $books;

    private $name;

    public function __construct()
    {
        $this->books = new ArrayCollection();
    }

    /**
     * @param ArrayCollection $books
     */
    public function setBooks(ArrayCollection $books): void
    {
        $this->books = $books;
    }

    /**
     * @return ArrayCollection|Book[]
     */
    public function getBooks(): ArrayCollection
    {
        return $this->books;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}