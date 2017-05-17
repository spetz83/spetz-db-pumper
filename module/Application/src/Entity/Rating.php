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
 * Class Rating
 * @package Application\Entity
 * @ORM\Entity
 * @ORM\Table(name="rating")
 */
class Rating
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
     * @ORM\Column(name="name", nullable=false)
     */
    protected $name;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Show", mappedBy="rating")
     */
    protected $shows;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Movie", mappedBy="rating")
     */
    protected $movies;

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
}