<?php
include 'dbconnect.php';

if (isset($_POST['dataId'])) {
    $dataId = $_POST['dataId'];
    $fetchData = mysqli_query($conn, "select * from items where itemId like '$dataId'");

    $data = array();
    $row = mysqli_fetch_array($fetchData);

    $data[] = array("itemId" => $row['itemId'], "name" => $row['name'], "unit" => $row['unit'], "sellingPrice" => $row['sellingPrice']);
    echo json_encode($data);
}
