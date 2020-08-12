<?php

header("Access-control-Allow-Origin:*");//no restrictions anybody an use it
header("Content-Type:application/json");//json return or file

include_once ("../../models/Category.php");
include_once ("../../config/Database.php");

//creating a database object
$database=new Database();
$conn_database=$database->conn();//getting connection

$category=new Categories($conn_database);

$result=$category->category_read();

$row_count=mysqli_num_rows($result);
if($row_count >0){
    $top_braces=array();
    $top_braces['data']=array();

    while ($row=mysqli_fetch_assoc($result)){
        $cat_items=array(
            'id'=>$row['id'],
            'name'=>$row['name'],
            'created_at'=>$row['created_at']
        );
        array_push($top_braces['data'],$cat_items);

    }
//putting in json format
echo json_encode($top_braces);
}else{
    echo json_encode(array("message"=>"No post found"));

}
?>
