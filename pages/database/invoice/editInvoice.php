<?php
include('../dbconnect.php');
include('../../common/config.php');

echo "<pre>";
print_r($_POST);
echo "</pre>";

if (isset($_GET['editInvoice'])) {
    $id = $_GET['editInvoice'];
    $user_id = $_POST['user_id'];
    $CustomerName = $_POST['CustomerName'];
    $Invoice = $_POST['Invoice'];
    $OrderNumber = $_POST['OrderNumber'];
    $InvoiceDate = $_POST['InvoiceDate'];
    $Terms = $_POST['Terms'];
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

    // echo "<pre>";
    // echo $items;
    // echo "</pre>";

    $fileName = $_FILES['file']["name"][0];
    $tmpName = $_FILES['file']["tmp_name"][0];

    $folder =    "../../../assets/upload/invoice/". $fileName;
    $res = move_uploaded_file($tmpName, $folder);


    $sql = "UPDATE `invoices` SET `user_id`='$user_id',`customerName`='$CustomerName',`invoice`='$Invoice',`orderNumber`='$OrderNumber',`InvoiceDate`='$InvoiceDate',`Terms`='$Terms',`expireyDate`='$ExpireyDate',`salesperson`='$Salesperson',`subject`='$Subject',`subTotal`='$subTotal',`Discount`='$Discount',`discount2`='$Discount2',`Adjustment`='$Adjustment',`TCS`='$TCS',`total`='$total',`termsAndConditions`='$termsAndConditions',`items`='$items',`files`='$fileName' WHERE `invoice_id`='$id'";

    $form = mysqli_query($conn, $sql);


    if ($form) {
        echo "Update";
    } else {
        echo "invoice Not Update";
    }
    header("Location: ../../invoice/all-invoice.php");
}
