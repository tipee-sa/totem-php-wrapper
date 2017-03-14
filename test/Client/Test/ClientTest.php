<?php

namespace Client\Test;

use Client\Client;
use Client\HttpClient\HttpClientInterface;
use Client\Service\PersonService;
use Client\Service\SectorService;
use InvalidArgumentException;
use JMS\Serializer\SerializerInterface;

/**
 * Class ClientTest
 * @package Client\Test
 */
class ClientTest extends TestCase
{
    /**
     * @test
     * @dataProvider service_dataprovider
     *
     * @param string $serviceName
     * @param string $expectedClassName
     */
    public function service_WithValidName_ReturnsServiceInstance($serviceName, $expectedClassName)
    {
        /** @var SerializerInterface $serializer */
        $serializer = $this->getMock(SerializerInterface::class);

        /** @var HttpClientInterface $httpClient */
        $httpClient = $this->getMock(HttpClientInterface::class);

        $client = new Client($httpClient, $serializer);
        $service = $client->service($serviceName);

        $this->assertInstanceOf($expectedClassName, $service);
    }

    /**
     * @test
     * @dataProvider service_dataprovider
     *
     * @param string $serviceName
     * @param string $expectedClassName
     */
    public function service_ThroughMagicMethodWithValidName_ReturnsServiceInstance($serviceName, $expectedClassName)
    {
        /** @var SerializerInterface $serializer */
        $serializer = $this->getMock(SerializerInterface::class);

        /** @var HttpClientInterface $httpClient */
        $httpClient = $this->getMock(HttpClientInterface::class);

        $client = new Client($httpClient, $serializer);
        $service = $client->$serviceName();

        $this->assertInstanceOf($expectedClassName, $service);
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     *
     */
    public function service_WithUnknownName_throwsException()
    {

        /** @var SerializerInterface $serializer */
        $serializer = $this->getMock(SerializerInterface::class);
        /** @var HttpClientInterface $httpClient */
        $httpClient = $this->getMock(HttpClientInterface::class);

        $client = new Client($httpClient, $serializer);
        $client->service("unknown");
    }

    /**
     * @return array
     */
    public function service_dataprovider()
    {
        return [
            ['person', PersonService::class],
            ['persons', PersonService::class],
            ['sector', SectorService::class],
            ['sectors', SectorService::class],
        ];
    }
}
