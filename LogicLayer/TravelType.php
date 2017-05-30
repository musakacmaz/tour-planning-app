<?php

/**
 * Created by PhpStorm.
 * User: musa
 * Date: 10/05/2017
 * Time: 21:58
 */
class TravelType
{
    private $travelTypeID;
    private $name;

    /**
     * TravelType constructor.
     * @param $travelTypeID
     * @param $name
     */
    public function __construct($travelTypeID, $name)
    {
        $this->travelTypeID = $travelTypeID;
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getTravelTypeID()
    {
        return $this->travelTypeID;
    }

    /**
     * @param mixed $travelTypeID
     */
    public function setTravelTypeID($travelTypeID)
    {
        $this->travelTypeID = $travelTypeID;
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




}