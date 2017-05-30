<?php
/**
 * Created by PhpStorm.
 * User: musa
 * Date: 23/05/2017
 * Time: 21:21
 */

// Get data
$conn = mysqli_connect("localhost", "root", "1292453");
mysqli_select_db($conn, 'Travelo');

$destination = isset($_GET['destination']) ? mysqli_real_escape_string($conn, $_GET['destination']) :  "";
if(!empty($destination))
{
    $qur = mysqli_query($conn, "select destination, startDate, finishDate, cost, travelTypeID, hotelID, capacity from `Tour` where destination='$destination'");
    $result = array();
    while($r = mysqli_fetch_array($qur))
    {
        extract($r);
        $result[] = array("destination" => $destination, "startDate" => $startDate, "finishDate" => $finishDate, "cost" => $cost, "travelTypeID" => $travelTypeID, "hotelID" => $hotelID, "capacity" => $capacity);
    }
    $json = array("status" => 1, "info" => $result);
}
else
{
    $json = array("status" => 0, "msg" => "Tour ID not defined");
}
@mysqli_close($conn);

/* Output header */
header('Content-type: application/json');
echo json_encode($json);