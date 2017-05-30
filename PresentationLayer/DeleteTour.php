<?php
/**
 * Created by PhpStorm.
 * User: musa
 * Date: 11/05/2017
 * Time: 05:24
 */
    require_once ("../LogicLayer/TourManager.php");
    $tourID = 0;

    if ( !empty($_GET['tourID'])) {
        $tourID = $_REQUEST['tourID'];
    }

    if ( !empty($_POST)) {
        // keep track post values
        $tourID = $_POST['tourID'];

        TourManager::deleteTourById($tourID);
        header("Location: AdminPage.php");

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
            <h3>Delete a Tour</h3>
        </div>

        <form class="form-horizontal" action="DeleteTour.php" method="post">
            <input type="hidden" name="tourID" value="<?php echo $tourID;?>"/>
            <p class="alert alert-error">Are you sure to delete ?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-danger">Yes</button>
                <a class="btn" href="AdminPage.php">No</a>
            </div>
        </form>
    </div>

</div> <!-- /container -->
</body>
</html>