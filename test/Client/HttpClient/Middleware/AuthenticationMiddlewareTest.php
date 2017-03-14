<?php

namespace Test\Client\HttpClient\Middleware;

use Client\HttpClient\Middleware\AuthenticationMiddleware;
use Client\Security\Authentication\AuthenticationInterface;
use Test\Client\TestCase;
use Psr\Http\Message\RequestInterface;

/**
 * Class AuthenticationMiddlewareTest
 * @package Test\Client\HttpClient\Middleware
 */
class AuthenticationMiddlewareTest extends TestCase
{

    /**
     * @test
     */
    public function invoke_Success()
    {
        $authentication = $this->getMock(AuthenticationInterface::class);
        $authentication->expects($this->once())
                       ->method('getHeaders')
                       ->willReturn(['Authentication' => 'XXX', 'OtherOption' => 'XXX']);

        /** @var AuthenticationInterface $authentication */
        $middleware = new AuthenticationMiddleware($authentication);

        $request = $this->getMock(RequestInterface::class);
        $request->expects($this->exactly(2))
                ->method('withHeader')
                ->withConsecutive( ['Authentication', 'XXX'], ['OtherOption', 'XXX'])
                ->willReturnSelf();

        $callable = $middleware(
            function (RequestInterface $actualRequest, array $options) use ($request) {
                $this->assertEquals($request, $actualRequest);
                $this->assertEquals(['Hello World'], $options);
            }
        );

        $callable($request, ['Hello World']);
    }
}