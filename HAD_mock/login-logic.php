<?php
session_start();
include 'connect.php';

?>
<?php
$email=$_POST['email'];
$password=$_POST['password'];

$sql  = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Login successful
    header("Location: user_dashboard.php");
    $_SESSION['logged_in'] = true;
    $_SESSION['customer_id'] = $row['customer_id'];
} else {
    // Login failed
    header("Location: login.php?error=invalid_credentials");
}

?>