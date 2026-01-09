<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
$isloggedin = !empty($_SESSION['logged_in']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/general.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto&">
    <link rel="stylesheet" href="styles/about.css">
    <link rel="stylesheet" href="styles/contact.css">
    <style>
        .footer-rights{
            text-align: center;
            color: black;
        }
         a{
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <section class="header">
        <div class="header-div">
            <div class="left-section">
                <img class="logo" src="logo.png" alt="">
            </div>
            <div class="right-section">
                <a href="home.php"><p>Home</p></a> 
                <a href="advice.php"><p>Advice</p></a> 
                <a href="contact.php"><p>Contact us</p></a>
                <a href="dashboard.php"><p>Dashboard</p></a> 
                    <?php
                    if ($isloggedin): ?>
                    <a href="user_dashboard.php">User hub</a>
                    <a href="logout.php">logout</a>
                    <?php else: ?>
                    <a href="register.php"><p>Log in/Register</p></a>
                    <?php endif; ?>
          
            </div>
        </div>
    </section>

    <div class="title-div">
        <h1> Contact Us</h1>
        <p>Reach out to us!</p>
    </div>

    <div class="form-outer-div">
            <div class="form-div">
                <form action="contact-logic.php" method="post">
                    <label for="fname"> First Name</label>
                    <input type="text" name="fname" class="password">
                    <label for="lname"> Last Name</label>
                    <input type="text" name="lname" class="password">
                    <label for="emai"> Email</label>
                    <input type="email" name="email" class="email">
                    <label for="message"> Message</label>
                    <input type="text" name="message" class="password">
                    <input type="submit" value="Send" class="btn">
                </form>
            </div>
        </div>

    <section class="header">
        <div class="header-div">
            <div class="left-section">
                <img class="logo" src="logo.png" alt="">
            </div>
            <div class="right-section">
                <p>Home</p>
                <p>Advice</p>
                <p>Contact us</p>
                <p>Dashboard</p>
                <p>Log in/Register</p>
            </div>
        </div>
        <p class="footer-rights"> 2024 Your Website. All rights reserved.             Privacy policy                   Terms of service</p>
    </section>
</body>
</html>