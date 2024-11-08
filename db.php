<?php
/*
This file creates the connection to the database by creating
a PDO object

This connection is used in "crud.php" file
*/

function prepareDB()
{
    $servername="db";
    $user="mariadb";
    $pass="mariadb";
    $dbname="mariadb";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
    
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    return null;
}


?>