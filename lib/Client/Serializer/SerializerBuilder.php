<?php
namespace Client\Serializer;

use Client\Handlers\DateTimeHandler;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\SerializerBuilder as JMSSerializerBuilder;
use JMS\Serializer\SerializerInterface;

/**
 * Class SerializerBuilder
 * @package Client\Serializer
 */
class SerializerBuilder
{
    const TYPE = 'json';

    /**
     * @return SerializerInterface
     */
    public static function build()
    {
        return JMSSerializerBuilder::create()
            ->addMetadataDir(__DIR__ . '/../Resources/Serializer')
            ->addDefaultHandlers()
            ->configureHandlers(function(HandlerRegistry $registry) {
                $registry->registerSubscribingHandler(new DateTimeHandler());
            })
            ->build();
    }
}