<?php
session_start();
    include_once 'header.php';
?>
    <div class="login-page">
        <div class="login-container">
            <h2>Log in</h2>
            <form class="login-form" action="./includes/login.inc.php" method="post">
                <div class="input-container">
                    <input type="text" name="uid">
                    <label class="placeholder">Username or Email</label>
                </div>
                <div class="input-container">
                    <input type="password" name="pwd">
                    <label class="placeholder">Password</label>
                </div>
                <button type="submit" name="submit">Log In</button>
                
            </form>
        </div>
    </div>






</html>        