<?php
/**
 * Created by PhpStorm.
 * User: musa
 * Date: 28/05/2017
 * Time: 22:36
 */
require_once ("../LogicLayer/TourManager.php");
require_once ("../DataLayer/Database.php");

$headers = array("Content-Type: application/json");

$url = "http://traveloo.000webhostapp.com/sendInformations.php";

// initialize a cURL session
$ch = curl_init();

// set the url, number of GET vars, GET data
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// TRUE to return the transfer as a string of the return value of curl_exec()
// instead of outputting it out directly
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
// FALSE to stop cURL from verifying the peer's certificate.
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// execute request
$result = curl_exec($ch);

// close cURL resource, and free up system resources
curl_close($ch);

// get the result and parse to JSON

$result_arr = json_decode($result, true);

$update = $result_arr['tours'];

foreach((array)$result_arr['tours'] as $tour_arr)
{
    $tourID = $tour_arr["tourID"];
    $tourinfo = TourManager::getTourById($tourID);
    if(!$tourinfo == null)
    {
        $destination = $tourinfo->getDestination();
        $startDate = $tourinfo->getStartDate();
        $finishDate = $tourinfo->getFinishDate();
        $cost = $tourinfo->getCost();
        $travelTypeID = $tourinfo->getTravelTypeID();
        $hotelID = $tourinfo->getHotelID();
        $capacity = $tourinfo->getCapacity();

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE Tour SET destination = ?, startDate = ?, finishDate =?, cost = ?, travelTypeID = ?, hotelID = ?, capacity = ? WHERE tourID = ?";
        $q = $pdo->prepare($sql);
        $capacity = $capacity - $tour_arr["Number Of Tickets"];
        $q->execute(array($destination,$startDate,$finishDate,$cost,$travelTypeID,$hotelID,$capacity, $tourID));
        Database::disconnect();

        if($capacity < 1)
        {
            TourManager::deleteTourById($tourID);
        }
    }

    header("Location: ../PresentationLayer/AdminPage.php");

}