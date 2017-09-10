<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use AppBundle\Entity\Movie;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        $em = $this->get('neo4j.entity_manager');

        // Retrieve from database
        $movies = $em->getRepository(Movie::class)->findAll();

        // replace this example code with whatever you need
        return $this->render('movies.html.twig', array(
            'movies' => $movies,
        ));
    }

    /**
     * @Route("/createMovie", name="createMovie")
     */
    public function createMovieAction(Request $request)
    {
        $em = $this->get('neo4j.entity_manager');
        $movie = new Movie();

        $form = $this->createFormBuilder($movie)
            ->add('title', TextType::class)
            ->add('tagline', TextType::class)
            ->add('released', NumberType::class)
            ->add('save', SubmitType::class, array('label' => 'Create a movie'))
            ->getForm();

        $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid()) {
           $movie = $form->getData();

           $em->persist($movie);
           $em->flush();

           return $this->redirectToRoute('homepage');
       }

        return $this->render('createMovie.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/all", name="all")
     */
    public function allAction(Request $request){
        $client = $this->get('neo4j.client');
        $results = $client->run('MATCH (n) RETURN n LIMIT 25');

        foreach ($results->records() as $record) {
           $node = $record->get('n');
           dump($node->labels());
        }



        return $this->render('all.html.twig');
    }
}
