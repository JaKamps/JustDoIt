<?php

$serverName = "localhost";
$dBUserName = "root";
$dBPassword = "";
$dBName = "mydb";

$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}