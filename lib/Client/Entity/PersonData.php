<?php
namespace Client\Entity;

use Client\Serializer\SerializerBuilder;

/**
 * Class PersonData
 * @package Client\Entity
 */
class PersonData
{
    /**
     * @var PersonTipee
     */
    private $personTipee;

    /**
     * @var PersonGlobal
     */
    private $personGlobal;

    /**
     * @var string
     */
    private $namespace;

    /**
     * @param PersonTipee $personTipee
     * @return PersonData
     */
    public function setPersonTipee($personTipee)
    {
        $this->personTipee = $personTipee;

        return $this;
    }

    /**
     * @param PersonGlobal $personGlobal
     * @return PersonData
     */
    public function setPersonGlobal($personGlobal)
    {
        $this->personGlobal = $personGlobal;

        return $this;
    }

    /**
     * @param string $namespace
     * @return PersonData
     */
    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;

        return $this;
    }

    /**
     * Notes: With JMS Serializer, there is no way to make a json key from a value, so we have to do it manually.
     *        Moreover, we use our serializer (and json_decode) to create the required array, in order to make use of
     *        the serializer rules (files in Client/Totem/src/Resources/Serializer/*)
     *
     * @return array
     */
    public function serializeToJson()
    {
        $serializer = SerializerBuilder::build();

        return  [
            'global' => json_decode($serializer->serialize($this->personGlobal, SerializerBuilder::TYPE)),
            $this->namespace => json_decode($serializer->serialize($this->personTipee, SerializerBuilder::TYPE))
        ];
    }

    /**
     * @return PersonGlobal
     */
    public function getPersonGlobal()
    {
        return $this->personGlobal;
    }

    /**
     * @return PersonTipee
     */
    public function getPersonTipee()
    {
        return $this->personTipee;
    }
}