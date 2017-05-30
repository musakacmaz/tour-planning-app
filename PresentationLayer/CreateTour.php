<?php
/**
 * Created by PhpStorm.
 * User: musa
 * Date: 11/05/2017
 * Time: 04:30
 */
    require_once ("../LogicLayer/TourManager.php");

if ( !empty($_POST)) {
    // keep track validation errors
    $destinationError = null;
    $startDateError = null;
    $finishDateError = null;
    $costError = null;
    $travelTypeIDError = null;
    $hotelIDError = null;
    $capacityError = null;

    // keep track post values
    $destination = $_POST['destination'];
    $startDate = $_POST['startdate'];
    $finishDate = $_POST['finishdate'];
    $cost = $_POST['cost'];
    $travelTypeID = $_POST['traveltypeID'];
    $hotelID = $_POST['hotelID'];
    $capacity = $_POST['capacity'];
    $status = $_POST['status'];

    // validate input
    $valid = true;
    if (empty($destination))
    {
        $destinationError = 'Please enter destination';
        $valid = false;
    }

    if (empty($startDate))
    {
        $startDateError = 'Please enter Start Date';
        $valid = false;
    }

    if (empty($finishDate))
    {
        $finishDateError = 'Please enter Finish Date';
        $valid = false;
    }
    if (empty($cost))
    {
        $costError = 'Please enter cost';
        $valid = false;
    }
    if (empty($travelTypeID))
    {
        $travelTypeIDError = 'Please enter travel type ID';
        $valid = false;
    }
    if (empty($hotelID))
    {
        $hotelIDError = 'Please enter hotel ID';
        $valid = false;
    }
    if (empty($capacity))
    {
        $capacityError = 'Please enter capacity';
        $valid = false;
    }

    // insert data
    if ($valid)
    {


            // Insert data into data base
            $insert = TourManager::insertNewTour($destination, $startDate, $finishDate, $cost, $travelTypeID, $hotelID, $capacity, $status);


        header("Location: AdminPage.php");
    }
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

    <div class="span10 offset1">
        <div class="row">
            <h3>Create a Tour</h3>
        </div>

        <form class="form-horizontal" action="CreateTour.php" method="post">

            <div class="control-group <?php echo !empty($destinationError)?'error':'';?>">
                <label class="control-label">Destination</label>
                <div class="controls">
                    <input name="destination" type="text"  placeholder="Destination" value="<?php echo !empty($destination)?$destination:'';?>">
                    <?php if (!empty($destinationError)): ?>
                        <span class="help-inline"><?php echo $destinationError;?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="control-group <?php echo !empty($startDateError)?'error':'';?>">
                <label class="control-label">Start Date</label>
                <div class="controls">
                    <input name="startdate" type="text" placeholder="Start Date" value="<?php echo !empty($startDate)?$startDate:'';?>">
                    <?php if (!empty($startDateError)): ?>
                        <span class="help-inline"><?php echo $startDateError;?></span>
                    <?php endif;?>
                </div>
            </div>

            <div class="control-group <?php echo !empty($finishDateError)?'error':'';?>">
                <label class="control-label">Finish Date</label>
                <div class="controls">
                    <input name="finishdate" type="text" placeholder="Finish Date" value="<?php echo !empty($finishDate)?$finishDate:'';?>">
                    <?php if (!empty($startDateError)): ?>
                        <span class="help-inline"><?php echo $finishDateError;?></span>
                    <?php endif;?>
                </div>
            </div>

            <div class="control-group <?php echo !empty($costError)?'error':'';?>">
                <label class="control-label">Cost</label>
                <div class="controls">
                    <input name="cost" type="text" placeholder="Cost" value="<?php echo !empty($cost)?$cost:'';?>">
                    <?php if (!empty($costError)): ?>
                        <span class="help-inline"><?php echo $costError;?></span>
                    <?php endif;?>
                </div>
            </div>

            <div class="control-group <?php echo !empty($travelTypeIDError)?'error':'';?>">
                <label class="control-label">TravelTypeID</label>
                <div class="controls">
                    <input name="traveltypeID" type="text" placeholder="TravelTypeID" value="<?php echo !empty($travelTypeID)?$travelTypeID:'';?>">
                    <?php if (!empty($travelTypeIDError)): ?>
                        <span class="help-inline"><?php echo $travelTypeIDError;?></span>
                    <?php endif;?>
                </div>
            </div>

            <div class="control-group <?php echo !empty($hotelIDError)?'error':'';?>">
                <label class="control-label">Hotel ID</label>
                <div class="controls">
                    <input name="hotelID" type="text" placeholder="HotelID" value="<?php echo !empty($hotelID)?$hotelID:'';?>">
                    <?php if (!empty($hotelIDError)): ?>
                        <span class="help-inline"><?php echo $hotelIDError;?></span>
                    <?php endif;?>
                </div>
            </div>

            <div class="control-group <?php echo !empty($capacityError)?'error':'';?>">
                <label class="control-label">Capacity</label>
                <div class="controls">
                    <input name="capacity" type="text" placeholder="Capacity" value="<?php echo !empty($capacity)?$capacity:'';?>">
                    <?php if (!empty($capacityError)): ?>
                        <span class="help-inline"><?php echo $capacityError;?></span>
                    <?php endif;?>
                </div>
            </div>



            <div class="form-actions">
                <button type="submit" class="btn btn-success">Create</button>
                <a class="btn" href="AdminPage.php">Back</a>
            </div>
        </form>
    </div>

</div> <!-- /container -->
</body>
</html>
