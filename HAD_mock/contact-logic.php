<?php
include 'connect.php';
?>

<?php
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    echo $fname;
    echo $lname;   
    echo $email;
    echo $message;

$sql = "INSERT INTO contact(fname, lname, email, message) VALUES ('". $fname."', '". $lname."', '". $email."', '". $message."')";
$result=$conn->query($sql);

if($result){
    header("Location: contact-confirm.php");
}
else{
    echo "Message not sent";
}
?>