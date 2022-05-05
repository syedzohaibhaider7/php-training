<?php
include "DBHandler.php";
session_start();

$id = $_GET['id'];

$queryHdl = new DB();
$data = $queryHdl->selectData([$id]);
$_SESSION["data"] = $data;
header("location:edit-form");
?>