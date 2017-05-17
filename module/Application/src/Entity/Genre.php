<?php
////////////////////
//
// Copyright 2014-2016. Quantum Corporation. All Rights Reserved.
// StorNext is either a trademark or registered trademark of
// Quantum Corporation in the US and/or other countries.
//
////////////////////

namespace Application\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Genre
 * @package Application\Entity
 * @ORM\Entity
 * @ORM\Table(name="genre")
 */
class Genre
{
    /**
     * @var string
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Column(name="id", type="guid")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="name")
     */
    protected $name;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Show", inversedBy="genres")
     * @ORM\JoinTable(name="shows_genres")
     */
    protected $shows;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Movie", inversedBy="genres")
     * @ORM\JoinTable(name="movies_genres")
     */
    protected $movies;

    public function __construct()
    {
        $this->shows = new ArrayCollection();
        $this->movies = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return ArrayCollection
     */
    public function getShows()
    {
        return $this->shows;
    }

    /**
     * @param ArrayCollection $shows
     */
    public function setShows($shows)
    {
        $this->shows = $shows;
    }

    /**
     * @return ArrayCollection
     */
    public function getMovies()
    {
        return $this->movies;
    }

    /**
     * @param ArrayCollection $movies
     */
    public function setMovies($movies)
    {
        $this->movies = $movies;
    }
}