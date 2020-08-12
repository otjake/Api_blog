<?php
class Categories
{
    private $table="categories";
    private $conn;


    public $id;
    public $name;
    public $created_at;


    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function category_read(){

         $query="SELECT * FROM $this->table ORDER BY created_at DESC";
        $query_exec = mysqli_query($this->conn,$query);
        return $query_exec;
    }

    public function category_read_single(){
$this->id=htmlspecialchars(strip_tags($this->id));
         $query="SELECT * FROM $this->table 
WHERE id=$this->id";
        $query_exec = mysqli_query($this->conn,$query);
        return $query_exec;
    }


public function insert(){
    $this->id=htmlspecialchars(strip_tags($this->id));
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->created_at=htmlspecialchars(strip_tags($this->created_at));
 $query="INSERT INTO $this->table 
(name) VALUES ('$this->name')";
    $query_exec = mysqli_query($this->conn,$query);
   if($query_exec){
     return true;
   };

    printf("Errror: %s.\n");

    return false;
}
public function update(){
    $this->id=htmlspecialchars(strip_tags($this->id));
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->created_at=htmlspecialchars(strip_tags($this->created_at));
 $query="UPDATE $this->table
 SET (name='$this->name') WHERE id=`$this->id`";
    $query_exec = mysqli_query($this->conn,$query);
   if($query_exec){
     return true;
   };

    printf("Errror: %s.\n");

    return false;
}

}
?>
