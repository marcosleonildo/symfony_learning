<?php

namespace App\Entity;

class Book
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity="Author", inversedBy="books")
     */
    private Author $author;

    /**
     * @ORM\ManyToMany(targetEntity="Genre", mappedBy="books"
     * @ORM\JoinTable(
     *     name="books_genre",
     *     joinColumns={
     *         @JoinColumns(name="book_id", referencedColumnName="id"),
     *         @InversedJoinColumn(name="genre_id", referencedColumnName="id")
     *     }
     * )
     */
    private $genres;

    /**
     * @ORM\Column
     * @Assert\NotBlank
     */
    private $title;

    /*
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    private $description;

    public function __construct()
    {
        $this->genres = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $genres
     */
    public function setGenres($genres): void
    {
        $this->genres = $genres;
    }

    /**
     * @return mixed
     */
    public function getGenres()
    {
        return $this->genres;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }
}