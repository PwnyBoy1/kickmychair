<?php
    session_start();
    include_once 'header.php';
    include_once './includes/dbh.inc.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
?>
<?php
    $sql = "SELECT users_uid, users_score FROM users ORDER BY users_score";
    $scoresResults = mysqli_query($conn, $sql);
    if (!$scoresResults) {
        die('Error: ' . mysqli_error($conn));
    }
    $resultCheck = mysqli_num_rows($scoresResults);
    
    if ($resultCheck > 0) {
        echo '<div>';
        while ($row = mysqli_fetch_assoc($scoresResults)){
            echo $row['users_uid'] . ':' . $row['users_score'] . "<br>";
        }
        echo '</div>';
    } else {
        echo "No results found.";
    };

    $startPage = 0;
    
    $rowsPerPage = 10;

    $rowsPerPage = 10;
    

?>
