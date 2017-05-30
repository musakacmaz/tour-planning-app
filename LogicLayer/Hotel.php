<?php

/**
 * Created by PhpStorm.
 * User: musa
 * Date: 10/05/2017
 * Time: 21:46
 */
class Hotel
{
    private $hotelID;
    private $name;
    private $country;
    private $city;

    /**
     * Hotel constructor.
     * @param $hotelID
     * @param $name
     * @param $country
     * @param $city
     * @param $cost
     */
    public function __construct($hotelID, $name, $country, $city)
    {
        $this->hotelID = $hotelID;
        $this->name = $name;
        $this->country = $country;
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getHotelID()
    {
        return $this->hotelID;
    }

    /**
     * @param mixed $hotelID
     */
    public function setHotelID($hotelID)
    {
        $this->hotelID = $hotelID;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }




}