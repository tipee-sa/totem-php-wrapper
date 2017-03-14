<?php

namespace Client;

use Client\HttpClient\HttpClient;
use Client\Security\Authentication\TotemTokenAuthentication;
use Client\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

/**
 * Class ClientBuilder
 * @package Client
 */
class ClientBuilder
{

    /**
     * @var string
     */
    private $baseUri;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var boolean
     */
    private $debug;

    /**
     * @var string
     */
    private $authorizationHeader;


    /**
     * ClientBuilder constructor.
     * @param string $authorizationHeader
     * @param $baseUri
     */
    private function __construct($authorizationHeader, $baseUri)
    {
        $this->authorizationHeader = $authorizationHeader;
        $this->baseUri = $baseUri;
    }

    /**
     *
     * @param $authorizationHeader
     * @param $baseUri
     * @return ClientBuilder
     */
    public static function create($authorizationHeader, $baseUri) {
        return new static($authorizationHeader, $baseUri);
    }

    /**
     * @return Client
     */
    public function build()
    {
        return new Client(
            new HttpClient(
                new TotemTokenAuthentication($this->authorizationHeader),
                [
                    'base_uri' => $this->baseUri,
                    'debug'    => $this->debug,
                ]
            ),
            $this->serializer ?: SerializerBuilder::build()
        );
    }


    /**
     * @param SerializerInterface $serializer
     */
    public function setSerializer(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param boolean $debug
     *
     * @return ClientBuilder
     */
    public function setDebug($debug)
    {
        $this->debug = (bool)$debug;

        return $this;
    }
}
