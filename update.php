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
    $queryHdl->Query("UPDATE info SET fName=?, passwd=?, email=?, age=?, gender=?, pic=? WHERE id=?", [$data['name'], $data['passwd'], $data['email'], $data['age'], $data['gender'], $image, $data['id']]);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    header("location:table");
}
?>