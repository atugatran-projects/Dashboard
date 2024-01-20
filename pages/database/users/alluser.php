<?php
include(dirname(__FILE__)."/../dbconnect.php");
$sql2 = "select * from users";
$result = mysqli_query($conn,$sql2);

while ($row = $result->fetch_assoc()) {
    echo "
            <tr>
                <td>" . ucfirst($row["userName"]) . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["country"] . "</td>
                <td>" . $row["role"] . "</td>
                <td>
                <a>
                    <i id='".$row["sno"]."' class='fa-solid curso fa-pen-to-square edituser' style='color: #0fff4b; cursor: pointer;'></i>
                </a>
                <a>
                <i id='".$row["sno"]."'class='fa-solid fa-trash deleteUser' style='color: #ff0000; cursor: pointer;'></i>
                </a>
                </td>
            </tr>
                ";
}