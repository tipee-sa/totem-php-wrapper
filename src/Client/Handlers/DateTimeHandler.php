<?php
namespace Client\Handlers;

use DateTime;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;

/**
 * Class DateTimeHandler
 * @package Client\Handlers
 */
class DateTimeHandler implements SubscribingHandlerInterface
{
    public static function getSubscribingMethods()
    {
        return array(
            array(
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => 'DateTime',
                'method' => 'deserializeDateTimeToJson',
            ),
        );
    }

    /**
     * @param JsonDeserializationVisitor $visitor
     * @param $datetime
     * @return string
     */
    public function deserializeDateTimeToJson(JsonDeserializationVisitor $visitor, $datetime)
    {
        $datetime = is_array($datetime) ? $datetime['date'] : $datetime;

        return DateTime::createFromFormat('Y-m-d H:i:s.u', $datetime);
    }
}