<?php

namespace Client\Entity\Error;

/**
 * Class FieldError
 * @package Client\HttpClient\Entity\Error
 */
class FieldError
{

    /**
     * @var string
     */
    private $field;

    /**
     * @var string
     */
    private $message;

    /**
     * @param string $field
     * @param string $message
     */
    public function __construct($field, $message)
    {
        $this->field = $field;
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
}