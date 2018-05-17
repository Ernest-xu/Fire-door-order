<?php
	$json = json_decode(file_get_contents("php://input"));	
	$id = $json->{'id'};
	
	
	
	$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	$sql="update dagang_contract_notice set stage=stage+1 where id=$id";
	$result = $mysqli->query($sql);
	if($result){
		echo json_encode(array(
		'id' => $id,
		//'stage' => $stage,
		'sql' => $sql
		));
	}else{
		
		echo json_encode(array('errorMsg'=>true));
		
	}

?>