<?php
	 $id = intval($_REQUEST['id']);
	$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
	if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
	}
	$sql="delete from dagang_order_approve where id=$id";
	$result = $mysqli ->query($sql);
	if($result){
		echo json_encode(array('success'=>true));
		
	}else{
		
		echo json_encode(array('errorMsg'=>'出现错误无法删除'));
	}
	
	
?>