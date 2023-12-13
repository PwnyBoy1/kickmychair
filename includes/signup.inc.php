<?php

if(isset($_POST["submit"])) {

    // Grabbing the data
    $name = $_POST["name"];
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdRepeat"];
    $email = $_POST["email"];

    //Instantiate SignupContr Class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $signup = new SignupContr($name, $uid, $pwd, $pwdRepeat, $email);

    //Running error handlers and user signup
    $signup->signupUser();

    //Going to back to front page
    header("location: ../index.php?error=none");
}
