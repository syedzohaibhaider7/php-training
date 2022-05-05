<?php
include "QueryHandler.php";

$id = $_GET['id'];

$queryHdl = new QueryHandler();
$queryHdl->deleteData($id);
header("location:get.php");
?>