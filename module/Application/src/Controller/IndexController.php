<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Entity\Actor;
use Application\Entity\Genre;
use Application\Entity\Movie;
use Application\Entity\Rating;
use Application\Entity\TvShow;
use Doctrine\ORM\EntityManager;
use Zend\Form\Element\DateTime;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function indexAction()
    {
        return new ViewModel();
    }

    public function seedAction()
    {
        $genres = [
            'Horror',
            'Comedy',
            'Drama',
        ];

        foreach ($genres as $genre) {
            $genreEntity = new Genre();
            $genreEntity->setName($genre);
            $this->em->persist($genreEntity);
        }

        $ratings = [
            'G',
            'R',
        ];

        foreach ($ratings as $rating) {
            $ratingEntity = new Rating();
            $ratingEntity->setName($rating);
            $this->em->persist($ratingEntity);
        }

        $shows = [
            [
                'name' => 'Breaking Bad',
                'description' => 'Meth Show',
                'releaseDate' => '1200787200',
            ]
        ];

        foreach ($shows as $show) {
            $showEntity = new TvShow();
            $showEntity->setName($show['name']);
            $showEntity->setDescription($show['description']);

            $releaseDate = new \DateTime();
            $releaseDate->setTimestamp($show['releaseDate']);
            $showEntity->setReleaseDate($releaseDate);
            $showEntity->setRating($ratingEntity);

            $this->em->persist($showEntity);
        }

        $actors = [
            [
                'firstName' => 'Bryan',
                'lastName' => 'Cranston',
                'birthDate' => '-436147200',
            ],
        ];

        foreach ($actors as $actor) {
            $actorEntity = new Actor();
            $actorEntity->setFirstName($actor['firstName']);
            $actorEntity->setLastName($actor['lastName']);

            $birthDate = new \DateTime();
            $birthDate->setTimestamp($actor['birthDate']);
            $actorEntity->setBirthDate($birthDate);

            $this->em->persist($actorEntity);
        }

        $this->em->flush();

        return new ViewModel();
    }
}
