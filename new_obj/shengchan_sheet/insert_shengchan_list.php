<?php

$project_name = htmlspecialchars($_REQUEST['project_name']);
$project_code = htmlspecialchars($_REQUEST['project_code']);

//include 'conn.php';
$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
	if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
	}

$sql = "insert into dagang_shengchan_list(project_name,project_code)values('$project_name','$project_code')";
$result = $mysqli->query($sql);
if ($result){
	echo json_encode(array(
		'id' => $mysqli->insert_id,
		'project_name' => $project_name,		
		'project_code' => $project_code
	));
} else {
	
	echo json_encode(array('errorMsg'=>true));
}
?>