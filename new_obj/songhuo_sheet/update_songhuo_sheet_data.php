<?php
$json = json_decode(file_get_contents("php://input"));
$id = $json->id;
$zhi_code = $json-> zhi_code;
$tuzhi_size = $json-> tuzhi_size;
$menkuang_qty = $json->menkuang_qty;
$menshan_qty = $json->menshan_qty;
$fire_degree = $json->fire_degree;
$tuzhi_size = $json->tuzhi_size;
$product_typ = $json->product_typ;
$width = $json->width;
$fanghuo_lock = $json->fanghuo_lock;
$height = $json->height;
$guanjing_lock = $json->guanjing_lock;
$heye = $json->heye;
$bimenqi = $json ->bimenqi;
$open_direction = $json ->open_direction;
$shunweiqi = $json ->shunweiqi;
$M6X10 = $json -> M6X10;
$note = $json -> note;



$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$sql = "update dagang_songhuo_sheet_data set zhi_code='$zhi_code',open_direction='$open_direction' ,tuzhi_size='$tuzhi_size' , menkuang_qty=$menkuang_qty ,menshan_qty=$menshan_qty,fire_degree =$fire_degree,tuzhi_size='$tuzhi_size',product_typ='$product_typ',width=$width,fanghuo_lock=$fanghuo_lock,height=$height,guanjing_lock=$guanjing_lock,heye=$heye,bimenqi=$bimenqi,shunweiqi=$shunweiqi,M6X10=$M6X10,note='$note' where id=$id";

$result = $mysqli->query($sql);
if ($result){
	echo json_encode(array(
		'id' => $id,
		'sql' => $sql
	));
}else{
	
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
	
}
?>