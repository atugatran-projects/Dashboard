<?php
include("../dbconnect.php");
$sno = $_GET['editCustomers'];
if (isset($_POST['Customersedit'])) {
    $customerType = $_POST['Customer_Type'];
    $salutation = $_POST['Salutation'];
    $Fname = $_POST['First_name'];
    $Lname = $_POST['last_name'];
    $customerPhone = $_POST['customerPhone'];
    $customerEmail = $_POST['customerEmail'];
    $companyName = $_POST['companyName'];
    $Website = $_POST['Website'];

    $editSql = "UPDATE `customers` SET `customerType`='$customerType',`salutation`='$salutation',`firstName`='$Fname',`lastName`='$Lname',`customerPhone`='$customerPhone',`customerEmail`='$customerEmail',`companyName`='$companyName',`Website`='$Website', `Modified_Date`=CURRENT_TIMESTAMP() WHERE `customerId` = '$sno'";

    // `update_customer`='[value-16]'

    echo "Update";

    $editServer = mysqli_query($conn, $editSql);
    
    if ($editServer) {
        echo "Customer Update";
    } else {
        echo "Customer Not Update";
    }
    header("Location: ../../customer/allCustomer.php");
}
