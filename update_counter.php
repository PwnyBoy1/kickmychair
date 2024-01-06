<?php
include_once './includes/dbh.inc.php';
include_once './classes/dbh.classes.php';

if (isset($_POST['users_score'])){
    $counterValue = $_POST['users_score'];

    session_start();
    $user = $_SESSION['userid']; 
    $updateSql = "UPDATE users SET users_score = '$counterValue' WHERE users_id = '$user'";
    $clickTime = microtime(true);
    $formattedClickTime = date('Y-m-d H:i:s', (int) $clickTime) . '.' . sprintf('%03d', ($clickTime - floor($clickTime)) * 1000);
    $clickSql = "INSERT INTO click_data (users_id, click_time) VALUES ('$user', '$formattedClickTime')";

    $limitQuery = "DELETE cd.*
    FROM click_data cd
    LEFT JOIN (
        SELECT click_id
        FROM click_data
        WHERE users_id = '$user'
        ORDER BY click_time DESC
        LIMIT 100, 999999
    ) AS subquery ON cd.click_id = subquery.click_id
    WHERE subquery.click_id IS NOT NULL
      AND cd.users_id = '$user'";

// Execute the queries
if ($conn->query($clickSql) === TRUE && $conn->query($updateSql) === TRUE && $conn->query($limitQuery) === TRUE) {
echo json_encode(['success' => true, 'message' => 'Counter value and click data updated successfully']);
} else {
echo json_encode(['success' => false, 'message' => 'Error updating data: ' . $conn->error]);
}
} else {
echo "Invalid request!";
}
?>