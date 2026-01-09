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
    <link rel="stylesheet" href="styles/advice.css">
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

    <section>
    <div class="title-div">
    <h1 class="first-title">Advice</h1>
    <p>On how to deal with health matters affected by weather</p>
    </div>
    <div class="outer-div">
        <div class="advice-div">
            <div>
            <h1 class="title"> Coping with extreme heat</h1>
            <p class="advice"> 
                Stay hydrated: Drink plenty of water, even if you don’t feel thirsty. Avoid alcohol and caffeine.
                Keep cool indoors: Use fans, close curtains during the day, and open windows at night.
                Dress appropriately: Wear light-colored, loose-fitting clothing and a wide-brimmed hat outdoors.
                Check on vulnerable people: Older adults, children, and those with chronic conditions are most at risk.
                Avoid strenuous activity: Especially during the hottest parts of the day (11am–3pm).
            </p></div>
            <img class="image" src="images/hot-weather.png" alt="">
        </div>

        <div class="advice-div">
            <img class="image" src="images/cold weather image 1 (1).png" alt="">
            <div>
            <h1 class="title"> Staying safe in cold weather</h1>
            <p class="advice"> 
                Layer up: Wear multiple layers of clothing to trap heat. Keep extremities covered.
                Heat your home safely: Aim for at least 18°C in living areas. Use blankets and hot water bottles if needed.
                Eat warm meals: Regular hot food and drinks help maintain body temperature.
                Watch for signs of hypothermia: Shivering, confusion, and slurred speech require urgent medical attention.
            </p></div>
        </div>

        <div class="advice-div">
            <div>
            <h1 class="title"> Flooding and Damp Conditions</h1>
            <p class="advice"> 
                Avoid contact with floodwater: It may contain sewage or chemicals. Wear waterproof boots and gloves if necessary.
Dry out your home: Use dehumidifiers and ventilation to prevent mold growth.
Clean surfaces: Disinfect areas affected by floodwater to reduce infection risk.
Seek help: If your home is damp or moldy and affecting your health, contact your local council or GP.
            </p></div>
            <img class="image" src="images/flood image 1 (1).png" alt="">
        </div>
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