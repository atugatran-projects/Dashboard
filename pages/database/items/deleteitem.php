<?php
include_once("../dbconnect.php");
// Customerdeletes
if (isset($_GET['itemsdeletes'])) {
    $sno = $_GET['itemsdeletes'];
    $deleteSql = "DELETE FROM `items` WHERE `itemId` = $sno";
    $deleteServer = mysqli_query($conn, $deleteSql);
    header("Location: ../../items/allitem.php");
}

// MulCustomerdeletes
if (isset($_POST['mDeleteitem'])) {
    if (isset($_POST['mdeleteIditem']) && !empty($_POST['mdeleteIditem']) && is_array($_POST['mdeleteIditem'])) {
        foreach ($_POST['mdeleteIditem'] as $key) {
            $MdeleteSql = "DELETE FROM `items` WHERE `itemId` = $key";
            $deleteServer = mysqli_query($conn, $MdeleteSql);

            // if ($deleteServer) {
            //     echo "Delete";
            // } else {
            //     echo "Customer Not Delete";
            // }
        }
    }
    header("Location: ../../items/allitem.php");
}
?>