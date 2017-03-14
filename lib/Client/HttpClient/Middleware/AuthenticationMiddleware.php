<?php

namespace Client\HttpClient\Middleware;

use Client\Security\Authentication\AuthenticationInterface;
use Psr\Http\Message\RequestInterface;

/**
 * Class AuthenticationMiddleware
 * @package Client\HttpClient\Middleware
 */
class AuthenticationMiddleware
{

    /**
     * @var AuthenticationInterface
     */
    private $authentication;

    /**
     * @param AuthenticationInterface $authentication
     */
    public function __construct($authentication)
    {
        $this->authentication = $authentication;
    }

    /**
     * @param callable $handler
     *
     * @return callable
     */
    public function __invoke(callable $handler)
    {
        return function (RequestInterface $request, array $options) use ($handler) {

            foreach ($this->authentication->getHeaders() as $key => $value) {
                $request = $request->withHeader($key, $value);
            }

            return $handler($request, $options);

        };
    }
}