<?php
include "DBHandler.php";

class Edit
{
    private $db;
    private $data;

    public function __construct($id)
    {
        $this->db = new DB();
        $this->data = $this->db->selectData([$id]);
    }
    public function getData()
    {
        return $this->data;
    }
}
?>