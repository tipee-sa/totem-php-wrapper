<?php

namespace Test\Client;

use Client\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use PHPUnit_Framework_TestCase;

/**
 * Class TestCase
 * @package Test\Client
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