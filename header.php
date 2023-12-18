<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Kick My Chair</title> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Style.css" type="text/css">
        <link rel="Tab Icon" type="x-icon" href="KickMyC\button.png">
        <style>

        </style>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        </head>
        <body>
            <nav class="nav">
                <div>
                    <a href="https://kickmychair.com/"><img src="KickMyC\header.png" id="thumbnail" alt="Kick My Chair Logo"></a>
                </div>
                <ul class="links">
                <?php
                if(isset($_SESSION["userid"]))
                {
                ?>
                    <li><a href="./index.php">Home</a></li>  
                    <li><a href="./aboutus.php">About us</a></li>  
                    <li><a href="./leaderboard.php">Leaderboard</a></li> 
                    <li><a href="./shop.php">Shop</a></li>
                    <li><a href="./includes/logout.inc.php">Log out</a></li>
                <?php
                }
                else
                {
                ?>
                <ul class="links">
                    <li><a href="./index.php">Home</a></li>  
                    <li><a href="./aboutus.php">About us</a></li>  
                    <li><a href="./leaderboard.php">Leaderboard</a></li>
                    <li><a href="./shop.php">Shop</a></li>
                    <li><a href="./signup.php">Sign Up</a></li>
                    <li><a href="./login.php">Log in</a></li>
                <?php
                }
                ?>
                </ul>

            </nav>
            