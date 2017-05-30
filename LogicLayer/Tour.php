<?php

/**
 * Created by PhpStorm.
 * User: musa
 * Date: 09/05/2017
 * Time: 22:16
 */
class Tour
{
    private $tourID;
    private $destination;
    private $startDate;
    private $finishDate;
    private $cost;
    private $travelTypeID;
    private $hotelID;
    private $capacity;
    private $status;

    public function __construct($tourID, $destination, $startDate, $finishDate, $cost, $travelTypeID, $hotelID, $capacity, $status)
    {
        $this->tourID = $tourID;
        $this->destination = $destination;
        $this->startDate = $startDate;
        $this->finishDate = $finishDate;
        $this->cost = $cost;
        $this->travelTypeID = $travelTypeID;
        $this->hotelID = $hotelID;
        $this->capacity = $capacity;
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getTourID()
    {
        return $this->tourID;
    }

    /**
     * @param mixed $tourID
     */
    public function setTourID($tourID)
    {
        $this->tourID = $tourID;
    }



    /**
     * @return mixed
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param mixed $destination
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getFinishDate()
    {
        return $this->finishDate;
    }

    /**
     * @param mixed $finishDate
     */
    public function setFinishDate($finishDate)
    {
        $this->finishDate = $finishDate;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param mixed $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
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
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * @param mixed $capacity
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }





}