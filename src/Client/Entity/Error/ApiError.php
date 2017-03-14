<?php

namespace Client\Entity\Error;

/**
 * Class ApiError
 * @package Client\Entity\Error
 */
class ApiError
{

    /**
     * @var int
     */
    private $code;

    /**
     * @var string
     */
    private $message;

    /**
     * @var FieldError[]
     */
    private $fieldErrors;

    /**
     * @param int          $code
     * @param string       $message
     * @param FieldError[] $fieldErrors
     */
    public function __construct($code, $message, array $fieldErrors = [])
    {
        $this->code = (int)$code;
        $this->message = (string)$message;
        $this->fieldErrors = $fieldErrors;
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return FieldError[]
     */
    public function getFieldErrors()
    {
        return $this->fieldErrors ?: [];
    }
}