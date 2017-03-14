<?php

namespace Client\Test;

use Client\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use PHPUnit_Framework_TestCase;

/**
 * Class TestCase
 * @package Client\Test
 */
abstract class TestCase extends PHPUnit_Framework_TestCase
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
    static public function setUpBeforeClass()
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