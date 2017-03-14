<?php

namespace Client\Entity;

/**
 * Class Person
 * @package Client\Entity
 */
class Person
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var PersonData
     */
    private $data;

    /**
     * @var array
     */
    private $namespaces = [];

    /**
     * @param string $username
     * @return Person
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @param PersonData $data
     * @return Person
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @param string $namespace
     * @return Person
     */
    public function addNamespace($namespace)
    {
        $this->namespaces[] = $namespace;

        return $this;
    }

    /**
     * @return PersonData
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return array
     */
    public function getNamespaces()
    {
        return $this->namespaces;
    }



}