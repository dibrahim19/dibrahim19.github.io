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

    <style>
        .home-div{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin-bottom: 40px;
        }
        .title{
            font-size: 40px;
            font-weight: 600;
        }
        .text{
            font-size: 30px;
            width: 600px;
            margin-top: 80px;
        }
        .btn{
            background-color: white;
            color: black;
            width: 70px;
            height: 50px;
            border: none;
            border-radius: 30px;
            margin-top: 30px;
        }

        .testimonials-div{
            background-color: #34A0A4;
            width: 440px;
            border-radius: 30px;
            height: 100px;
        }

        .testimonial-text{
            text-align: center;
            
        }

        .outer-testimonials-div{
            display: flex;
            justify-content: center;
            gap: 17px;
        }
        h1{
            color: white;
            text-align: center;
        }
        .footer-rights{
            text-align: center;
            color: black;
        }
        a{
            color: white;
            text-decoration: none;
        }
        .outer-div{
            display: flex;
            flex-direction: column;
            gap: 50px;
            justify-content: center;
            align-items: center;
            height: 400px;
            margin-top: 100px;
        }
        .box-div{
            background-color: #34A0A4;
            width: 600px;
            height: 100px;
            border-radius: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            color: white;
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


   <div class="outer-div">
    <div class="box-div"> 
       <a href="location_advice.php"> <p>Personalised Health Advice based on location</p></a>
    </div>
    <div class="box-div"> 
       <a href="health_tracker.php"><p>Personal Health Tracking Tool</p></a> 
    </div>
    <div class="box-div"> 
       <a href="logout.php"><p>Log out</p></a> 
    </div>
   </div>

            

    
</body>
</html>