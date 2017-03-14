<?php
namespace Client\Exception;

use Client\Entity\Error\ApiError;
use GuzzleHttp\Exception\RequestException;
use JMS\Serializer\SerializerInterface;

/**
 * Class ExceptionWrapper
 * @package Client\Exception
 */
class ExceptionWrapper
{

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @param SerializerInterface $serializer
     */
    private function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param RequestException    $exception
     * @param SerializerInterface $serializer
     *
     * @return ApiException
     */
    static public function wrap(RequestException $exception, SerializerInterface $serializer)
    {
        $wrapper = new static($serializer);

        return $wrapper->parseException($exception);
    }

    /**
     * @param RequestException $exception
     *
     * @return ApiException
     */
    private function parseException(RequestException $exception)
    {
        if ($exception->getCode() === 401) {
            return new ApiException($this->create401Error($exception));
        }
        if ($exception->getCode() === 409) {
            return new ApiException($this->create409Error($exception));
        }

        return new ApiException(new ApiError($exception->getCode(), $exception->getMessage()));
    }

    /**
     * @param RequestException $exception
     *
     * @return ApiError
     */
    private function create401Error(RequestException $exception)
    {
        $request = $exception->getRequest();

        if ($request->hasHeader('Authentication')) {
            return new ApiError($exception->getCode(), 'Invalid Credentials');
        }

        return new ApiError($exception->getCode(), 'Authentication Required');
    }

    /**
     * @param RequestException $exception
     *
     * @return ApiError
     */
    private function create409Error(RequestException $exception)
    {
        preg_match_all('/{.*}/', $exception->getMessage(), $matches);

        $response = json_decode($matches[0][0]);

        return new ApiError($exception->getCode(), $response->reason);
    }

}