<?php

/*
error_reporting(0);
*/

$username = $_GET["username"];
$password = $_GET["password"];

/*
if ($username == "username")
{
    echo "Hej Arron";
}
*/

echo "Vi har mottagit:<br>";
echo "Username: ".$username."<br>";
echo "Password: ".$password."<br>";

?>