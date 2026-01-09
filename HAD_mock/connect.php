<?php
// make a connection to the database
$host = "localhost";
$username = "root";
$pass = "";
$db = "had_mock";

$conn = mysqli_connect($host,$username,$pass,$db);

if (!$conn) {
    die("Failed to connect");
} else {
    echo "Connected to DB";
}

?>