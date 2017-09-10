<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use AppBundle\Entity\Movie;
use AppBundle\Entity\Person;

class PersonController extends Controller
{
    /**
     * @Route("/persons", name="persons")
     */
    public function indexAction(Request $request)
    {

        $em = $this->get('neo4j.entity_manager');

        // Retrieve from database
        $persons = $em->getRepository(Person::class)->findAll();

        $actors = [];

        foreach ($persons as $key => $person) {
            $actor = [];
            $actor['name'] = $person->getName();

            $movies = $person->getMovies();
            $moviesTitle = [];
            foreach ($movies as $key => $movie) {
                $moviesTitle[] = $movie->getTitle();
            }
            $actor['movies'] = $moviesTitle;

            $actors[] = $actor;
        }

        // replace this example code with whatever you need
        return $this->render('persons.html.twig', array(
            'actors' => $actors,
        ));
    }
}
