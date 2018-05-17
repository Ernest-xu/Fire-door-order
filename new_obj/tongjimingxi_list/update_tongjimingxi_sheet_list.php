<?php
$json = json_decode(file_get_contents("php://input"));
$id = $json->id;
//$project_name = $json->project_name;
//$shengchan_code = $json->shengchan_code;
$block_no = $json-> block_no;
$block_lev = $json-> block_lev;
$mark_code = $json->mark_code;
$door_code = $json->door_code;
$zhi_code = $json->zhi_code;
$qty = $json->qty;
$made_code = $json->made_code;
$location = $json->location;
$direction = $json->direction;
$door_type2 = $json->door_type2;
$design_width = $json->design_width;
$note = $json->note;
$design_height= $json->design_height;
$qus_width = $json->qus_width;
$qus_height = $json->qus_height;
$door_frame_width = $json->door_frame_width;
$door_frame_height = $json->door_frame_height;
$xiakan = $json->xiakan;
$fanghuo_lock = $json->fanghuo_lock;
$guanjing_lock = $json->guanjing_lock;
$heye = $json->heye;
$bimenqi = $json->bimenqi;
$xiamai = $json->xiamai;
$xiakan = $json->xiakan;
$shuxuqi = $json->shuxuqi;
$chaxiao = $json->chaxiao;
$boli = $json->boli;





$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$sql = "update dagang_tongjimingxi set block_no='$block_no',block_lev='$block_lev' , mark_code='$mark_code' ,door_code='$door_code',zhi_code ='$zhi_code',made_code='$made_code',location='$location',direction='$direction',door_type2='$door_type2',note='$note',qty=$qty,design_width=$design_width,design_height=$design_height,qus_width=$qus_width,qus_height=$qus_height,door_frame_width=$door_frame_width,door_frame_height=$door_frame_height,xiamai=$xiamai,xiakan=$xiakan,fanghuo_lock=$fanghuo_lock,guanjing_lock=$guanjing_lock,heye=$heye,bimenqi=$bimenqi,chaxiao=$chaxiao,shuxuqi=$shuxuqi,boli=$boli where id=$id";

$result = $mysqli->query($sql);
if ($result){
	echo json_encode(array(
		'id' => $id,
		'sql'=>$sql
	));
}else{
	echo json_encode(array(
		'id' => $id,
		'sql'=>$sql
	));
	//echo json_encode(array('errorMsg'=>'Some errors occured.'));
	
}
?>