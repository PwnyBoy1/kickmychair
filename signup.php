<?php
session_start();
    include_once 'header.php';
?>
<head>
        
    <link rel="stylesheet" href="Style.css" type="text/css">
</head>

    <div class="form-page">

        <div class="form-container" >
            <h2>Sign Up</h2>
            <form class="signup-form" action="includes/signup.inc.php" method="post">
                <input type="text" name="name" placeholder="Full name...">
                <input type="text" name="email" placeholder="Email...">
                <input type="text" name="uid" placeholder="Username...">
                <input type="password" name="pwd" placeholder="Password...">
                <input type="password" name="pwdRepeat" placeholder="Repeat Password...">
                <button type="Submit" name="submit">Sign Up</button>
                
            </form>
        </div>
     </div>







</html>