<?php

namespace AppBundle\Entity;

use GraphAware\Neo4j\OGM\Annotations as OGM;


/**
 * @OGM\Node(label="Person")
 */
class Person {

    /** @OGM\GraphId() */
    protected $id;

    /** @OGM\Property(type="string") */
   protected $born;

   /** @OGM\Property(type="string") */
   protected $name;

   /**
    * @var Movie[]|Collection
    *
    * @OGM\Relationship(type="ACTED_IN", direction="OUTGOING", collection=true, mappedBy="actors", targetEntity="Movie")
    */
   protected $movies;

    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param mixed id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Born
     *
     * @return mixed
     */
    public function getBorn()
    {
        return $this->born;
    }

    /**
     * Set the value of Born
     *
     * @param mixed born
     *
     * @return self
     */
    public function setBorn($born)
    {
        $this->born = $born;

        return $this;
    }

    /**
     * Get the value of Name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of Name
     *
     * @param mixed name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of Movies
     *
     * @return Movie[]|Collection
     */
    public function getMovies()
    {
        return $this->movies;
    }

    /**
     * Set the value of Movies
     *
     * @param Movie[]|Collection movies
     *
     * @return self
     */
    public function setMovies($movies)
    {
        $this->movies = $movies;

        return $this;
    }

}
