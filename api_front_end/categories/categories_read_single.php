<?php
header("Access-control-Allow-Origin:*");//no restrictions anybody an use it
header("Content-Type:application/json");//json return or file


include_once ("../../config/Database.php");
include_once ("../../models/Category.php");

$db_object=new Database();
$db_conn=$db_object->conn();

$category=new Categories($db_conn);

//get id for were  query
$category->id=isset($_GET['id'])?$_GET['id']:die();
//running query
$query_single_exec=$category->category_read_single();

$row=mysqli_fetch_assoc($query_single_exec);

//set propertied
$single_category_array=array(
    'id'=>$row["id"],
    'name'=>$row['name'],
    'created_at'=>$row['created_at'],
);

//MAke json print r because we want all values with that corresponding id
print_r(json_encode($single_category_array));
