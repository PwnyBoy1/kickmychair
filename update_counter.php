<?php
include_once './includes/dbh.inc.php';
include_once './classes/dbh.classes.php';

if (isset($_POST['users_score'])){
    $counterValue = $_POST['users_score'];

    session_start();
    $user = $_SESSION['userid']; 
    $sql = "UPDATE users SET users_score = '$counterValue' WHERE users_id = '$user'";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'Counter value updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error updating counter value: ' . $conn->error]);
    }
} else {
    echo "Invalid request!";

}
?>
