<?php
include('../dbconnect.php');

if (isset($_POST['Types'])) {
    $user_id = $_POST['user_id'];
    $productType = $_POST['Types'];
    $Name = $_POST['Name'];
    $unit = $_POST['unit'];
    $sellingPrice = $_POST['sellingPrice'];
    $Description = $_POST['Description'];

    $sql = "INSERT INTO `items` (`type`,  `user_id`, `name`, `unit`, `sellingPrice`, `description`) VALUES ('$productType', $user_id, '$Name', '$unit', '$sellingPrice', '$Description');";

    $form = mysqli_query($conn, $sql);
    // if ($form) {
    //     echo " Update";
    // } else {
    //     echo "Customer Not Update";
    // }
}

header("Location: ../../items/items.php");
