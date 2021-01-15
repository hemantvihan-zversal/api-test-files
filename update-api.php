<?php
include 'connect.php';
header('Content-Type:application/json');// directs that it will return data in json format
header('Access-Control-Allow-Origin:*');// makes it access to all the websites
header('Access-Control-Allow-Methods:POST'); //DATA INPUT METHOD
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');//authorization denotes that it is accesible to authorised websites,x-requested-with denotes it will only take values with ajax input

$data=json_decode(file_get_contents("php://input"),true); //this true helps in returning an array
                                                          //php://input makes php read all the data format irrespective of get post jason or coming from android
														 //for using it proper methods should be specified in the postman
$last_name=$data['last_name']; //variable declare to get the key from array $data
$first_name=$data['first_name'];
$city=$data['city'];
$sql = "update persons set FirstName='{$first_name}',LastName='{$last_name}' where City='{$city}'";

if($conn->exec($sql))
{
   	echo json_encode(array('message' => 'New data inserted;','status' => true));//here also we get result in json format 

   }
else{
	echo json_encode(array('message' => 'New data not inserted;','status' => false));//here also we get result in json format 
}
?>