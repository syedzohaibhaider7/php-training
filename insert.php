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
    $queryHdl->insertData($data, $target, $image);
    header("location:/");
}
?>