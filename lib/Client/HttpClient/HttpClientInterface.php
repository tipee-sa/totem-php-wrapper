<?php

namespace Client\HttpClient;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

/**
 * Interface HttpClientInterface
 * @package Client\HttpClient
 */
interface HttpClientInterface
{

    /**
     * Send a GET request.
     *
     * @param string $uri
     *
     * @param array  $options
     *
     * @return Response
     */
    public function get($uri, array $options = []);

    /**
     * Send a POST request.
     *
     * @param string $uri
     * @param string $jsonBody
     * @param array  $options
     *
     * @return Response
     */
    public function post($uri, $jsonBody, array $options = []);

    /**
     * Send a PUT request.
     *
     * @param string $uri
     * @param string $jsonBody
     * @param array  $options
     *
     * @return Response
     */
    public function put($uri, $jsonBody, array $options = []);

    /**
     * Send a PATCH request.
     *
     * @param string $uri
     * @param string $jsonBody
     * @param array  $options
     *
     * @return Response
     */
    public function patch($uri, $jsonBody, array $options = []);

    /**
     * Send a DELETE request.
     *
     * @param string $uri
     * @param array  $options
     *
     * @return Response
     */
    public function delete($uri, array $options = []);

    /**
     * Send a request to the server, receive a response,
     * decode the response and returns an associative array.
     *
     * @param string      $method
     * @param string      $uri
     * @param string|null $jsonBody
     * @param array       $options
     *
     * @return Request
     */
    public function request($method, $uri, $jsonBody = null, array $options = []);
}