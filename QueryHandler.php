<?php
include "DBHandler.php";

class QueryHandler extends DB
{
    public $query;

    public function Query($query, $param = [])
    {
        if (empty($param)) {
            $this->query = $this->db->prepare($query);
            return $this->query->execute();
        } else {
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

    public function selectData()
    {
        $this->Query("SELECT id, fName, passwd, email, age, gender, pic FROM info");
        return $this->FetchAll();
    }
    public function insertData($data, $target, $image)
    {
        $this->Query("INSERT INTO info (fName, passwd, email, age, gender, pic) VALUES (?, ?, ?, ?, ?, ?)", [$data['name'], $data['passwd'], $data['email'], $data['age'], $data['gender'], $image]);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    }
    public function updateData($data, $target, $image)
    {
        $this->Query("UPDATE info SET fName=?, passwd=?, email=?, age=?, gender=?, pic=? WHERE id=?", [$data['name'], $data['passwd'], $data['email'], $data['age'], $data['gender'], $image, $data['id']]);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    }
    public function deleteData($id)
    {
        $this->Query("DELETE FROM info WHERE id=?", [$id]);
    }
}
?>