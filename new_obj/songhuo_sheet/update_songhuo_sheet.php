<?php
$id = intval($_GET['id']);
$project_name = htmlspecialchars($_REQUEST['project_name']);
$shengchan_sheet_no = htmlspecialchars($_REQUEST['shengchan_sheet_no']);
$fuzeren = htmlspecialchars($_REQUEST['fuzeren']);
$contact_tel= htmlspecialchars($_REQUEST['contact_tel']);
$address= htmlspecialchars($_REQUEST['address']);
$songhuo_dt= htmlspecialchars($_REQUEST['songhuo_dt']);
$car_driver= htmlspecialchars($_REQUEST['car_driver']);
$car_num= htmlspecialchars($_REQUEST['car_num']);
$shouhuoren= htmlspecialchars($_REQUEST['shouhuoren']);
//include 'conn.php';
$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
	if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
	}

$sql = "update dagang_songhuo_sheet set project_name='$project_name',shengchan_sheet_no='$shengchan_sheet_no',fuzeren='$fuzeren',contact_tel='$contact_tel',address='$address',songhuo_dt='$songhuo_dt',car_driver='$car_driver',car_num='$car_num',shouhuoren='$shouhuoren' where id=$id";
$result = $mysqli->query($sql);
if ($result){
	echo json_encode(array('errorMsg'=>false));
} else {
	
	echo json_encode(array('errorMsg'=>true));
}
?>