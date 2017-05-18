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
 * Class Movie
 * @package Application\Entity
 * @ORM\Entity
 * @ORM\Table(name="movie")
 */
class Movie
{
    /**
     * @var string
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Column(name="id", type="guid", unique=true)
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", nullable=false)
     */
    protected $name;

    /**
     * @var string
     * @ORM\Column(name="description", type="string", nullable=true)
     */
    protected $description;

    /**
     * @var string
     * @ORM\Column(name="thumb_location", type="string", nullable=true)
     */
    protected $thumbLocation;

    /**
     * @var \DateTime
     * @ORM\Column(name="release_date", type="datetime", nullable=false)
     */
    protected $releaseDate;

    /**
     * @var Rating
     * @ORM\ManyToOne(targetEntity="Rating", inversedBy="movies")
     */
    protected $rating;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Genre", mappedBy="movies")
     */
    protected $genres;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Actor", mappedBy="movies")
     */
    protected $actors;


    public function __construct()
    {
        $this->genres = new ArrayCollection();
        $this->actors = new ArrayCollection();
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
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getThumbLocation()
    {
        return $this->thumbLocation;
    }

    /**
     * @param string $thumbLocation
     */
    public function setThumbLocation($thumbLocation)
    {
        $this->thumbLocation = $thumbLocation;
    }

    /**
     * @return \DateTime
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * @param \DateTime $releaseDate
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;
    }

    /**
     * @return Rating
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param Rating $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    /**
     * @return ArrayCollection
     */
    public function getGenres()
    {
        return $this->genres;
    }

    /**
     * @param ArrayCollection $genres
     */
    public function setGenres($genres)
    {
        $this->genres = $genres;
    }

    /**
     * @return ArrayCollection
     */
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * @param ArrayCollection $actors
     */
    public function setActors($actors)
    {
        $this->actors = $actors;
    }
}