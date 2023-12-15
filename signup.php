<?php
session_start();
    include_once 'header.php';
?>
<head>
        
    <link rel="stylesheet" href="Style.css" type="text/css">
</head>
<div class="signup-body">

        <div class="form-container" style="border: 1px solid black;" >
            <h2>Sign Up</h2>
            <form class="signup-form" action="includes/signup.inc.php" method="post">
                <div class="input-container">
                    <input type="text" name="name" id="name" required>
                    <label class="placeholder">Full Name</label>
                </div>

                <div class="input-container">
                    <input type="text" name="email" id="email" required>
                    <label class="placeholder">Email</label>
                </div>

                <div class="input-container">
                    <input type="text" name="uid" id="uid" required>
                    <label class="placeholder">Username</label>
                </div>

                <div class="input-container">
                    <input type="password" name="pwd" id="pwd" required>
                    <label class="placeholder">Password</label>
                </div>

                <div class="input-container">
                    <input type="password" name="pwdRepeat" id="pwdRepeat" required>
                    <label class="placeholder">Repeat Password</label>
                </div>

                <button type="submit" name="submit">Sign Up</button>
                </form>
        </div>


</div>



</html>