<?php
header('Content-Type:application/json');// directs that it will return data in json format
header('Access-Control-Allow-Origin:*'); // makes it access to all the websites
include 'connect.php';

$data=json_decode(file_get_contents("php://input"),true); //this true helps in returning an array
                                                          //php://input makes php read all the data format irrespective of get post jason or coming from android
														 //for using it proper methods should be specified in the postman
$search_value=$data['search_value']; //variable declare to get the key from array $data
// $search_value=isset($_GET['search_value']) ? $_GET['search_value'] : die(); //if you want to use get method
$stmt=$conn->query("select * from persons where FirstName LIKE '%{$search_value}%'");
$count = $stmt->rowCount();
if($count>0)
{
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) // we should return an associative array
echo json_encode($row); // we need to return autput in an jason format json_encode converts array into json format..
}
else{
	echo json_encode(array('message' => 'No search record found;','status' => false));//here also we get result in json format 
}
?>