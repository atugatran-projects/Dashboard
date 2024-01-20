<?php
include(dirname(__FILE__)."/../dbconnect.php");

$id = $_SESSION['userID'];
$sql2 = "select * from items WHERE `user_id`='$id'";
$result = mysqli_query($conn,$sql2);

while ($row = $result->fetch_assoc()) {
    echo "
            <tr>
                <td><input type='checkbox' name='mdeleteIditem[]' value='" .  $row["itemId"] . "'></td>
                <!-- <td style='display:none'>" . $row["itemId"] . "</td>-->
                <td>" . ucfirst($row["name"]) . "</td>
                <td>" . $row["description"] . "</td>
                <td> $ " . $row["sellingPrice"] . "</td>
                <td>" . $row["unit"] . "</td>
                <td>
                <a href='#'>
                    <i id='".$row["itemId"]."' class='fa-solid fa-pen-to-square itemsedit' style='color: #0fff4b;'></i>
                </a>
                <a href='#'>
                <i id='".$row["itemId"]."'class='fa-solid fa-trash itemsdeletes' style='color: #ff0000;'></i>
                </a>
                </td>
            </tr>
                ";
}
?>