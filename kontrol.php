<?php

/*
error_reporting(0);
*/

$saved_username = "Arron";
$saved_password = "1234";

$input_username = $_POST["username"];
$input_password = $_POST["password"];


if ($input_username == $saved_username && $input_password == $saved_password)
{
    echo "Hej Arron";
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