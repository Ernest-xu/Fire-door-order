<?php

$project_name = htmlspecialchars($_REQUEST['project_name']);
$code = htmlspecialchars($_REQUEST['code']);

//include 'conn.php';
$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
	if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
	}

$sql = "insert into dagang_order_approve(code,project_name)values('$code','$project_name')";
$result = $mysqli->query($sql);
if ($result){
	echo json_encode(array(
		'id' => $mysqli->insert_id,
		'project_name' => $project_name,		
		'code' => $code
	));
} else {
	
	echo json_encode(array('errorMsg' => true));
}
?>