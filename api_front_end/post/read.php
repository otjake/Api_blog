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

//vlog post query,output read result
$result=$post->read_query();

//result count

$result_num=mysqli_num_rows($result);

//$result_num=$result->rowCount();
if($result_num > 0){
    $post_arr=array();
$post_arr['data']=array();
while ($row=mysqli_fetch_assoc($result)){


//while ($row=$result->fetch(PDO::FETCH_ASSOC)){

    $post_item=array(
        'id'=>$row['id'],
        'title'=>$row['title'],
        'body'=>html_entity_decode($row['body']),
        'author'=>$row['author'],
        'category_id'=>$row['category_id'],
        'category_name'=>$row['name']
    );

    //push into $post_arr['data'];
    array_push($post_arr['data'],$post_item);
}
//putting in json format
echo json_encode($post_arr);
}else{
    echo json_encode(array("message"=>"No post found"));

}
