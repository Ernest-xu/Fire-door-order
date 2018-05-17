<?php

$project_name = htmlspecialchars($_REQUEST['project_name']);
$shengchan_sheet_no = htmlspecialchars($_REQUEST['shengchan_sheet_no']);

//include 'conn.php';
$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
	if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
	}

$sql = "insert into dagang_songhuo_sheet(project_name,shengchan_sheet_no)values('$project_name','$shengchan_sheet_no')";
$result = $mysqli->query($sql);
if ($result){
	echo json_encode(array(
		'id' => $mysqli->insert_id,
		'project_name' => $project_name,		
		'shengchan_sheet_no' => $shengchan_sheet_no
	));
} else {
	
	echo json_encode(array('errorMsg'=>'新增失败！'));
}
?>