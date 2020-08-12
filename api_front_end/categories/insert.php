<?php
header("Access-control-Allow-Origin:*");//no restrictions anybody an use it
header("Content-Type:application/json");//json return or file
//since its a post,we addd methods we want to allow with the post
header("Access-control-Allow-methods:POST");//no restrictions anybody an use it
header("Access-control-Allow-Headers:Access-control-Allow-Headers,Content-Type,Access-control-Allow-Methods,Authorization,X-requested-with");//json return or file,X-requested-with->allows cross site scripting



include_once ("../../models/Category.php");
include_once ("../../config/Database.php");

$db_object=new Database();
$db_conn=$db_object->conn();


$category=new Categories($db_conn);
$data=json_decode(file_get_contents("php://input"));

$category->name=$data->name;

if($category->insert()){
    echo json_encode(array("message"=>"success"));
}else{
   echo json_encode(array("message"=>"Unable to insert"));
}
