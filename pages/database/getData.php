<?php
include 'dbconnect.php';
session_start();

if (!isset($_POST['searchTerm'])) {
    $ele = $_POST['Element'];
    $userid = $_SESSION['userID'];
    // echo '<script>console.log('.$ele.')</script>';
    $fetchData = mysqli_query($conn, "select * from items WHERE `user_id`='$userid'");

    $data = array();
    while ($row = mysqli_fetch_array($fetchData)) {
        $data[] = array("id" => $row['itemId'], "text" => $row['name'], "ele" => '#'.$ele);
    }
    echo json_encode($data);
}