<?php

/*
error_reporting(0);
*/

$saved_username = "kerstin";
$saved_password = "kissemissen";

$input_username = $_POST["username"];
$input_password = $_POST["password"];


if ($input_username == $saved_username && $input_password == $saved_password)
{
    echo "Hej Kerstin";
}

else
{
    echo "Login Failed";
}
/*
echo "Vi har mottagit:<br>";
echo "Username: ".$username."<br>";
echo "Password: ".$password."<br>";
*/
?>