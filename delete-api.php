<?php
include 'connect.php';
header('Content-Type:application/json');// directs that it will return data in json format
header('Access-Control-Allow-Origin:*');// makes it access to all the websites
header('Access-Control-Allow-Methods:DELETE'); //DATA INPUT METHOD
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');//authorization denotes that it is accesible to authorised websites,x-requested-with denotes it will only take values with ajax input

$data=json_decode(file_get_contents("php://input"),true); //this true helps in returning an array
                                                          //php://input makes php read all the data format irrespective of get post jason or coming from android
														 //for using it proper methods should be specified in the postman
if(is_null($data)|| empty($data) && sizeof($data)==0){
  echo json_encode(array('error' => 'body cannot be null or empty'));
  header('HTTP/1.1 400 Bad request');
  exit();	
}
$p_id=$data['p_id']; //variable declare to get the key from array $data
$sql = "DELETE from persons where PersonID = {$p_id}";

if($conn->exec($sql))
{
   	echo json_encode(array('message' => 'Data deleted;','status' => true));//here also we get result in json format 

   }
else{
	echo json_encode(array('message' => 'Something went wrong data not deleted;','status' => false));//here also we get result in json format 
}
?>