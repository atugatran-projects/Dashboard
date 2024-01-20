<?php
include('../dbconnect.php');
include('../../common/config.php');

// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

if (isset($_GET['editQuote'])) {
    $id = $_GET['editQuote'];
    $user_id = $_POST['user_id'];
    $CustomerName = $_POST['CustomerName'];
    $Invoice = $_POST['Invoice'];
    $OrderNumber = $_POST['OrderNumber'];
    $QuoteDate = $_POST['QuoteDate'];
    $ExpireyDate = $_POST['ExpireyDate'];
    $Salesperson = $_POST['Salesperson'];
    $Subject = $_POST['Subject'];
    $subTotal = $_POST['subTotal'];
    $Discount = $_POST['Discount'];
    $Discount2 = $_POST['Discount2'];
    $Adjustment = $_POST['Adjustment'];
    $TCS = $_POST['TCS'];
    $total = $_POST['total'];
    $termsAndConditions = $_POST['termsAndConditions'];

    $item = [
        'name' => $_POST['name'],
        'qty' => $_POST['qty'],
        'unit' => $_POST['unit'],
        'rate' => $_POST['rate'],
        'amount' => $_POST['amount']
    ];

    $items = json_encode($item);

    $fileName = $_FILES['file']["name"];
    $tmpName = $_FILES['file']["tmp_name"];

    $folder =  SITE_URL.'assets/upload/quote/'.$fileName;
    // move_uploaded_file($tmpName, $folder);

    $sql = "UPDATE `quote` SET `user_id`='$user_id',`customerName`='$CustomerName',`invoice`='$Invoice',`orderNumber`='$OrderNumber',`quoteDate`='$QuoteDate',`expireyDate`='$ExpireyDate',`subject`='$Subject',`subTotal`='$subTotal',`Discount`='$Discount',`discount2`='$Discount2',`Adjustment`='$Adjustment',`TCS`='$TCS',`total`='$total', `salesperson`='$Salesperson',`files`='$fileName', `termsAndConditions`='$termsAndConditions',`items`='$items' WHERE `quote_id`='$id'";

    $form = mysqli_query($conn, $sql);

    if ($form) {
        echo "Update";
    } else {
        echo "quote Not Update";
    }

    header("Location: ../../quote/Allquote.php");
}
