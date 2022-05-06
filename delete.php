<?php
include "DBHandler.php";

class Delete
{
    private $db;
    private $data;

    public function __construct($id)
    {
        $this->db = new DB();
        $this->data = $this->db->deleteData($id);
    }
    public function getData()
    {
        return $this->data;
    }
}

$id = $_GET['id'];

$delete = new Delete($id);
header("location:table");
?>