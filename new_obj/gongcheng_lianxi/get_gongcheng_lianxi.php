<?php
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$offset = ($page-1)*$rows;
	$result = array();

	$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
	if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
	}

  
	
	$rs = $mysqli->query("select count(*) from dagang_gongcheng_lianxi ");
	$row = mysqli_fetch_array($rs);
	$result["total"] = $row[0];
	$rs =  $mysqli->query("select * from dagang_gongcheng_lianxi  order by id desc ");
	
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	$result["rows"] = $items;

	echo json_encode($result);

?>