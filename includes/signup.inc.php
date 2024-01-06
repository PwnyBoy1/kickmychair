<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset($_POST["submit"])) {

    // Grabbing the data
    $name = $_POST["name"];
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdRepeat"];
    $email = $_POST["email"];
    $localCounter = $_POST["localCounter"];
    //Instantiate SignupContr Class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $signup = new SignupContr($name, $uid, $pwd, $pwdRepeat, $email, $localCounter);

    //Running error handlers and user signup
    $signup->signupUser();
    $error = "Sign up was successful. Please Log in";
    header("location: ../login.php?error=$error");
    //Going to back to front page
    // header("location: ../index.php?error=none");
    
}
