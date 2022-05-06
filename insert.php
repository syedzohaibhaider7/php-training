<?php 
include "DBHandler.php";

class Insert
{
    private $db;
    private $data;

    public function __construct($data, $target, $image)
    {
        $this->db = new DB();
        $this->data = $this->db->insertData($data, $target, $image);
    }
    public function getData()
    {
        return $this->data;
    }
}

if (isset($_POST['submit'])) {
    $data = [
        'name'             => $_POST['name'],
        'passwd'           => $_POST['passwd'],
        'email'            => $_POST['email'],
        'age'              => $_POST['age'],
        'gender'           => $_POST['gender']
    ];
    $target = "images/" . basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];
    $insert = new Insert($data, $target, $image);
    header("location:/");
}
?>