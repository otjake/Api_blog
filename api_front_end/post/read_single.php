<?php
header("Access-control-Allow-Origin:*");//no restrictions anybody an use it
header("Content-Type:application/json");//json return or file


include_once ("../../config/Database.php");
include_once ("../../models/Post.php");
//db_connect
//initalize databbase and connect from Database.php
$database=new Database(); //the class
$db_connect=$database->conn();//using database variable in our conn function

//query
//initializing blog post object
$post=new Posts($db_connect);

//get id for were  query
$post->id=isset($_GET['id'])?$_GET['id']:die();
//running query
$query_single_exec=$post->read_single();

$row=mysqli_fetch_assoc($query_single_exec);

//set propertied
$single_post_array=array(
    'id'=>$row["id"],
    'title'=>$row['title'],
    'body'=>$row['body'],
    'author'=>$row['author'],
    'category_id'=>$row['category_id'],
    'category_name'=>$row['name']

);

//MAke json print r because we want all values with that corresponding id
print_r(json_encode($single_post_array));
