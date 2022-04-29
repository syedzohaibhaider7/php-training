<?php
include "DBHandler.php";

class QueryHandler extends DB
{
    public $query;

    public function Query($query, $param = [])
    {
        if (empty($param))
        {
            $this->query = $this->db->prepare($query);
            return $this->query->execute();
        }
        else
        {
            $this->query = $this->db->prepare($query);
            return $this->query->execute($param);
        }
    }
    public function CountRows()
    {
        return $this->query->rowCount();
    }
    public function FetchAll()
    {
        return $this->query->fetchAll(PDO::FETCH_OBJ);
    }
    public function Single()
    {
        return $this->query->fetch(PDO::FETCH_OBJ);
    }
}
?>