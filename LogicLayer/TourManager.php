<?php

/**
 * Created by PhpStorm.
 * User: musa
 * Date: 09/05/2017
 * Time: 22:21
 */
    require_once (__DIR__."/../DataLayer/DB.php");
    require_once("Tour.php");

class TourManager
{
    public static function getAllTours()
    {
        $db = new DB();
        $success = $db->getDataTable("select * from Tour");
        $allTours = array();

        while($row = $success->fetch_assoc())
        {
            $tourObj = new Tour($row["tourID"], $row["destination"], $row["startDate"], $row["finishDate"], $row["cost"], $row["travelTypeID"], $row["hotelID"], $row["capacity"], $row["status"]);
            array_push($allTours, $tourObj);
        }
        return $allTours;
    }


    public static function insertNewTour($destination, $startDate, $finishDate, $cost, $travelTypeID, $hotelID, $capacity, $status)
    {
        $db = new DB();
        $success = $db->executeQuery("INSERT INTO Tour(tourID, destination, startDate, finishDate, cost, travelTypeID, hotelID, capacity, status) VALUES (NULL, '$destination', '$startDate', '$finishDate', '$cost', '$travelTypeID', '$hotelID', '$capacity', '$status')");

        return $success;

    }

    public static function getTourById($tourID)
    {
        $db = new DB();
        $success = $db->getDataTable("SELECT * FROM Tour WHERE tourID ='$tourID'");
        $newTour = null;
        if($success->num_rows > 0)
        {
            $row = $success->fetch_assoc();
            $newTour = new Tour($row["tourID"], $row["destination"], $row["startDate"], $row["finishDate"], $row["cost"], $row["travelTypeID"], $row["hotelID"], $row["capacity"], $row["status"]);
        }
        return $newTour;

    }

    public static function updateTour(Tour $updateObj)
    {
        $db = new DB();
        $db->executeQuery("UPDATE Tour SET destination = $updateObj->getDestination(), startDate = $updateObj->getstartDate(),
finishDate = $updateObj->getfinishDate(), cost = $updateObj->getCost(), travelTypeID = $updateObj->getTravelTypeID(), hotelID = $updateObj->getHotelID(), capacity = $updateObj->getCapacity(), status = $updateObj->getStatus(), WHERE tourID = $updateObj->getTourID");

    }

    public static function deleteTourById($tourID)
    {
        $db = new DB();
        $db->executeQuery("DELETE FROM Tour WHERE tourID = '$tourID'");
    }



}