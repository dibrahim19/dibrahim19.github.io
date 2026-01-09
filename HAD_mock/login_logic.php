<?php
$host = "localhost";
$username = "root";
$pass = "";
$db = "had_mock";

// Connect to database
$conn = new mysqli($host, $username, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email=$_POST['email'];
$password=$_POST['password'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];

$sql = "SELECT id FROM users WHERE email = '$email' AND password = '$password'";
$result=$conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();    

    
 

}
$conn->close();



?>