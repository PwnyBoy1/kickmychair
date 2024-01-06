<?php 


$serverName = "localhost";

$dBUsername = "root";

$dBPassword = "root1";

$dBName = "loginsystem";

$conn = new mysqli($serverName, $dBUsername, $dBPassword, $dBName);

    if ($conn->connect_error) {
        die ("Connection failed: " . $conn->connect_error);

    }

