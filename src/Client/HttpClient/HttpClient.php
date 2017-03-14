<?php

namespace Client\HttpClient;


use Client\HttpClient\Middleware\AuthenticationMiddleware;
use Client\Security\Authentication\AuthenticationInterface;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\HandlerStack;
use Psr\Http\Message\ResponseInterface;

/**
 * Class HttpClient
 * @package Client\HttpClient
 */
class HttpClient implements HttpClientInterface
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var []
     */
    private $options;

    /**
     * @var AuthenticationInterface
     */
    private $authentication;

    /**
     * HttpClient constructor.
     *
     * @param AuthenticationInterface $authentication
     * @param array $options
     * @param ClientInterface $client
     */
    public function __construct(AuthenticationInterface $authentication, array $options = [], ClientInterface $client = null)
    {
        $this->client = $client;
        $this->options = $options;
        $this->authentication = $authentication;
    }

    /**
     * {@inheritdoc}
     */
    public function get($uri, array $options = [])
    {
        return $this->request('GET', $uri, null, $options);
    }

    /**
     * {@inheritDoc}
     */
    public function post($uri, $jsonBody, array $options = [])
    {
        return $this->request('POST', $uri, $jsonBody, $options);
    }

    /**
     * {@inheritDoc}
     */
    public function put($uri, $jsonBody, array $options = [])
    {
        return $this->request('PUT', $uri, $jsonBody, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function patch($uri, $jsonBody, array $options = [])
    {
        return $this->request('PATCH', $uri, $jsonBody, $options);
    }

    /**
     * {@inheritDoc}
     */
    public function delete($uri, array $options = [])
    {
        return $this->request('DELETE', $uri, null, $options);
    }

    /**
     * {@inheritDoc}
     */
    public function request($method, $uri, $jsonBody = null, array $options = [])
    {
        if (!empty($jsonBody)) {
            $options['body'] = $jsonBody;
            $options['headers']['content-type'] = 'application/json';
        }

        $this->handleAuthorization();

        return $this->doRequest($method, $uri, $options);
    }

    /**
     * @param       $method
     * @param       $uri
     * @param array $options
     *
     * @return ResponseInterface
     */
    private function doRequest($method, $uri, array $options)
    {
        $client = $this->client ?: new Client($this->options);
        return $client->request($method, $uri, $options);
    }

    /**
     * Handle Authorization
     */
    private function handleAuthorization()
    {
        $stack = HandlerStack::create();

        if (! empty($this->authentication)) {
            $stack->push(new AuthenticationMiddleware($this->authentication));
        }

        $this->options['handler'] = $stack;
    }

}