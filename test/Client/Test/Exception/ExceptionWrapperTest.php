<?php

namespace Client\Test\Exception;

use Client\Entity\Error\ApiError;
use Client\Exception\ApiException;
use Client\Exception\ExceptionWrapper;
use Client\Test\TestCase;
use GuzzleHttp\Exception\RequestException;
use Prophecy\Prophecy\ObjectProphecy;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ExceptionWrapperTest
 * @package Client\Test\Exception
 */
class ExceptionWrapperTest extends TestCase
{
    /**
     * @test
     */
    public function wrap_401AndNoCredentialsGiven_ReturnsApiException()
    {
        /** @var ObjectProphecy|RequestInterface $request */
        $request = $this->prophesize(RequestInterface::class);
        $request->hasHeader('Authentication')
                ->shouldBeCalled()
                ->willReturn(false);

        $response = $this->prophesize(ResponseInterface::class);
        $response->getStatusCode()
                 ->shouldBeCalled()
                 ->willReturn(401);

        /**
         * @var RequestInterface  $request
         * @var ResponseInterface $response
         */
        $requestException = new RequestException('Error 401', $request->reveal(), $response->reveal());

        /** @var RequestException $requestException */
        $this->assertEquals(
          new ApiException(new ApiError(401, 'Authentication Required')),
          ExceptionWrapper::wrap($requestException, $this->getSerializer())
        );
    }

    /**
     * @test
     */
    public function wrap_401AndCredentialsGiven_ReturnsApiException()
    {
        /** @var ObjectProphecy|RequestInterface $request */
        $request = $this->prophesize(RequestInterface::class);
        $request->hasHeader('Authentication')
                ->shouldBeCalled()
                ->willReturn(true);

        $response = $this->prophesize(ResponseInterface::class);
        $response->getStatusCode()
                 ->shouldBeCalled()
                 ->willReturn(401);

        /**
         * @var RequestInterface  $request
         * @var ResponseInterface $response
         *
         */
        $requestException = new RequestException('Error 401', $request->reveal(), $response->reveal());

        /** @var RequestException $requestException */
        $this->assertEquals(
          new ApiException(new ApiError(401, 'Invalid Credentials')),
          ExceptionWrapper::wrap($requestException, $this->getSerializer())
        );
    }
}
