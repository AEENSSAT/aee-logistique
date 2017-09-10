<?php

namespace AppBundle\Entity;

use GraphAware\Neo4j\OGM\Annotations as OGM;
use Doctrine\Common\Collections\Collection as Collection;

/**
* @OGM\Node(label="Movie")
*/
class Movie {

    /** @OGM\GraphId() */
    protected $id;

    /** @OGM\Property(type="string") */
    protected $tagline;

    /** @OGM\Property(type="string") */
    protected $title;

    /** @OGM\Property(type="int") */
    protected $released;

    /**
    * @var Person[]|Collection
    *
    * @OGM\Relationship(type="ACTED_IN", direction="INCOMING", collection=true, mappedBy="movies", targetEntity="Person")
    */
    protected $actors;

    // other code

    /**
    * @return Person[]|Collection
    */
    public function getActors()
    {
        return $this->actors;
    }

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
    * Get the value of Tagline
    *
    * @return mixed
    */
    public function getTagline()
    {
        return $this->tagline;
    }

    /**
    * Set the value of Tagline
    *
    * @param mixed tagline
    *
    * @return self
    */
    public function setTagline($tagline)
    {
        $this->tagline = $tagline;

        return $this;
    }

    /**
    * Get the value of Title
    *
    * @return mixed
    */
    public function getTitle()
    {
        return $this->title;
    }

    /**
    * Set the value of Title
    *
    * @param mixed title
    *
    * @return self
    */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
    * Get the value of Released
    *
    * @return mixed
    */
    public function getReleased()
    {
        return $this->released;
    }

    /**
    * Set the value of Released
    *
    * @param mixed released
    *
    * @return self
    */
    public function setReleased($released)
    {
        $this->released = $released;

        return $this;
    }

}
