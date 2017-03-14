<?php

namespace Client\Entity;

use DateTime;

/**
 * Class PersonTipee
 * @package Client\Entity
 */
class PersonTipee
{

    /**
     * @var string
     */
    private $id;

    /**
     * @var DateTime
     */
    private $dateHiring;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $passwordClear;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return DateTime
     */
    public function getDateHiring()
    {
        return $this->dateHiring;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $id
     * @return PersonTipee
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param DateTime $dateHiring
     * @return PersonTipee
     */
    public function setDateHiring($dateHiring)
    {
        $this->dateHiring = $dateHiring;

        return $this;
    }

    /**
     * @param string $password
     * @return PersonTipee
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @param string $passwordClear
     * @return PersonTipee
     */
    public function setPasswordClear($passwordClear)
    {
        $this->passwordClear = $passwordClear;

        return $this;
    }

    /**
     * @return string
     */
    public function getPasswordClear()
    {
        return $this->passwordClear;
    }


}