<?php

$project_name = htmlspecialchars($_REQUEST['project_name']);
$contract_code = htmlspecialchars($_REQUEST['contract_code']);

//include 'conn.php';
$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
	if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
	}

$sql = "insert into dagang_gongcheng_lianxi(project_name,contract_code,file_typ)values('$project_name','$contract_code',0)";
$result = $mysqli->query($sql);
if ($result){
	echo json_encode(array(
		'id' => $mysqli->insert_id,
		'project_name' => $project_name,		
		'contract_code' => $contract_code
	));
} else {
	
	echo json_encode(array('errorMsg'=>true));
}
?>