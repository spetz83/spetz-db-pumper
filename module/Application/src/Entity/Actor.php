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
 * Class Actor
 * @package Application\Entity
 * @ORM\Entity
 * @ORM\Table(name="actor")
 */
class Actor
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
     * @ORM\Column(name="first_name", type="string", nullable=false)
     */
    protected $firstName;

    /**
     * @var string
     * @ORM\Column(name="last_name", type="string", nullable=false)
     */
    protected $lastName;

    /**
     * @var \DateTime
     * @ORM\Column(name="birth_date", type="datetime", nullable=false)
     */
    protected $birthDate;

    /**
     * @var string
     * @ORM\Column(name="thumb_location", type="string", nullable=true)
     */
    protected $thumbLocation;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Movie", inversedBy="actors")
     * @ORM\JoinTable(name="actors_movies")
     */
    protected $movies;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Show", inversedBy="actors")
     * @ORM\JoinTable(name="actors_shows")
     */
    protected $shows;


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
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param \DateTime $birthDate
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
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
}