<?php
    session_start();
    include('../config/dbconn.php');

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('location:user_login_page.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Limitless.Kshop</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'>
    <!--     Fonts and icons     --> 
    <link href="../assets/css/now-ui-kit.css" rel="stylesheet"> 
    <!--     inserted     --> 
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 
</head>

<style>
    body {
        background-image: url(../assets/img/bg8.jpg); /* The image used for background*/
        background-repeat: no-repeat; /* Do not repeat the image */
        background-position: center; /* Center the image */
        background-size: cover; /* Resize the background image to cover the entire container */
    }

    .container {
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }

    .image-container {
        text-align: center;
        width: 100%;
    }

    .links-container {
        display: flex;
        flex-direction: column;
        jusify-content: center;
        align-items: center;
    }

    .link {
        min-width: 50% !important;
    }

    @media (min-width: 1200px) .container {
        max-width: 1140px;
    }

    @media (min-width: 992px) .container {
    max-width: 960px;
    }

    @media (min-width: 768px) {
        .container {
            max-width: 720px;
        }

        .link {
            width: 100%;
        }
    }

    @media (min-width: 576px) {
        .container {
            max-width: 540px;
        }
    }

    .w3-purple, .w3-hover-purple:hover {
        color: #fff!important;
        background-color: rgba(95,158,160, 0.6) !important;
    }
</style>

<body class="w3-white">

    <div class="container">
        <div class="image-container">
        
            <br><br>
      
            <div class="w3-text-white">
                <p class="w3-text-white w3-large">Users <span class="w3-tag w3-large w3-round w3-black w3-text-white"><strong>Go TO</strong></span> link site!</p><br>
            </div>

            <div class="links-container">
                <a href="user_profile.php" class="w3-button w3-large w3-round w3-purple w3-border link">User Profile</a>
                                        
                <br>
                    
                <a href="user_view_order_history.php" class="w3-button w3-large w3-round w3-purple w3-border link">View order history</a>
                    
                <br>
                    
                <a href="https://www.instagram.com/limitless.kshop/" target="_blank" class="w3-button w3-large w3-round w3-purple w3-border link">View feedback</a>

                <br>
                    
                <a href="user_view_add_feedback.php" class="w3-button w3-large w3-round w3-purple w3-border link">Add feedback</a>
                
                <br>
                    
                <a href="user_index.php" style="text-decoration:none;" class="btn btn-sucess btn-round">Back to homepage</a>
                 
                <br><br>
            </div>
        </div>
    </div>
</body>  
</html>
