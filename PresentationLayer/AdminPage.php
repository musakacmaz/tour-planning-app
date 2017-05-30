<?php
/**
 * Created by PhpStorm.
 * User: musa
 * Date: 11/05/2017
 * Time: 02:32
 */
    session_start();
    $activeUser = null;
    $mail = null;

    include_once ("../LogicLayer/TourManager.php");
    include_once ("../DataLayer/DB.php");

    if(isset($_SESSION['activeUser']))
    {
        $activeUser = $_SESSION['activeUser'];
    }

    if(isset($_COOKIE['mail']))
    {
        $mail = $_COOKIE['mail'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="../resources/css/bootstrap.min.css" rel="stylesheet">
    <script src="../resources/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">
    <div class="row">
        <h3>Travelo Admin Page</h3>
    </div>
    <div>
        <?php

        if(isset($activeUser))
        {
            echo "Welcome " . $activeUser;
            echo  "<a href='../index.php'> Click</a>" . " to go back to main page.";
        }
        else
        {
            echo "<a href='AdminLogin.php'>Please login to the system!</a>";
        }
        ?>
    </div>
    <div class="row">
        <p>
            <a href="CreateTour.php" class="btn btn-success">Create Tour</a>
        </p>
        <p>
            <a href="../WebService/UpdateCapacity.php" class="btn btn-success">Update Tour Capacities</a>
        </p>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Tour ID</th>
                <th>Destination</th>
                <th>Start Date</th>
                <th>Finish Date</th>
                <th>Cost</th>
                <th>Travel Type ID</th>
                <th>Hotel ID</th>
                <th>Capacity</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include "../DataLayer/Database.php";
            $pdo = Database::connect();
            $sql = 'SELECT * FROM Tour ORDER BY tourID DESC';
            foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td>'. $row['tourID'] . '</td>';
                echo '<td>'. $row['destination'] . '</td>';
                echo '<td>'. $row['startDate'] . '</td>';
                echo '<td>'. $row['finishDate'] . '</td>';
                echo '<td>'. $row['cost'] . '</td>';
                echo '<td>'. $row['travelTypeID'] . '</td>';
                echo '<td>'. $row['hotelID'] . '</td>';
                echo '<td>'. $row['capacity'] . '</td>';
                echo '<td width=250>';
                echo '<a class="btn btn-success" href="UpdateTour.php?tourID='.$row['tourID'].'">Update</a>';
                echo ' ';
                echo '<a class="btn btn-danger" href="DeleteTour.php?tourID='.$row['tourID'].'">Delete</a>';
                echo '</td>';
                echo '</tr>';
            }
            Database::disconnect();
            ?>
            </tbody>
        </table>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Hotel ID</th>
                <th>Name</th>
                <th>Country</th>
                <th>City</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $headers = array("Content-Type: application/json");

            $url = "https://travelo.000webhostapp.com/WebService/SendHotels.php";

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

            $hotel = $result_arr['hotels'];

            foreach((array)$result_arr['hotels'] as $hotel_arr)
            {
                echo '<tr>';
                echo '<td>'. $hotel_arr['hotelID'] . '</td>';
                echo '<td>'. $hotel_arr['name'] . '</td>';
                echo '<td>'. $hotel_arr['country'] . '</td>';
                echo '<td>'. $hotel_arr['city'] . '</td>';
                echo '</tr>';

            }

            ?>
            </tbody>
        </table>
    </div>
</div> <!-- /container -->
</body>
</html>
