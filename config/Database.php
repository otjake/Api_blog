<?php
class Database
{
    private $host ="localhost";
    private $db_name ="api_blog_db";
    private $username ="root";
    private $password ="";
    private $conn;

//db connect

    public function conn()
    {
        $this->conn = null;

        try {
            $this->conn = new mysqli( $this->host,$this->username,$this->password,$this->db_name);


//            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
//            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (Exception $e) {
            echo 'connection Error' . $e->getMessage();

        }
return $this->conn;
    }
}
