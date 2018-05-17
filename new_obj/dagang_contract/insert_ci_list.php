<?php

$id = intval($_REQUEST['id']);


//include 'conn.php';
$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
	if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
	}

$sql = "insert into dagang_contract_notice_info (pid) values($id)";
$result = $mysqli->query($sql);
if ($result){
	echo json_encode(array(
		'id' => $mysqli->insert_id,
		'pid' => $id,		
		'sql' => $sql
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>