<?php

namespace AppBundle\Entity;

use GraphAware\Neo4j\OGM\Annotations as OGM;
use Symfony\Component\Security\Core\User\UserInterface as UserInterface;

/**
 * @OGM\Node(label="User")
 */
class User implements UserInterface
{
    /** @OGM\GraphId() */
    private $id;

    /** @OGM\Property(type="string") */
    private $email;

    /** @OGM\Property(type="string") */
    private $username;

    /** @OGM\Property(type="string") */
    private $roles;

    /** @OGM\Property(type="string") */
    private $password;

    /** @OGM\Property(type="string") */
    private $salt;

    public function __construct() {
        // De base, on va attribuer au nouveau utilisateur, le rôle « ROLE_USER »
        $this->roles = array("ROLE_USER");
        // Chaque utilisateur va se voir attribuer une clé permettant
        // de saler son mot de passe. Cela n'est pas obligatoire,
        // on pourrait mettre $salt à null
        $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param mixed $roles
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @param mixed $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }



    public function eraseCredentials() {
    // Ici nous n'avons rien à effacer.
    // Cela aurait été le cas si nous avions un mot de passe en clair.
    }
}