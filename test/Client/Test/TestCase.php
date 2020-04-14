<?php

namespace Client\Test;

use Client\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * Class TestCase
 * @package Client\Test
 */
abstract class TestCase extends PHPUnitTestCase
{

    /**
     * @var SerializerInterface
     */
    private static $serializer;

    /**
     * @return SerializerInterface
     */
    protected function getSerializer()
    {
        return self::$serializer;
    }

    /**
     * @param object|array $data
     *
     * @return string
     */
    protected function serialize($data)
    {
        return self::$serializer->serialize($data, 'json');
    }

    /**
     * {@inheritdoc}
     */
    static public function setUpBeforeClass(): void
    {
        self::configureSerializer();
    }

    /**
     * Configures the serializer
     */
    static private function configureSerializer()
    {
        self::$serializer = SerializerBuilder::build();
    }
}