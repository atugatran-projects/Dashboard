<?php
include_once("../dbconnect.php");
// Customerdeletes
if (isset($_GET['Customerdeletes'])) {
    $sno = $_GET['Customerdeletes'];
    $deleteSql = "DELETE FROM `customers` WHERE `customerId` = $sno";
    $deleteServer = mysqli_query($conn, $deleteSql);
    header("Location: ../../customer/allCustomer.php");
}
// MulCustomerdeletes
if (isset($_POST['mDeleteCus'])) {
    // $sno = $_POST['mdeleteIdCus'];

    if (isset($_POST['mdeleteIdCus']) && !empty($_POST['mdeleteIdCus']) && is_array($_POST['mdeleteIdCus'])) {

        foreach ($_POST['mdeleteIdCus'] as $key) {
            $MdeleteSql = "DELETE FROM `customers` WHERE `customerId` = $key";
            $deleteServer = mysqli_query($conn, $MdeleteSql);

            // if ($deleteServer) {
            //     echo "Delete";
            // } else {
            //     echo "Customer Not Delete";
            // }
        }
    }
    header("Location: ../../customer/allCustomer.php");
}
