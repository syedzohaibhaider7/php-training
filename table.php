<?php
session_start();

$row = $_SESSION["data"];
$rowNum = $_SESSION["num"];

if ($rowNum > 0) {
    echo
    "<h1>Whole Database</h1>
    <table style='background-color: PaleGreen; border: 1px solid black; border-collapse: collapse; width: 100%'>
        <tr style='background-color: LightBlue;'>
            <th style='border: 1px solid black; border-collapse: collapse; width: 250px; height: 50px'>Full Name</th>
            <th style='border: 1px solid black; border-collapse: collapse; width: 200px;'>Password</th>
            <th style='border: 1px solid black; border-collapse: collapse; width: 350px;'>Email</th>
            <th style='border: 1px solid black; border-collapse: collapse; width: 70px;'>Age</th>
            <th style='border: 1px solid black; border-collapse: collapse; width: 100px;'>Gender</th>
            <th style='border: 1px solid black; border-collapse: collapse; width: 100px;'>Picture</th>
            <th style='border: 1px solid black; border-collapse: collapse; width: 100px;'>Edit User</th>
            <th style='border: 1px solid black; border-collapse: collapse; width: 100px;'>Delete User</th>
        </tr>";
    
    for ($i = 0; $i < $rowNum; $i++) {
        echo
        "<tr>
            <td style='border: 1px solid black; border-collapse: collapse; height: 35px; padding: 5px;'>" . $row[$i]->{"fName"} . "</td>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 5px;'>" . $row[$i]->{"passwd"} . "</td>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 5px;'>" . $row[$i]->{"email"} . "</td>
            <td style='border: 1px solid black; border-collapse: collapse; text-align: center; padding: 5px;'>" . $row[$i]->{"age"} . "</td>
            <td style='border: 1px solid black; border-collapse: collapse; text-align: center; padding: 5px;'>" . $row[$i]->{"gender"} . "</td>
            <td style='border: 1px solid black; border-collapse: collapse; text-align: center;'>
            <img src='images/" . $row[$i]->{"pic"} . "' style='width: 50px; height: 30px;'>
            </td>
            <td style='border: 1px solid black; border-collapse: collapse; text-align: center;'>
                <a href='edit.php?id=".$row[$i]->{"id"}."' style='text-decoration:none; color: Black; background-color: Gold; display: block; padding: 6px;'>Edit</a>    
            </td>
            <td style='border: 1px solid black; border-collapse: collapse; text-align: center;'>
                <a href='delete.php?id=".$row[$i]->{"id"}."' style='text-decoration:none; color: Black; background-color: IndianRed; display: block; padding: 6px;'>Delete</a>
            </td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
session_destroy();
?>