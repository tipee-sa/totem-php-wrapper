<?php
namespace Client\Entity\Response;

/**
 * Class PersonCreateResponse
 * @package Client\Entity
 */
class PersonCreate
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $success;

    /**
     * @var string
     */
    private $location;

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
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param string $id
     * @return PersonCreate
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}