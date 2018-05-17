<?php

$json = json_decode(file_get_contents("php://input"));	
	
	$pid = $json->{'pid'};
//	$pid = intval($_REQUEST['pid']);
	$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	
	$sql="select * from  dagang_msg where pid=$pid";
	
	$result = $mysqli->query($sql);
	$i=0;
	while($row=mysqli_fetch_assoc($result)){
			//$msg_list[$i][0]=$row[id];
			//$msg_list[$i][0]=$row[note];
			//$msg_list[$i][2]=$row[uid];
			//$msg_list[$i][3]=$row[ouid];
			//$msg_list[$i][4]=$row[dt];
			$rows[]=$row;
		
		//$i++;
		
	}; 
	
	//foreach($rows as $key=>$v){
	//		$msg_list[$i][0]=$v[id];
	//		$msg_list[$i][0]=$v[note];
	//		$msg_list[$i][2]=$v[uid];
	//		$msg_list[$i][3]=$v[ouid];
	//		$msg_list[$i][4]=$v[dt];
	//		$i++;
	//};
	echo json_encode($rows);
	
	
?>