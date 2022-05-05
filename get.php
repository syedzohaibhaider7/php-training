<?php
include "DBHandler.php";
session_start();

$queryHdl = new DB();
$data = $queryHdl->selectData();
$num = $queryHdl->CountRows();
$_SESSION["data"] = $data;
$_SESSION["num"] = $num;
header("location:table");
?>