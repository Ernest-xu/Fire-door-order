<?php

$json = json_decode(file_get_contents("php://input"));	
	$uid = $json->{'uid'};
	$msg= $json->{'msg'};
	$pid = $json->{'pid'};
	
	$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	if((null!=$msg)){
	$sql="insert into dagang_msg (uid,msg,pid)values($uid,'$msg',$pid)";
	$result = $mysqli->query($sql);
	$insert_id = $mysqli->insert_id;
	$sql2 = "select * from dagang_msg where id=$insert_id";
	$rs = $mysqli->query($sql2);
	
	while($row=mysqli_fetch_assoc($rs)){
		 $dt = $row['dt'];
	}
	echo json_encode(array(
		'id' => $insert_id,
		'uid' => $uid,
		'msg' => $msg,
		'dt' => $dt,
		'pid'=>$pid
		
	));
	}else{
		echo json_encode(array(
		'error'=>"true"
		
		));
		
	}
	
?>