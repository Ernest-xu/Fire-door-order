<?php
	$id = intval($_REQUEST['id']);
	$sign_dt = htmlspecialchars($_REQUEST['sign_dt']);
	$project_name  = htmlspecialchars($_REQUEST['project_name']);
	$jianshe_team = htmlspecialchars($_REQUEST['jianshe_team'])?htmlspecialchars($_REQUEST['jianshe_team']):"";
	$contract_code = htmlspecialchars($_REQUEST['contract_code'])?htmlspecialchars($_REQUEST['contract_code']):"";
	$project_addr = htmlspecialchars($_REQUEST['project_addr'])?htmlspecialchars($_REQUEST['project_addr']):"";
	$_note = htmlspecialchars($_REQUEST['_note'])?htmlspecialchars($_REQUEST['_note']):"";
	$_note2 = htmlspecialchars($_REQUEST['_note2'])? htmlspecialchars($_REQUEST['_note2']):"";
	$jiaohuo_dt = htmlspecialchars($_REQUEST['jiaohuo_dt']);
	$sales_name = htmlspecialchars($_REQUEST['sales_name'])?htmlspecialchars($_REQUEST['sales_name']):"";
	$project_contact = htmlspecialchars($_REQUEST['project_contact'])?htmlspecialchars($_REQUEST['project_contact']):"";
	
	
	$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	$sql="update dagang_contract_notice1 set sign_dt='$sign_dt',project_name='$project_name',jianshe_team='$jianshe_team',contract_code='$contract_code',project_addr='$project_addr',_note='$_note',_note2='$_note2',jiaohuo_dt='$jiaohuo_dt',sales_name = '$sales_name' , project_contact='$project_contact' where id=$id";
	$result = $mysqli->query($sql);
	if($result){
		echo json_encode(array(
		'id' => $id,
		'sign_dt' =>$sign_dt,
		'project_name' =>$project_name,
	
		
		));
	}else{
		
		echo json_encode(array('errorMsg'=>true));
		
	}

?>