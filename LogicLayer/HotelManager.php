<?php

/**
 * Created by PhpStorm.
 * User: musa
 * Date: 10/05/2017
 * Time: 21:46
 */
    require_once (__DIR__."/../DataLayer/DB.php");
    require_once ("Hotel.php");
    
class HotelManager
{
    public static function getAllHotels()
    {
        $db = new DB();
        $success = $db->getDataTable("select * from Hotel");
        $allHotels = array();

        while($row = $success->fetch_assoc())
        {
            $hotelObj = new Hotel($row["hotelID"], $row["name"], $row["country"], $row["city"]);
            array_push($allHotels, $hotelObj);
        }
        return $allHotels;
    }


    public static function insertNewHotel($name, $country, $city)
    {
        $db = new DB();
        $success = $db->executeQuery("INSERT INTO Hotel(hotelID, name, country, city) VALUES (NULL, '$name', '$country', '$city')");

        return $success;

    }

    public static function getHotelById($hotelID)
    {
        $db = new DB();
        $success = $db->getDataTable("SELECT * FROM Hotel WHERE hotelID ='$hotelID'");
        $newHotel = null;
        if($success->num_rows > 0)
        {
            $row = $success->fetch_assoc();
            $newHotel = new Hotel($row["hotelID"], $row["name"], $row["country"], $row["city"]);
        }
        return $newHotel;

    }

    public static function updateHotel(Hotel $updateObj)
    {
        $db = new DB();
        $db->executeQuery("UPDATE Hotel SET name = $updateObj->getName(),  country = $updateObj->getCountry(), city = $updateObj->getCity()");

    }

    public static function deleteHotelById($hotelID)
    {
        $db = new DB();
        $db->executeQuery("DELETE * FROM Hotel WHERE hotelID = '$hotelID'");
    }
    

}