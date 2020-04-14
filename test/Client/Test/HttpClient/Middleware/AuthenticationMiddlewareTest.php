<?php

namespace Client\Test\HttpClient\Middleware;

use Client\HttpClient\Middleware\AuthenticationMiddleware;
use Client\Security\Authentication\AuthenticationInterface;
use Client\Test\TestCase;
use Psr\Http\Message\RequestInterface;

/**
 * Class AuthenticationMiddlewareTest
 * @package Client\Test\HttpClient\Middleware
 */
class AuthenticationMiddlewareTest extends TestCase
{

    /**
     * @test
     */
    public function invoke_Success()
    {
        $authentication = $this->createMock(AuthenticationInterface::class);
        $authentication->expects($this->once())
                       ->method('getHeaders')
                       ->willReturn(['Authentication' => 'XXX', 'OtherOption' => 'XXX']);

        /** @var AuthenticationInterface $authentication */
        $middleware = new AuthenticationMiddleware($authentication);

        $request = $this->createMock(RequestInterface::class);
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