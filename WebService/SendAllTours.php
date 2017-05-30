<?php
/**
 * Created by PhpStorm.
 * User: musa
 * Date: 27/05/2017
 * Time: 01:42
 */

$conn = mysqli_connect("localhost", "root", "1292453");
mysqli_select_db($conn, 'Travelo');

$conn->set_charset("utf8");


// prepare, bind and execute SQL statement
$stmt = $conn->prepare("SELECT tourID, destination, startDate, finishDate, cost, travelTypeID, hotelID, capacity FROM Tour");
$stmt->execute();
$stmt->bind_result($tourID, $destination, $startDate, $finishDate, $cost, $travelTypeID, $hotelID, $capacity);

$tours = array();
while ($stmt->fetch())
{
    array_push( $tours, array("tourID"=>$tourID, "destination"=>$destination, "startDate"=>$startDate, "finishDate" => $finishDate, "cost" => $cost, "travelTypeID" => $travelTypeID, "hotelID" => $hotelID, "capacity" => $capacity) );
}

$stmt->close(); // close statement


    header('Content-type: application/json');
    echo json_encode(array('tours'=>$tours));
