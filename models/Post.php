<?php
class Posts
{
    private $table = "posts";
    private $conn;

    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $created_at;

//constructor function called to instantiate a class
//this makes database connnection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read_query()
    {
        $query = "SELECT categories.name,
    posts.id, posts.category_id,posts.title,posts.body,posts.author,posts.created_at
     FROM 
    $this->table 
    LEFT JOIN categories ON posts.category_id=categories.id
    ORDER BY 
    posts.created_at DESC
    ";
//    var_dump($query);

        $query_exec = mysqli_query($this->conn, $query);
        return $query_exec;
//    $stmt=$this->conn->prepare($query);
//    $stmt->execute();
//     return $stmt;
    }


    public function read_single()
    {
      $query = "SELECT categories.name,
    posts.id, posts.category_id,posts.title,posts.body,posts.author,posts.created_at
     FROM 
    $this->table 
    LEFT JOIN categories ON posts.category_id=categories.id
    WHERE posts.id=$this->id";


        $query_single_exec = mysqli_query($this->conn, $query);
        return $query_single_exec;

        //        $query="SELECT categories.php.name,
//    posts.id, posts.category_id,posts.title,posts.body,posts.author,posts.created_at
//     FROM
//    $this->table
//    LEFT JOIN categories.php ON posts.category_id=categories.php.id
//    WHERE posts.id=?";

//    $stmt=$this->conn->prepare($query);
//        $stmt->bindParam(1,$this->id);
//    $stmt->execute();
//        $row=$stmt->fetch(PDO::FETCH_ASSOC);

    }

    public function create()
    {
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->body = htmlspecialchars(strip_tags($this->body));
        $query = "
INSERT INTO `$this->table`(`category_id`, `title`, `body`, `author`)
VALUES ($this->category_id,'$this->title','$this->body','$this->author')
";
$query_exec=mysqli_query($this->conn,$query);
        if($query_exec){
            return true;
        }
        printf("Errror: %s.\n");
return false;

        //json is returned
#####USING PDO#####

//        $query = "INSERT INTO `$this->table` (category_id, title, body, author) VALUES (? , ?, ?, ? )";
//        $stmt = $this->conn->prepare($query);
//
//        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
//        $this->author = htmlspecialchars(strip_tags($this->author));
//        $this->title = htmlspecialchars(strip_tags($this->title));
//        $this->body = htmlspecialchars(strip_tags($this->body));
//
//        $stmt->bindParam(1, $this->category_id);
//        $stmt->bindParam(2, $this->title);
//        $stmt->bindParam(3, $this->body);
//        $stmt->bindParam(4, $this->author);
//
//        if ($stmt->execute()) {
//            return true;
//        }
//        //print error
//        printf("Error: %s.\n", $stmt->error);
//
//        return false;
    }


    public function update()
    {
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->body = htmlspecialchars(strip_tags($this->body));
    $query = "
UPDATE `$this->table` SET
`category_id`='$this->category_id',`title`='$this->title',`body`='$this->body',`author`='$this->body'
 WHERE `id`='$this->id'
";
        $query_exec=mysqli_query($this->conn,$query);
        if($query_exec){
            return true;
        }
        printf("Errror: %s.\n");
        return false;

//        json is returned
#####USING PDO#####

//        $query = "UPDATE `$this->table` SET category_id=?, title=?, body=?, author=?
//WHERE id=`$this->id`";
//        $stmt = $this->conn->prepare($query);
//
//        $this->id = htmlspecialchars(strip_tags($this->id));
//
//
//        $stmt->bindParam(1, $this->category_id);
//        $stmt->bindParam(2, $this->title);
//        $stmt->bindParam(3, $this->body);
//        $stmt->bindParam(4, $this->author);
//        $stmt->bindParam(5, $this->id);
//
//        if ($stmt->execute()) {
//            return true;
//        }
//        //print error
//        printf("Error: %s.\n", $stmt->error);
//
//        return false;


    }

    public function delete()
    {
        $this->id = htmlspecialchars(strip_tags($this->id));

   $query = "
DELETE  FROM `$this->table`
 WHERE `id`='$this->id'
";
        $query_exec=mysqli_query($this->conn,$query);
        if($query_exec){
            return true;
        }
        printf("Errror: %s.\n");
        return false;

//        json is returned

//        $query = "
//DELETE  FROM `$this->table`
// WHERE id=:id
//";
//        $stmt=$this->conn->prepare($query);
//        $this->id = htmlspecialchars(strip_tags($this->id));
//$stmt->bindParam(':id',$this->id);
//
//        if($stmt->execute()){
//            return true;
//        }
//        printf("Errror: %s.\n");
//        return false;
//
//

    }
}
?>
