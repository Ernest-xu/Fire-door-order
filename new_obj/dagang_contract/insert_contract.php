<?php

$project_name = htmlspecialchars($_REQUEST['project_name']);
$contract_code = htmlspecialchars($_REQUEST['contract_code']);

//include 'conn.php';
$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
	if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
	}

$sql = "insert into dagang_contract_notice(project_name,contract_code)values('$project_name','$contract_code')";
$result = $mysqli->query($sql);
if ($result){
	echo json_encode(array(
		'id' => $mysqli->insert_id,
		'project_name' => $project_name,		
		'contract_code' => $contract_code
	));
} else {
	
	echo json_encode(array('errorMsg'=>'新增失败！'));
}
?>