<?php
$json = json_decode(file_get_contents("php://input"));
$id = $json->id;
$project_name = $json->project_name;
$project_code = $json->project_code;

$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$sql = "update dagang_shengchan_list set project_code='$project_code',project_name='$project_name' where id=$id";

$result = $mysqli->query($sql);
if ($result){
	echo json_encode(array(
		'id' => $id,
		'project_name'=>$project_name,
		'project_code'=>$project_code
	));
}else{
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
	
}
?>