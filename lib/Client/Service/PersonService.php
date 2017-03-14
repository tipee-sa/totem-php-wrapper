<?php

namespace Client\Service;

use Client\Entity\Person;
use Client\Entity\PersonGlobal;
use Client\Entity\PersonTipee;
use Client\Entity\Response\PersonCreate;
use Client\Entity\Response\PersonUpdate;

/**
 * Class PersonService
 * @package Client\Services
 */
class PersonService extends AbstractService
{
    /**
     * @param Person $personRequest
     * @return PersonCreate
     */
    public function create(Person $personRequest)
    {
        $personJson = $this->serialize($personRequest);

        $response = $this->post("users/create", $personJson);

        return $this->deserialize($response->getBody()->getContents(), PersonCreate::class);
    }

    /**
     * @param $totemId
     * @param PersonGlobal $personGlobal
     * @return PersonUpdate
     */
    public function updatePersonGlobal($totemId, PersonGlobal $personGlobal)
    {
        $personGlobalJson = $this->serialize($personGlobal);

        $response = $this->put("users/$totemId/global", $personGlobalJson);

        return $this->deserialize($response, PersonUpdate::class);
    }

    /**
     * @param $totemId
     * @param $namespace
     * @param PersonTipee $personTipee
     * @return PersonUpdate
     */
    public function updatePersonTipee($totemId, $namespace, PersonTipee $personTipee)
    {
        $personTipeeJson = $this->serialize($personTipee);

        $response = $this->put("users/$totemId/$namespace", $personTipeeJson);

        return $this->deserialize($response, PersonUpdate::class);
    }

    /**
     * @param $totemId
     * @param $username
     * @return mixed
     */
    public function updatePersonUsername($totemId, $username)
    {
        $body = $this->serialize(['username' => $username]);

        $response = $this->put("users/$totemId/username", $body);

        return $this->deserialize($response, PersonUpdate::class);
    }

    /**
     * @param $totemId
     * @param $password
     * @return mixed
     */
    public function updatePersonPassword($totemId, $password)
    {
        $body = $this->serialize(['password' => $password]);

        $response = $this->put("users/$totemId/password", $body);

        return $this->deserialize($response, PersonUpdate::class);
    }

    /**
     * @param $totemId
     * @param $namespace
     * @return PersonTipee
     */
    public function getTotemData($totemId, $namespace)
    {
        $response = $this->get("users/$totemId/$namespace");

        return $this->deserialize($response, PersonTipee::class);
    }

}