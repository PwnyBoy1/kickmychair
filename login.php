<?php
session_start();
    include_once 'header.php';
?>
    <div class="login-page">
        <div class="login-container">
            <h2>Log in</h2>
            <form class="login-form" action="./includes/login.inc.php" method="post">
                <input type="text" name="uid" placeholder="Username/Email...">
                <input type="password" name="pwd" placeholder="Password...">
                <button type="submit" name="submit">Log In</button>
                
            </form>
        </div>
    </div>






</html>        