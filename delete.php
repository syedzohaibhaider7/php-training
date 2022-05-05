<?php
include "DBHandler.php";

$id = $_GET['id'];

$queryHdl = new DB();
$queryHdl->deleteData($id);
header("location:get.php");
?>