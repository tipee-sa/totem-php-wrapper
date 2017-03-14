<?php

namespace Client\Entity;

/**
 * Class Person
 * @package Client\Entity
 */
class PersonGlobal
{
    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $npa;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $dateBirth;

    /**
     * @var string
     */
    private $avs;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $civility;

    /**
     * @var string
     */
    private $sex;

    /**
     * @var string
     */
    private $privatePhone;

    /**
     * @var string
     */
    private $mobilePhone;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $nationality;

    /**
     * @param string $firstname
     * @return PersonGlobal
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @param string $lastname
     * @return PersonGlobal
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @param string $address
     * @return PersonGlobal
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @param string $npa
     * @return PersonGlobal
     */
    public function setNpa($npa)
    {
        $this->npa = $npa;

        return $this;
    }

    /**
     * @param string $city
     * @return PersonGlobal
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @param string $dateBirth
     * @return PersonGlobal
     */
    public function setDateBirth($dateBirth)
    {
        $this->dateBirth = $dateBirth;

        return $this;
    }

    /**
     * @param string $avs
     * @return PersonGlobal
     */
    public function setAvs($avs)
    {
        $this->avs = $avs;

        return $this;
    }

    /**
     * @param string $country
     * @return PersonGlobal
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @param string $civility
     * @return PersonGlobal
     */
    public function setCivility($civility)
    {
        $this->civility = $civility;

        return $this;
    }

    /**
     * @param string $sex
     * @return PersonGlobal
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * @param string $privatePhone
     * @return PersonGlobal
     */
    public function setPrivatePhone($privatePhone)
    {
        $this->privatePhone = $privatePhone;

        return $this;
    }

    /**
     * @param string $mobilePhone
     * @return PersonGlobal
     */
    public function setMobilePhone($mobilePhone)
    {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }

    /**
     * @param string $email
     * @return PersonGlobal
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @param string $nationality
     * @return PersonGlobal
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getNpa()
    {
        return $this->npa;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getDateBirth()
    {
        return $this->dateBirth;
    }

    /**
     * @return string
     */
    public function getAvs()
    {
        return $this->avs;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getCivility()
    {
        return $this->civility;
    }

    /**
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @return string
     */
    public function getPrivatePhone()
    {
        return $this->privatePhone;
    }

    /**
     * @return string
     */
    public function getMobilePhone()
    {
        return $this->mobilePhone;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getNationality()
    {
        return $this->nationality;
    }

}