<?php

/**
 * Created by PhpStorm.
 * User: musa
 * Date: 07/05/2017
 * Time: 14:01
 */

    require_once (__DIR__."/../DataLayer/DB.php");
    require_once("Admin.php");

class AdminManager
{
    public static function getAllAdmins()
    {
        $db = new DB();
        $success = $db->getDataTable("select * from Admin");
        $allAdmins = array();

        while($row = $success->fetch_assoc())
        {
            $adminObj = new Admin($row["userID"], $row["name"], $row["surname"], $row["mail"], $row["password"], $row["phone"]);
            array_push($allAdmins, $adminObj);
        }
        return $allAdmins;
    }


    public static function insertNewAdmin($name, $surname, $mail, $password, $phone)
    {
        $db = new DB();
        $success = $db->executeQuery("INSERT INTO Admin(userID, name, surname, mail, password, phone) VALUES (NULL, '$name', '$surname', '$mail', '$password', '$phone')");

        return $success;

    }

    public static function getAdminById($adminID)
    {
        $db = new DB();
        $success = $db->getDataTable("SELECT * FROM Admin WHERE adminID ='$adminID'");
        $newAdmin = null;
        if($success->num_rows > 0)
        {
            $row = $success->fetch_assoc();
            $newAdmin = new Admin($row["adminID"], $row["name"], $row["surname"], $row["mail"], $row["password"], $row["phone"]);
        }
        return $newAdmin;

    }

    public static function updateAdmin(Admin $updateObj)
    {
        $db = new DB();
        $db->executeQuery("UPDATE Admin SET name = $updateObj->getName(), surname = $updateObj->getSurname(), mail = $updateObj->getMail(), password = $updateObj->getPassword(), phone = $updateObj->getPhone()");

    }

    public static function adminLogin($mail, $password)
    {
        $db = new DB();
        $result = $db->getDataTable("select * from Admin WHERE mail = '$mail' AND password = '$password'");
        $userObj = null;
        if($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            $userObj = new Admin($row["userID"], $row["name"], $row["surname"], $row["mail"], $row["password"], $row["phone"]);

        }

        return $userObj;
    }

}