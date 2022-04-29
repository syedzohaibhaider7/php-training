<?php
include "QueryHandler.php";

$queryHdl = new QueryHandler();
$queryHdl->Query("SELECT id, fName, passwd, email, age, gender, pic FROM info");
$data = $queryHdl->query->FetchAll();

if ($queryHdl->CountRows() > 0) {
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
    foreach ($data as $row) {
        echo
        "<tr>
            <td style='border: 1px solid black; border-collapse: collapse; height: 35px; padding: 5px;'>" . $row["fName"] . "</td>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 5px;'>" . $row["passwd"] . "</td>
            <td style='border: 1px solid black; border-collapse: collapse; padding: 5px;'>" . $row["email"] . "</td>
            <td style='border: 1px solid black; border-collapse: collapse; text-align: center; padding: 5px;'>" . $row["age"] . "</td>
            <td style='border: 1px solid black; border-collapse: collapse; text-align: center; padding: 5px;'>" . $row["gender"] . "</td>
            <td style='border: 1px solid black; border-collapse: collapse; text-align: center;'>
            <img src='images/" . $row["pic"] . "' style='width: 50px; height: 30px;'>
            </td>
            <td style='border: 1px solid black; border-collapse: collapse; text-align: center;'>
                <a href='edit-form?id=".$row["id"]."' style='text-decoration:none; color: Black; background-color: Gold; display: block; padding: 6px;'>Edit</a>    
            </td>
            <td style='border: 1px solid black; border-collapse: collapse; text-align: center;'>
                <a href='delete?id=".$row["id"]."' style='text-decoration:none; color: Black; background-color: IndianRed; display: block; padding: 6px;'>Delete</a>
            </td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

?>