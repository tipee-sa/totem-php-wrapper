<?php

namespace Client\Exception;

use Client\Entity\Error\ApiError;
use Client\Entity\Error\FieldError;


/**
 * Class ApiException
 * @package Client\Exception
 */
class ApiException extends \Exception
{

    /**
     * @var ApiError
     */
    private $apiError;

    /**
     * @param ApiError $apiError
     */
    public function __construct(ApiError $apiError)
    {
        parent::__construct($apiError->getMessage(), $apiError->getCode());

        $this->apiError = $apiError;
    }

    /**
     * @return ApiError
     */
    public function getApiError()
    {
        return $this->apiError;
    }

    /**
     * @return FieldError[]
     */
    public function getFieldErrors()
    {
        return $this->apiError->getFieldErrors();
    }
}