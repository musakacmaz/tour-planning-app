<?php
/**
 * Created by PhpStorm.
 * User: musa
 * Date: 27/05/2017
 * Time: 01:42
 */

require_once ("../LogicLayer/HotelManager.php");
require_once ("../DataLayer/DB.php");

$conn = mysqli_connect("localhost", "root", "1292453");
mysqli_select_db($conn, 'Travelo');

$conn->set_charset("utf8");


// prepare, bind and execute SQL statement
$stmt = $conn->prepare("SELECT hotelID, name, country, city FROM Hotel");
$stmt->execute();
$stmt->bind_result($hotelID, $name, $country, $city);

$hotels = array();
while ($stmt->fetch())
{
    array_push( $hotels, array("hotelID" => $hotelID, "name" => $name, "country" => $country, "city" => $city) );
}

$stmt->close(); // close statement



header('Content-type: application/json');
echo json_encode(array('hotels' => $hotels));
