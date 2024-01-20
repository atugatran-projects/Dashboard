<?php
include("../dbconnect.php");
$sno = $_GET['editItem'];
if (isset($_POST['Type'])) {
    $productType = $_POST['Type'];
    $Name = $_POST['Name'];
    $unit = $_POST['unit'];
    $sellingPrice = $_POST['sellingPrice'];
    $Description = $_POST['Description'];

    $sql = "UPDATE `items` SET `type`='$productType',`name`='$Name',`unit`='$unit',`sellingPrice`='$sellingPrice',`description`='$Description', `modification_date`=CURRENT_TIMESTAMP() WHERE `itemId`='$sno'";
    $form = mysqli_query($conn, $sql);

    // if ($form) {
    //     echo "Update";
    // } else {
    //     echo "item Not Update";
    // }
    header("Location: ../../items/allitem.php");
}
?>