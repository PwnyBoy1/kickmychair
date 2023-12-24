<?php
    session_start();
    include_once 'header.php';
    include_once './includes/dbh.inc.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $user = $_SESSION['userid']; 
    
    
    $startPage = 0; 
    $rowsPerPage = 10; 
    $currentPage = 1;

    if (isset($_GET["page"])){
        $currentPage = $_GET["page"];
        $startPage = ($currentPage - 1) * $rowsPerPage;
    }
    $sql = "SELECT users_uid, users_score FROM users ORDER BY users_score DESC LIMIT $startPage, $rowsPerPage";
    $scoresResults = mysqli_query($conn, $sql);
    if (!$scoresResults) {
        die('Error: ' . mysqli_error($conn));
    }
    $resultCheck = mysqli_num_rows($scoresResults);

    $totalScores = "SELECT COUNT(users_uid) as total FROM users";
    $totalResult = mysqli_query($conn, $totalScores);
    
    if (!$totalResult) {
        die('Error: ' . mysqli_error($conn));
    }
    $row = $totalResult->fetch_assoc();
    $totalPages = ceil($row["total"] / $rowsPerPage)


?>
<div class="leaderboard-body"> <div class="leaderboard-container"> <?php
        echo "<h2 class='table-header'>Leaderboard</h2>";
        echo "<table class='content-table'>";
        echo "<tr><th>Rank</th><th>Username</th><th>Score</th></tr>";
        
        $rank = $startPage + 1; // Start rank based on pagination offset
        
        if ($resultCheck > 0){
            while ($row = mysqli_fetch_assoc($scoresResults)) {
            echo "<tr><td>{$rank}</td><td>{$row['users_uid']}</td><td>{$row['users_score']}</td></tr>";
            $rank++;
        }
    } else{
        echo "No results found.";
    }
        echo "</table>";
        
    echo "<div class='pagination'>";
    if ($currentPage > 1){
        echo "<a href='leaderboard.php?page=" . ($currentPage - 1) . "'>Prev-</a> ";
    }
    for ($i = 1; $i <= $totalPages; $i++){
        echo "<a href='leaderboard.php?page=$i'>$i</a> ";
    }
    if ($currentPage < $totalPages) {
        echo "<a href='leaderboard.php?page=" . ($currentPage + 1) . "'>-Next</a>";
    }

    echo "</div>";
    ?>

    </div>
</div>