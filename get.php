<?php
include "DBHandler.php";

class Get
{
    private $db;
    private $data;
    private $numOfRows;

    public function __construct()
    {
        $this->db = new DB();
        $this->data = $this->db->selectData();
        $this->numOfRows = $this->db->CountRows();
    }
    public function getData()
    {
        return $this->data;
    }
    public function getNumOfRows()
    {
        return $this->numOfRows;
    }
}
?>