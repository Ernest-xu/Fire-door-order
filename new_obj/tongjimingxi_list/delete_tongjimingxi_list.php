<?php
	 $id = intval($_REQUEST['id']);
	$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
	if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
	}
	$sql2="select count(*) from dagang_tongjimingxi where idd=$id";
	$rs = $mysqli ->query($sql2);
	 $row = mysqli_fetch_array($rs);
	//echo $row;
	if($row[0]>0){
		echo json_encode(array('errorMsg'=>'存在统计明细表不可删除！'));
	}else{
		$sql="delete from dagang_tongjimingxi_list where id=$id";
		$result = $mysqli ->query($sql);
		if($result){
			echo json_encode(array('success'=>true));
		}else{	
			echo json_encode(array('errorMsg'=>'出现错误无法删除!'));
		}
	}
	
	
?>