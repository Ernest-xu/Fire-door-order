<?php
	$idd = intval($_GET['idd']); 
	$result = array();

	$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
	if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
	}

  
	
	$rs = $mysqli->query("select count(*) from dagang_shengchan_sheet where idd=$idd");
	$row = mysqli_fetch_array($rs);
	$result["total"] = $row[0];
	$rs =  $mysqli->query("select * from dagang_shengchan_sheet  where idd=$idd order by id desc ");
	
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	$result["rows"] = $items;
	$sum = $mysqli->query("select sum(qty) as qty,sum(fire_lock) as fire_lock,sum(guanjing_lock) as guanjing_lock, sum(heye) as heye,sum(bimenqi) as bimenqi,sum(shunweiqi) as shunweiqi,sum(anchaxiao) as anchaxiao,sum(fanghuoboli25) as fanghuoboli25,sum(fanghuoboli35) as fanghuoboli35 from dagang_shengchan_sheet where idd=$idd");
	if($sum1= mysqli_fetch_assoc($sum)){
		$qty = $sum1['qty'];
		$fire_lock=$sum1['fire_lock'];
		$guanjing_lock = $sum1['guanjing_lock'];
		$heye = $sum1['heye'];
		$bimenqi = $sum1['bimenqi'];
		$shunweiqi = $sum1['shunweiqi'];
		$anchaxiao = $sum1['anchaxiao'];
		$fanghuoboli25 = $sum1['fanghuoboli25'];
		$fanghuoboli35 = $sum1['fanghuoboli35'];
	
	}; 
	$footer= array("zhi_code"=>"合计：","qty"=>$qty,"fire_lock"=>$fire_lock,"guanjing_lock"=>$guanjing_lock,"heye"=>$heye,"bimenqi"=>$bimenqi,"shunweiqi"=>$shunweiqi,"anchaxiao"=>$anchaxiao,"fanghuoboli25"=>$fanghuoboli25,"fanghuoboli35"=>$fanghuoboli35,"action"=>true);
	
	$footer2 = array();
	
	array_push($footer2,$footer);
	
	$result["footer"]= $footer2;
	
	echo json_encode($result);

?>