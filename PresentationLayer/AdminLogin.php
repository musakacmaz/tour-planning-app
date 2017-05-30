<?php
/**
 * Created by PhpStorm.
 * User: musa
 * Date: 11/05/2017
 * Time: 01:13
 */
require_once ("../LogicLayer/AdminManager.php");
$errorMessage = "";

if(isset($_POST["mail"]) && isset($_POST["password"]))
{
    $mail = trim($_POST["mail"]);
    $password = trim($_POST["password"]);

    setcookie('mail', $mail, time(), + (10), "/");

    $errorMessage = "";
    $result = AdminManager::adminLogin($mail, $password);

    if (!$result)
    {
        $errorMessage = "login failed!";
    }
    else
    {
        session_start();
        $_SESSION['activeUser'] = $result->getName();

        header("location: AdminPage.php");
    }


}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Admin Login Form</title>
    <link href="../resources/css/loginstyle.css" rel="stylesheet" type="text/css" media="all"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--web-fonts-->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css' />
    <!--web-fonts-->
</head>

<!---728x90--->
<!--header-->
<div class="header-w3l">
    <h1> Admin Login Form</h1>
</div>
<!--//header-->
<!---728x90--->
<!--main-->
<div class="main-content-agile">
    <div class="sub-main-w3">
        <form action="#" method="post">
            <input placeholder="E-mail" name="mail" class="user" type="text" required=""><br>
            <input  placeholder="Password" name="password" class="pass" type="password" required=""><br>
            <input type="submit" value="">
            <?php
                if(isset($errorMessage))
                {
                    echo "<br>" . "<span style='color: red;'>" . $errorMessage . "</span>";
                }
            ?>
        </form>
    </div>
</div>
<!--//main-->
<!---728x90--->
<!--footer-->
<div class="footer">
    <p>&copy; 2017 Travelo Admin Login Form. All rights reserved </a></p>
</div>
<!--//footer-->

</body>
</html>