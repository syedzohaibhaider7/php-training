<?php 
include "QueryHandler.php";

$queryHdl = new QueryHandler();

if (isset($_POST['submit'])) {
    $data = [
        'name'             => $_POST['name'],
        'passwd'           => $_POST['passwd'],
        'email'            => $_POST['email'],
        'age'              => $_POST['age'],
        'gender'           => $_POST['gender']
    ];
    $target = "images/" . basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];
    $queryHdl->Query("INSERT INTO info (fName, passwd, email, age, gender, pic) VALUES (?, ?, ?, ?, ?, ?)", [$data['name'], $data['passwd'], $data['email'], $data['age'], $data['gender'], $image]);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    header("location:/");
}
?>