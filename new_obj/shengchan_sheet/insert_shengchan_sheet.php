<?php

$idd = intval($_GET['idd']); 


//include 'conn.php';
$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
	if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
	}

$sql = "insert into dagang_shengchan_sheet (idd) values($idd)";
$result = $mysqli->query($sql);
if ($result){
	echo json_encode(array('errorMsg'=>false));
} else {
	echo json_encode(array('errorMsg'=>true));
}
?>