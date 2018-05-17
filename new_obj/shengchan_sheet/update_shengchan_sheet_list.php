<?php
$json = json_decode(file_get_contents("php://input"));
$id = $json->id;
//$project_name = $json->project_name;
//$shengchan_code = $json->shengchan_code;
$zhi_code = $json-> zhi_code;
$men_code = $json-> men_code;
$product_typ = $json->product_typ;
$door_typ = $json->door_typ;
$fire_degree = $json->fire_degree;
//$made_standard = $json->made_standard;
$open_direction = $json->open_direction;
$qty = $json->qty;
$surface = $json->surface;
$wai_width = $json->wai_width;
//$nei_width = $json->nei_width;
$height = $json->height;
//$main_width = $json->main_width;
//$_signal = $json->_signal;
//$fu_width = $json->fu_width;
//$height2 = $json->height2;
//$thinkness = $json->thinkness;
//$main_mianban = $json->main_mianban;
//$main_beiban = $json->main_beiban;
//$fu_mianban = $json->fu_mianban;
//$fu_beiban = $json->fu_beiban;
//$height3 = $json->height3;
$xialan = $json->xialan;
$xiamai = $json->xiamai;
//$fire_lock = $json->fire_lock;
//$guanjing_lock = $json->guanjing_lock;
//$heye = $json->heye;
//$bimenqi = $json->bimenqi;
//$shunweiqi = $json->shunweiqi;
//$anchaxiao = $json->anchaxiao;
//$fanghuoboli25 = $json->fanghuoboli25;
//$fanghuoboli35 = $json->fanghuoboli35;
//$note = $json->note;





$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$sql = "update dagang_shengchan_sheet set zhi_code='$zhi_code',men_code='$men_code' , product_typ=$product_typ ,door_typ=$door_typ,fire_degree =$fire_degree,open_direction='$open_direction',qty=$qty,surface='$surface',wai_width=$wai_width,height=$height,xialan=$xialan,xiamai=$xiamai where id=$id";

$result = $mysqli->query($sql);
if ($result){
	echo json_encode(array(
		'id' => $id,
		
	));
}else{
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
	
}
?>