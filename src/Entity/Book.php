<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=BookRepository::class)
 */
class Book
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column
     */
    private int $id;
    /**
     * @ORM\ManyToOne(targetEntity="Author", inversedBy="books")
     */
    private Author $author;

    /**
     * @ORM\ManyToMany(targetEntity="Genre", mappedBy="books")
     * @ORM\JoinTable(
     *     name="books_genre",
     *     joinColumns={
     *         @ORM\JoinColumn(name="book_id", referencedColumnName="id")
     *     },
     *     inverseJoinColumns={
     *         @ORM\JoinColumn(name="genre_id", referencedColumnName="id")
     *     }
     * )
     */
    private $genres;

    /**
     * @ORM\Column
     * @Assert\NotBlank
     */
    private string $title;

    /*
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    private string $description;

    public function __construct()
    {
        $this->genres = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param Author|null $author
     */
    public function setAuthor(Author|null $author): void
    {
        $this->author = $author;
    }

    /**
     * @return Author
     */
    public function getAuthor(): Author
    {
        return $this->author;
    }

    /**
     * @return Collection
     */
    public function getGenres(): Collection
    {
        return $this->genres;
    }

    /**
     * @param mixed $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    public function addGenre(Genre $genre): void
    {
        if (!$this->genres->contains($genre)) {
            $this->genres->add($genre);
        }
    }

    public function removeGenre(Genre $genre): void
    {
        if ($this->genres->contains($genre)) {
            $this->genres->removeElement($genre);
        }
    }


}