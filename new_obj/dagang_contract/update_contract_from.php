<?php
	$json = json_decode(file_get_contents("php://input"));	
	$id = $json->id;
	$pid = $json->pid;
	$product_name = $json->product_name;
	$product_qty = $json->product_qty;
	$product_note = $json->product_note;
	
	$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	$sql="update dagang_contract_notice_info set product_name='$product_name',product_qty=$product_qty,product_note='$product_note' where id=$id";
	$result = $mysqli->query($sql);
	if($result){
		echo json_encode(array(
		'id' => $id,
		'product_note' => $product_note,
		'product_qty' => $product_qty,
		'product_name' => $product_name,
		'sql' => $sql
		));
	}else{
		
		echo json_encode(array('errorMsg'=>'数据修改失败！'));
		
	}

?>