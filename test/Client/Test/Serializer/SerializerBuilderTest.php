<?php
use Client\Serializer\SerializerBuilder;
use Client\Test\TestCase;
use JMS\Serializer\SerializerInterface;

/**
 * Class SerializerBuilderTest
 */
class SerializerBuilderTest extends TestCase
{
    /**
     * @test
     */
    public function build_Success()
    {
        $this->assertInstanceOf(SerializerInterface::class, SerializerBuilder::build());
    }
}