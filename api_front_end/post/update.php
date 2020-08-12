<?php

header("Access-control-Allow-Origin:*");//no restrictions anybody an use it
header("Content-Type:application/json");//json return or file
//since its a post,we addd methods we want to allow with the post
header("Access-control-Allow-methods:PUT");//no restrictions anybody an use it
header("Access-control-Allow-Headers:Access-control-Allow-Headers,Content-Type,Access-control-Allow-Methods,Authorization,X-requested-with");//json return or file,X-requested-with->allows cross site scripting


include_once("../../config/Database.php");
include_once("../../models/Post.php");
//db_connect
//initalize databbase and connect from Database.php
$database = new Database(); //the class
$db_connect = $database->conn();//using database variable in our conn function

//query
//instantiating blog post object
$post = new Posts($db_connect);

//gets raw data from input or data inputed
$data = json_decode(file_get_contents("php://input"));
$post->id = $data->id;
$post->title=$data->title;
$post->body=$data->body;
$post->author=$data->author;
$post->category_id=$data->category_id;


//update post
if ($post->update()) {
    echo json_encode(array('message' => 'Post Updated'));
} else {
    echo json_encode(array('message' => 'Post Not Updated'));
}
