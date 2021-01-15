<?php
header('Content-Type:application/json');// directs that it will return data in json format
header('Access-Control-Allow-Origin:*'); // makes it access to all the websites
include 'connect.php';
$stmt=$conn->query('select * from persons');
$count = $stmt->rowCount();
if($count>0)
{
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) // we should return an associative array
echo json_encode($row); // we need to return autput in an jason format json_encode converts array into json format..
}
else{
	echo json_encode(array('message' => 'No record found;','status' => false));//here also we get result in json format 
}

?>