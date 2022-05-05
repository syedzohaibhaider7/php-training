<?php 
include "QueryHandler.php";

$queryHdl = new QueryHandler();

if (isset($_POST['submit'])) {
    $data = [
        'id'               => $_POST['id'],
        'name'             => $_POST['name'],
        'passwd'           => $_POST['passwd'],
        'email'            => $_POST['email'],
        'age'              => $_POST['age'],
        'gender'           => $_POST['gender']
    ];
    $target = "images/" . basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];
    $queryHdl->updateData($data, $target, $image);
    header("location:get.php");
}
?>