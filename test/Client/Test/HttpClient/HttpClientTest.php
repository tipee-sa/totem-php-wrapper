<?php

namespace Client\Test\HttpClient;

use Client\HttpClient\HttpClient;
use Client\Security\Authentication\AuthenticationInterface;
use Client\Test\TestCase;
use GuzzleHttp\ClientInterface;

/**
 * Class HttpClientTest
 * @package Client\Test\HttpClient
 */
class HttpClientTest extends TestCase
{

    /**
     * @test
     */
    public function get_WithValidOptions_Success()
    {
        $uri = '/some/path';
        $options = ['query' => ['test' => 123]];

        $guzzleClient = $this->prophesize(ClientInterface::class);
        $guzzleClient->request('GET', $uri, $options)
                     ->shouldBeCalled();

        $httpClient = new HttpClient($this->getAuthentication(), [], $guzzleClient->reveal());
        $httpClient->get($uri, $options);
    }

    /**
     * @test
     */
    public function post_WithValidOptions_Success()
    {
        $uri = '/some/path';
        $options = ['query' => ['test' => 123]];
        $json = '{"some":"json"}';

        $optionsRequest = array_merge(
            $options,
            [
                'body' => $json,
                'headers' => ['content-type' => 'application/json']
            ]
        );
        $guzzleClient = $this->prophesize(ClientInterface::class);
        $guzzleClient->request( 'POST', $uri, $optionsRequest)
                     ->shouldBeCalled();

        $httpClient = new HttpClient($this->getAuthentication(), [], $guzzleClient->reveal());
        $httpClient->post($uri, $json, $options);
    }

    /**
     * @test
     */
    public function put_WithValidOptions_Success()
    {
        $uri = '/some/path';
        $options = ['query' => ['test' => 123]];
        $json = '{"some":"json"}';

        $optionsRequest = array_merge($options, ['body' => $json, 'headers' => ['content-type' => 'application/json']]);

        $guzzleClient = $this->prophesize(ClientInterface::class);
        $guzzleClient->request('PUT', $uri, $optionsRequest)
                     ->shouldBeCalled();

        $httpClient = new HttpClient($this->getAuthentication(), [], $guzzleClient->reveal());
        $httpClient->put($uri, $json, $options);
    }

    /**
     * @test
     */
    public function patch_WithValidOptions_Success()
    {
        $uri = '/some/path';
        $options = ['query' => ['test' => 123]];
        $json = '{"some":"json"}';

        $optionsRequest = array_merge($options, ['body' => $json, 'headers' => ['content-type' => 'application/json']]);

        $guzzleClient = $this->prophesize(ClientInterface::class);
        $guzzleClient->request( 'PATCH', $uri, $optionsRequest)
                     ->shouldBeCalled();

        $httpClient = new HttpClient($this->getAuthentication(), [], $guzzleClient->reveal());
        $httpClient->patch($uri, $json, $options);
    }

    /**
     * @test
     */
    public function delete_WithValidOptions_Success()
    {
        $uri = '/some/path';
        $options = ['query' => ['test' => 123]];

        $guzzleClient = $this->prophesize(ClientInterface::class);
        $guzzleClient->request('DELETE', $uri, $options)
                     ->shouldBeCalled();

        /** @var ClientInterface $guzzleClient */
        $httpClient = new HttpClient($this->getAuthentication(), [], $guzzleClient->reveal());
        $httpClient->delete($uri, $options);
    }

    /**
     * @return AuthenticationInterface|object
     */
    private function getAuthentication()
    {
        $objectProphecy = $this->prophesize(AuthenticationInterface::class);
        return $objectProphecy->reveal();
    }
}
