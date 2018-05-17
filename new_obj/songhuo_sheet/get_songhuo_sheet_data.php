<?php
	$idd = intval($_GET['idd']); 
	$result = array();

	$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
	if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
	}

  
	
	$rs = $mysqli->query("select count(*) from dagang_songhuo_sheet_data where idd=$idd");
	$row = mysqli_fetch_array($rs);
	$result["total"] = $row[0];
	$rs =  $mysqli->query("select * from dagang_songhuo_sheet_data  where idd=$idd order by id desc ");
	
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	$result["rows"] = $items;
	$sum = $mysqli->query("select sum(menkuang_qty) as menkuang_qty,sum(menshan_qty) as menshan_qty,sum(fanghuo_lock) as fanghuo_lock,sum(guanjing_lock) as guanjing_lock, sum(heye) as heye,sum(bimenqi) as bimenqi,sum(shunweiqi) as shunweiqi,sum(M6X10) as M6X10 from dagang_songhuo_sheet_data where idd=$idd");
	if($sum1= mysqli_fetch_assoc($sum)){
		$menkuang_qty = $sum1['menkuang_qty'];
		$menshan_qty=$sum1['menshan_qty'];
		$fanghuo_lock = $sum1['fanghuo_lock'];
		$guanjing_lock = $sum1['guanjing_lock'];
		$heye = $sum1['heye'];
		$bimenqi = $sum1['bimenqi'];
		$shunweiqi = $sum1['shunweiqi'];
		$M6X10 = $sum1['M6X10'];
		
	
	}; 
	$footer= array("zhi_code"=>"合计：","menkuang_qty"=>$menkuang_qty,"menshan_qty"=>$menshan_qty,"fanghuo_lock"=>$fanghuo_lock,"guanjing_lock"=>$guanjing_lock,"heye"=>$heye,"bimenqi"=>$bimenqi,"shunweiqi"=>$shunweiqi,"M6X10"=>$M6X10,"action"=>true);
	
	$footer2 = array();
	
	array_push($footer2,$footer);
	
	$result["footer"]= $footer2;
	
	echo json_encode($result);

?>