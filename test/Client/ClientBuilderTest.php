<?php
namespace Test\Client;

use Client\Client;
use Client\ClientBuilder;

/**
 * Class ClientBuilderTest
 * @package Test\Client
 */
class ClientBuilderTest extends TestCase
{
    /**
     * @test
     */
    public function build_Success()
    {
        $authorizationHeader = "Authorization: XXX";
        $client = ClientBuilder::create($authorizationHeader, 'http://127.0.0.1:8888')->build();
        $this->assertInstanceOf(Client::class, $client);
    }
}
