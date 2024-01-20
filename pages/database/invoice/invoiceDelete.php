<?php
include_once("../dbconnect.php");
// invoiceDelete
if (isset($_GET['invoiceDelete'])) {
    $sno = $_GET['invoiceDelete'];
    $deleteSql = "DELETE FROM `invoices` WHERE `invoice_id` = $sno";
    $deleteServer = mysqli_query($conn, $deleteSql);
    header("Location: ../../invoice/all-invoice.php");
}

// mdeleteIdinvoice
if (isset($_POST['mdeleteIdinvoice'])) {
    if (isset($_POST['mdeleteIdinvoice']) && !empty($_POST['mdeleteIdinvoice']) && is_array($_POST['mdeleteIdinvoice'])) {
        foreach ($_POST['mdeleteIdinvoice'] as $key) {
            $MdeleteSql = "DELETE FROM `invoices` WHERE `invoice_id` = $key";
            $deleteServer = mysqli_query($conn, $MdeleteSql);

            // if ($deleteServer) {
            //     echo "Delete";
            // } else {
            //     echo "Quote Not Delete";
            // }
        }
    }
    header("Location: ../../invoice/all-invoice.php");
}
