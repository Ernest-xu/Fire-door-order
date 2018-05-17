<?php
$json = json_decode(file_get_contents("php://input"));
$id = $json->id;
$sheet_name = $json->sheet_name;
$sheet_code = $json->sheet_code;

$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$sql = "update dagang_tongjimingxi_list set sheet_code='$sheet_code',sheet_name='$sheet_name' where id=$id";

$result = $mysqli->query($sql);
if ($result){
	echo json_encode(array(
		'id' => $id,
		'sheet_name'=>$sheet_name,
		'sheet_code'=>$sheet_code
	));
}else{
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
	
}
?>