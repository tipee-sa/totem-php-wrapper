<?php

namespace Client;

use Client\HttpClient\HttpClientInterface;
use Client\Service\AbstractService;
use Client\Service\PersonService;
use Client\Service\SectorService;
use JMS\Serializer\SerializerInterface;
use InvalidArgumentException;

/**
 * Class Client
 * @package Client
 *
 * @method PersonService person()
 */
class Client
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    /**
     * Instantiate a new Totem client.
     *
     * @param SerializerInterface $serializer
     * @param HttpClientInterface $httpClient
     */
    public function __construct(HttpClientInterface $httpClient, SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
        $this->httpClient = $httpClient;
    }

    /**
     * @param string $name
     *
     * @return AbstractService
     */
    public function service($name)
    {
        switch ($name) {
            case 'person':
            case 'persons':
                $service = new PersonService($this->serializer, $this->httpClient);
                break;
            case 'sector':
            case 'sectors':
                $service = new SectorService($this->serializer, $this->httpClient);
                break;
            default:
                throw new InvalidArgumentException(sprintf('Undefined service instance called: "%s"', $name));
        }

        return $service;
    }

    /**
     * @param string $name
     *
     * @param        $args
     *
     * @return AbstractService
     */
    public function __call($name, $args)
    {
        return $this->service($name);
    }

}