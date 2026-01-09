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
    <link rel="stylesheet" href="styles/general.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto&">
    <link rel="stylesheet" href="styles/about.css">
    <link rel="stylesheet" href="styles/contact.css">
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
            color: white;}
        a{
            text-decoration: none;
        }
        .form-outer-div{
            display:flex;
            flex-direction:row;
            justify-content:space-evenly;
            
        }
        
        .advice-div{
            border:solid;
            border-color:black;
            border-radius:1px;
            color:white;
            width:500px;
            height:200px;
            background-color: #34A0A4;
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
                <p>Dashboard</p>
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
        <div class="form-outer-div">
            <div class="form-div">
                <form action="" method="post">
                    <label for="weight"> Weight(KG)</label>
                    <input type="weight" name="weight" class="password">
                    <label for="height"> Height (cm)</label>
                    <input type="height" name="height" class="password">
                    <label for="emai"> Activity Levels</label>
                    <input type="email" name="email" class="email">
                    <label for="message"> age</label>
                    <input type="text" name="message" class="password">
                    <label for="message"> Gender</label>
                    <input type="text" name="message" class="password">
                    <input type="submit" value="Submit" name="SubmitButton" class="btn">
                </form>
                <?php
                $bmi = "";
                if(isset($_POST['SubmitButton'])){
                $user_weight = $_POST['weight'];
                $user_height = $_POST['height'];
                $bmi = $user_weight / pow($user_height / 100, 2);
                $bmiRounded = round($bmi, 1);
           
        ?>
            </div>
            <div class="advice-div">
                <h1> Advice </h1>
                <?php
               
             if ($bmi < 18.5) {
                $category = "Underweight";
                $advice = <<<TXT
            • Eat regular, balanced meals with protein and healthy fats.
            • Add nutrient‑dense snacks (nuts, yogurt, smoothies).
            • Consider speaking with a GP/dietitian to personalise a plan.
            TXT;

            } elseif ($bmi < 25) {
                $category = "Normal weight";
                $advice = <<<TXT
            • Maintain with whole foods, hydration, and consistent activity.
            • Mix cardio + strength; aim for good sleep (7–9 hours).
            • Keep an eye on habits and do annual health check‑ins.
            TXT;

            } elseif ($bmi < 30) {
                $category = "Overweight";
                $advice = <<<TXT
            • Create small, sustainable changes (portion control, more veg/protein).
            • Be active most days; add strength training 2–3×/week.
            • Limit sugary drinks; consider guidance from a GP/dietitian.
            TXT;

            } else {
                $category = "Obese";
                $advice = <<<TXT
            • Focus on gradual progress with planned, nutrient‑dense meals.
            • Start low‑impact activity and add strength training safely.
            • Talk to your GP about supportive programmes and options.
            TXT;
            }

            // Output
            echo "BMI: {$bmiRounded}<br>";
            echo "Category: {$category}<br><br>";
            echo nl2br(htmlspecialchars($advice));

            }

                ?>
            </div>
        </div>
        
    </section>

   