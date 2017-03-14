<?php

namespace Client\Entity\Response;

/**
 * Class PersonUpdate
 * @package Client\Entity
 */
class PersonUpdate
{
    /**
     * @var boolean
     */
    private $success;

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return $this->success;
    }

    /**
     * @param bool $success
     * @return PersonUpdate
     */
    public function setSuccess($success)
    {
        $this->success = $success;

        return $this;
    }
}