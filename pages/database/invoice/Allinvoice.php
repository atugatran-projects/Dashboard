<?php
include(dirname(__FILE__) . "/../dbconnect.php");

$id = $_SESSION['userID'];

$sql2 = "select * from invoices WHERE `user_id`='$id'";
$result = mysqli_query($conn, $sql2);

while ($row = $result->fetch_assoc()) {
    echo "
            <tr>
            <td><input type='checkbox' name='mdeleteIdinvoice[]' value='" .  $row["invoice_id"] . "'></td>
                <td>" . $row["creation_Date"] . "</td>
                <td>" . $row["invoice"] . "</td>
                <td>" . $row["customerName"] . "</td>
                <td>" . $row["total"] . "</td>
                <td>
                <a style='cursor:pointer'>
                    <i id='" . $row["invoice_id"] . "' class='fa-solid fa-pen-to-square invoiceEdit' style='color: #0fff4b;'></i>
                </a>
                <a style='cursor:pointer'>
                <i id='" . $row["invoice_id"] . "'class='fa-solid fa-trash invoicedelete' style='color: #ff0000;'></i>
                </a>
                <a style='cursor:pointer'>
                <i id='" . $row["invoice_id"] . "'class='fa-solid fa-file-pdf invoicepdf' style='color: blue;'></i>
                </a>
                </td>
            </tr>
                ";
}
