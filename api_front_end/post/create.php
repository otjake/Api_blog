<?php
header("Access-control-Allow-Origin:*");//no restrictions anybody an use it
header("Content-Type:application/json");//json return or file
//since its a post,we addd methods we want to allow with the post
header("Access-control-Allow-methods:POST");//no restrictions anybody an use it
header("Access-control-Allow-Headers:Access-control-Allow-Headers,Content-Type,Access-control-Allow-Methods,Authorization,X-requested-with");//json return or file,X-requested-with->allows cross site scripting


include_once ("../../config/Database.php");
include_once ("../../models/Post.php");
//db_connect
//initalize databbase and connect from Database.php
$database=new Database(); //the class
$db_connect=$database->conn();//using database variable in our conn function

//query
//instantiating blog post object
$post=new Posts($db_connect);

//gets raw data frrom input
$data=json_decode(file_get_contents("php://input"));
$post->title=$data->title;
$post->body=$data->body;
$post->author=$data->author;
$post->category_id=$data->category_id;

//create post
if($post->create()){
    echo json_encode(array('message'=>'Post Created'));
}else{
    echo json_encode(array('message'=>'Post Not Created make sure all parameters are properly intered'));
}
