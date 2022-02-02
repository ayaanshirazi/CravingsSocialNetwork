<?php
//include 'include/library.php'; 
$page_title = 'Cravings.com'; 
?>
<!--------------------------------- HTML PAGE---------------------------------------->
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    //include '/includes/metadata.php';
    ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="styles/master.css" />
    <title><?php echo $page_title; ?> </title>
    <link rel="stylesheet" href="styles/getting_started.css" />
</head>
<body class="landingPage">
    <div>
        <a href=" " class="aboutUs">About Us</a>
    </div>
    <div class="landMainCon">
            <div class="lanPgCon1">
                <div>
                    <img src="img/cravings_logo1.png" alt="banner" id="landingLogo"/>
                    <h1 id="landingH1">Make sure every bite is your best one yet.</h1>
                </div>
                <div>
                        <p class="logOrReg">Join the community.</p>
                        <a href="registration.php" class="logRegButton">Register</a>
                </div>
                <div>
                        <p class="logOrReg">Already have an account? Log in here.</p>
                        <a href="login.php" class ="logRegButton">Login</a>
                </div>
            </div>


            <div class="lanPgCon2">
                <div class="lanCon1">
                    <div class="landingPromo">
                        <img src="img/laptop.png" alt="laptop" class="landingPng">
                        <p>All your recipe's in one place.</p>
                    </div>
                    <div class="landingPromo">
                        <img src="img/globe.png" alt="laptop" class="landingPng">
                        <p>Experience new tastes from around the world.</p>
                    </div>
                </div>
                <div class="lanCon1">
                    <div class="landingPromo">
                        <img src="img/art.png" alt="laptop" class="landingPng">
                        <p>Be creative through the lens of food.</p>
                    </div>
                    <div class="landingPromo">
                        <img src="img/chef.png" alt="laptop" class="landingPng">
                        <p>Share your culinary expertise.</p>
                    </div>
                </div>
                <div class="lanCon2">
                    <div class="landingPromo">
                        <img src="img/heart.png" alt="laptop" class="landingPng">
                        <p>Connect, through your love for food.</p>
                    </div>
                </div>
            </div>
    </div>
    <footer>
        Cravings&#169; 2021
    </footer>
</body>
</html>