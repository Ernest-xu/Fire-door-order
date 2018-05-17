<?php
	$idd = intval($_GET['idd']); 
	$result = array();

	$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
	if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
	}

  
	
	$rs = $mysqli->query("select count(*) from dagang_tongjimingxi where idd=$idd");
	$row = mysqli_fetch_array($rs);
	$result["total"] = $row[0];
	$rs =  $mysqli->query("select * from dagang_tongjimingxi  where idd=$idd order by id desc ");
	
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	$result["rows"] = $items;
	$sum = $mysqli->query("select sum(qty) as qty,sum(fanghuo_lock) as fanghuo_lock,sum(guanjing_lock) as guanjing_lock, sum(heye) as heye,sum(bimenqi) as bimenqi,sum(chaxiao) as chaxiao,sum(shuxuqi) as shuxuqi,sum(boli) as boli from dagang_tongjimingxi where idd=$idd");
	if($sum1= mysqli_fetch_assoc($sum)){
		$qty = $sum1['qty'];
		$fanghuo_lock=$sum1['fanghuo_lock'];
		$guanjing_lock = $sum1['guanjing_lock'];
		$heye = $sum1['heye'];
		$bimenqi = $sum1['bimenqi'];
		$chaxiao = $sum1['chaxiao'];
		$shuxuqi = $sum1['shuxuqi'];
		$boli = $sum1['boli'];
		
	
	}; 
	$footer= array("block_no"=>"合计：","qty"=>$qty,"fanghuo_lock"=>$fanghuo_lock,"guanjing_lock"=>$guanjing_lock,"heye"=>$heye,"bimenqi"=>$bimenqi,"chaxiao"=>$chaxiao,"shuxuqi"=>$shuxuqi,"boli"=>$boli,"action"=>true);
	
	$footer2 = array();
	
	array_push($footer2,$footer);
	
	$result["footer"]= $footer2;
	
	echo json_encode($result);

?>