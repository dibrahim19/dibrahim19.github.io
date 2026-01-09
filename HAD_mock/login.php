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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto&">
    <style>
        body{
            background-color: #0F5E77;
            font-family: 'Roboto', sans-serif;
        }
        a{
            color: white;
            text-decoration: none;
        }
        p{
            color: white;
            margin: 0;
        }
        h1{
            color: white;
        }
        .header-div{
            display: flex;
            flex-direction: row;
            padding: 10px 20px;
            font-size: 20px;
            margin-top: -29px;
        }
        .left-section{
            flex: 1;
        }
        .right-section{
            flex: 1;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }

        .logo{
            height: 200px;
            width: auto;
        }

        .title-div{
            text-align: center;
            margin-top: -50px;
        }

        .form-outer-div{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }

        .form-div{
            background-color: #34A0A4;
            width: 400px;
            height: 280px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .email, .password{
            width: 300px;
            height: 20px;
            border-radius: 5px;
            border: none;
            padding: 5px;
            font-size: 16px;
        }
        
        form label,
        form input {
            display: block;
            margin-bottom: 10px; /* Adds spacing between elements */
        }

        .btn{
            width: 310px;
            height: 35px;
            border-radius: 5px;
            border: none;
            background-color: #000000;
            color: white;
            font-size: 18px;
            cursor: pointer;
        }
        .log-in-here{
            color: blue;
        }
        a{
            text-decoration: none;
        }
        .footer-rights{
            text-align: center;
            color: black;
            
        }
        .header-div{
            margin-top:20px;
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

    <section>
        <div class="title-div"> 
        <h1> Log In</h1>
        <p> Log in to your account below</p>
        </div>
        <div class="form-outer-div">
            <div class="form-div">
                <form action="login-logic.php" method="post">
                    <label for="emai"> Email</label>
                    <input type="email" name="email" class="email">
                    <label for="password"> password</label>
                    <input type="password" name="password" class="password">
                    <input type="submit" value="Login" class="btn">
                </form>
            </div>
        </div>

        <div class="title-div"> 
        <p>Don't have an account?</p>
        <a href="register.php">  <p class="log-in-here">Register here</p></a>
        </div>
    </section>

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