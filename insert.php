<?php 
include "DBHandler.php";

class Insert
{
    private $db;
    private $data;

    public function __construct($userData, $target, $image)
    {
        $this->db = new DB();
        if (!$this->emptyInput($userData, $image))
        {
            echo "ERROR: Incomplete Input";
        }
        else if (!$this->invalidName($userData))
        {
            echo "ERROR: Invalid Name";
        }
        else if (!$this->nameLength($userData))
        {
            echo "ERROR: Name length should be upto 50 character";
        }
        else if (!$this->invalidPassword($userData))
        {
            echo "ERROR: Invalid Password";
        }
        else if (!$this->passwordLength($userData))
        {
            echo "ERROR: Password length should be between 6 to 12 characters";
        }
        else if (!$this->invalidEmail($userData))
        {
            echo "ERROR: Invalid Email";
        }
        else if (!$this->invalidAge($userData))
        {
            echo "ERROR: Invalid Age";
        }
        else if (!$this->invalidGender($userData))
        {
            echo "ERROR: Invalid Gender";
        }
        else if (!$this->invalidImage($image))
        {
            echo "ERROR: Invalid Image";
        }
        else
        {
            $this->data = $this->db->insertData($userData, $target, $image);
            header("location:/");
        }
    }
    public function getData()
    {
        return $this->data;
    }
    public function emptyInput($userData, $image)
    {
        $result;
        if (empty($userData["name"]) || empty($userData["passwd"]) || empty($userData["email"]) || empty($userData["age"]) || empty($userData["gender"]) || empty($image))
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }
    public function invalidName($userData)
    {
        $result;
        if (!preg_match("/^([a-zA-Z])+(\s{0,1}([a-zA-Z]))*$/", $userData["name"]))
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }
    public function nameLength($userData)
    {
        $result;
        if (strlen($userData["name"]) > 50)
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }
    public function invalidPassword($userData)
    {
        $result;
        if (!preg_match("/^([a-zA-Z0-9`~!@#$%^&*()_+-=[\]{};:'\",<.>\|])+(\s{0,1}([a-zA-Z0-9`~!@#$%^&*()_+-=[\]{};:'\",<.>\|]))*$/", $userData["passwd"]))
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }
    public function passwordLength($userData)
    {
        $result;
        if (strlen($userData["passwd"]) < 6 || strlen($userData["passwd"]) > 12)
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }
    public function invalidEmail($userData)
    {
        $result;
        if (!preg_match("/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-]))+(\.+([a-zA-Z0-9]{2,4})){1,2}$/", $userData["email"]))
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }
    public function invalidAge($userData)
    {
        $result;
        if ($userData["age"] <= 0)
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }
    public function invalidGender($userData)
    {
        $result;
        if ($userData["gender"] == "select")
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }
    public function invalidImage($image)
    {
        $result;
        $allowed = array('jpeg', 'jpg', "png", "gif", "bmp", "jfif", "JPEG", "JPG", "PNG", "GIF", "BMP", "JFIF");
        $extension = pathinfo($image, PATHINFO_EXTENSION);
        if (!in_array($extension, $allowed))
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
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
}
?>