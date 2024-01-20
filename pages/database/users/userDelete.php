<?php
include_once("../dbconnect.php");
// Customerdeletes
if (isset($_GET['userDelete'])) {
    $sno = $_GET['userDelete'];
    $deleteSql = "DELETE FROM `users` WHERE `sno` = $sno";
    $deleteServer = mysqli_query($conn, $deleteSql);
    if ($deleteServer) {
        echo "Delete";
    } else {
        echo "User Not Delete";
    }
    header("Location: ../../users/user.php");
}