<?php
	$id = intval($_REQUEST['id']);
	
	$result = array();

	$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
	if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
	}

  
	
	$rs = $mysqli->query("select count(*) from dagang_contract_notice_info where pid=$id");
	$row = mysqli_fetch_array($rs);
	$result["total"] = $row[0];
	$rs =  $mysqli->query("select * from dagang_contract_notice_info where pid=$id order by id desc ");
	$sum = $mysqli->query("select sum(product_qty) as product_qty from dagang_contract_notice_info where pid=$id");
	if($sum1= mysqli_fetch_assoc($sum)){
			
		$sum2 =$sum1['product_qty'];
	}; 
	$footer= array("product_name"=>"合计","product_qty"=>$sum2,"action"=>1);
	//echo json_encode($rs);
	$footer2 = array();
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
		
	}
	array_push($footer2,$footer);
	$result["rows"] = $items;
	$result["footer"]= $footer2;
	echo json_encode($result);
	//echo json_encode($result);
	

?>