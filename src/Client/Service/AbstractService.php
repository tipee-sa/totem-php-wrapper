<?php

namespace Client\Service;

use Client\Exception\ApiException;
use Client\Exception\ExceptionWrapper;
use Client\HttpClient\HttpClientInterface;
use Client\Serializer\SerializerBuilder;
use GuzzleHttp\Exception\RequestException;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class AbstractService
 * @package Client\Service
 */
abstract class AbstractService
{
    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    /**
     * PersonService constructor.
     * @param SerializerInterface $serializer
     * @param HttpClientInterface $httpClient
     */
    public function __construct(SerializerInterface $serializer, HttpClientInterface $httpClient)
    {
        $this->serializer = $serializer;
        $this->httpClient = $httpClient;
    }

    /**
     * Send a POST request with JSON-encoded parameters.
     *
     * @param string $uri
     * @param array  $json
     * @param array  $options
     *
     * @return ResponseInterface
     * @throws ApiException
     */
    protected function post($uri, $json, array $options = [])
    {
        try {
            $response = $this->httpClient->post($uri, $json, $options);

            return $response;
        } catch (RequestException $exception) {
            throw ExceptionWrapper::wrap($exception, $this->serializer);
        }
    }

    /**
     * Send a PUT request with JSON-encoded parameters.
     *
     * @param string $uri
     * @param array  $json
     * @param array  $options
     *
     * @return ResponseInterface
     * @throws ApiException
     */
    protected function put($uri, $json, array $options = [])
    {
        try {
            $response = $this->httpClient->put($uri, $json, $options);

            return $response->getBody()->getContents();
        } catch (RequestException $exception) {
            throw ExceptionWrapper::wrap($exception, $this->serializer);
        }
    }


    /**
     * Send a GET request with query parameters.
     *
     * @param string $uri
     * @param array  $options
     *
     * @return string
     * @throws ApiException
     */
    protected function get($uri, array $options = [])
    {
        try {
            $response = $this->httpClient->get($uri, $options);

            return $response->getBody()->getContents();
        } catch (RequestException $exception) {
            throw ExceptionWrapper::wrap($exception, $this->serializer);
        }
    }

    /**
     * @param string                 $json
     * @param string                 $type
     * @param DeserializationContext $context
     *
     * @return mixed
     */
    protected function deserialize($json, $type, DeserializationContext $context = null)
    {
        return $this->serializer->deserialize($json, $type, SerializerBuilder::TYPE, $context);
    }


    /**
     * @param mixed $entity
     * @param SerializationContext $context
     *
     * @return mixed
     */
    protected function serialize($entity, SerializationContext $context = null)
    {
        return $this->serializer->serialize($entity, SerializerBuilder::TYPE, $context);
    }
}