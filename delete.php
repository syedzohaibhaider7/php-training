<?php
include "QueryHandler.php";

$id = $_GET['id'];

$queryHdl = new QueryHandler();

if ($queryHdl->Query("DELETE FROM info WHERE id=?", [$id]))
{
    header("location:table");
}
?>