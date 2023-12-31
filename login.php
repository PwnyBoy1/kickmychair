<?php
session_start();
    include_once 'header.php';
?>
    <div class="login-body">
        <div class="login-container">
        <?php
        if (isset($_GET['error'])) {
            $errorMessage = $_GET['error'];
            echo "<p style='color: red;'>$errorMessage</p>";
        }
        ?>
            <h2>Log in</h2>
            <form class="login-form" action="./includes/login.inc.php" method="post">
                
                <div class="input-container">
                    <input type="text" name="uid" required>
                    <label class="placeholder">Username</label>
                </div>
                
                <div class="input-container">
                    <input type="password" name="pwd" required>
                    <label class="placeholder">Password</label>
                </div>
               
                <button type="submit" name="submit">Log In</button>
                
            </form>
        </div>
    </div>






</html>        