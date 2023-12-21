<?php
    session_start();
    include_once 'header.php';
    include_once './dbh.inc.php';


    $scoresResultsQuery = "SELECT users_uid, users_score FROM users ORDER BY users_score";

    $startPage = 0;

    $rowsPerPage = 10;





?>

