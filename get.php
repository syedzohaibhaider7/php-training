<?php
include "QueryHandler.php";
session_start();

$queryHdl = new QueryHandler();
$data = $queryHdl->selectData();
$num = $queryHdl->CountRows();
$_SESSION["data"] = $data;
$_SESSION["num"] = $num;
header("location:table");
?>