<?php
include "connect.php";
?>

<?php
$email=$_POST['email'];
$password=$_POST['password'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];

$sql = "INSERT INTO users (fname, lname, email, password) VALUES ('". $fname."','". $lname."','". $email."','".$password."')";
$result=$conn->query($sql);

if($result){
    "Added to db successfully";
    header("Location: register.php");
}
else{
    "Not added";
}
?>