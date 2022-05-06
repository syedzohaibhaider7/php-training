<?php 
include "DBHandler.php";

class Update
{
    private $db;
    private $data;

    public function __construct($data, $target, $image)
    {
        $this->db = new DB();
        $this->data = $this->db->updateData($data, $target, $image);
    }
    public function getData()
    {
        return $this->data;
    }
}

if (isset($_POST['submit'])) {
    $data = [
        'id'               => $_POST['id'],
        'name'             => $_POST['name'],
        'passwd'           => $_POST['passwd'],
        'email'            => $_POST['email'],
        'age'              => $_POST['age'],
        'gender'           => $_POST['gender']
    ];
    $target = "images/" . basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];
    $insert = new Update($data, $target, $image);
    header("location:table");
}
?>