<?php

$sheet_name = htmlspecialchars($_REQUEST['sheet_name']);
$sheet_code = htmlspecialchars($_REQUEST['sheet_code']);

//include 'conn.php';
$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
	if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
	}

$sql = "insert into dagang_tongjimingxi_list(sheet_name,sheet_code)values('$sheet_name','$sheet_code')";
$result = $mysqli->query($sql);
if ($result){
	echo json_encode(array(
		'id' => $mysqli->insert_id,
		'sheet_name' => $sheet_name,		
		'sheet_code' => $sheet_code
	));
} else {
	
	echo json_encode(array('errorMsg'=>true));
}
?>