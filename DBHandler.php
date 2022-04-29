<?php
class DB
{
    private $host = "zohaibphp.local";
    private $username = "root";
    private $password = "";
    private $dbname = "practicephp";
    public $db;

    public function __construct()
    {
        try
        {
            $this->db = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->username, $this->password);
        }
        catch (PDOException $e)
        {
            echo "Error: ".$e->getMessage();
        }
    }
}
?>