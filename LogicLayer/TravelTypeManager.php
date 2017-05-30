<?php

/**
 * Created by PhpStorm.
 * User: musa
 * Date: 10/05/2017
 * Time: 21:58
 */
    require_once (__DIR__."/../DataLayer/DB.php");
    require_once ("TravelType.php");
    
class TravelTypeManager
{
    public static function getAllTraveltypes()
    {
        $db = new DB();
        $success = $db->getDataTable("select * from TravelType");
        $allTraveltypes = array();

        while($row = $success->fetch_assoc())
        {
            $traveltypeObj = new TravelType($row["traveltypeID"], $row["name"]);
            array_push($allTraveltypes, $traveltypeObj);
        }
        return $allTraveltypes;
    }


    public static function insertNewTraveltype($name)
    {
        $db = new DB();
        $success = $db->executeQuery("INSERT INTO TravelType(travelTypeID, name) VALUES (NULL, '$name')");

        return $success;

    }

    public static function getTraveltypeById($traveltypeID)
    {
        $db = new DB();
        $success = $db->getDataTable("SELECT * FROM TravelType WHERE travelTypeID ='$traveltypeID'");
        $newTraveltype = null;
        if($success->num_rows > 0)
        {
            $row = $success->fetch_assoc();
            $newTraveltype = new TravelType($row["traveltypeID"], $row["name"]);
        }
        return $newTraveltype;

    }

    public static function updateTraveltype(TravelType $updateObj)
    {
        $db = new DB();
        $db->executeQuery("UPDATE TravelType SET name = $updateObj->getName()");

    }

    public static function deleteTraveltypeById($traveltypeID)
    {
        $db = new DB();
        $db->executeQuery("DELETE * FROM TravelType WHERE travelTypeID = '$traveltypeID'");
    }

}