<?php

	
	$code=isset($_REQUEST['code'])?htmlspecialchars($_REQUEST['code']):"";
	$project_name=isset($_REQUEST['project_name'])?htmlspecialchars($_REQUEST['project_name']):"";
	$contact_person=isset($_REQUEST['contact_person'])?htmlspecialchars($_REQUEST['contact_person']):"";
	$project_addr=isset($_REQUEST['project_addr'])?htmlspecialchars($_REQUEST['project_addr']):"";
	$contact_tel=isset($_REQUEST['contact_tel'])?htmlspecialchars($_REQUEST['contact_tel']):"";
	$supply_dt=htmlspecialchars($_REQUEST['supply_dt']);
	$req1_1=isset($_REQUEST['req1_1'])?htmlspecialchars($_REQUEST['req1_1']):"";
	$req1_2=isset($_REQUEST['req1_2'])?htmlspecialchars($_REQUEST['req1_2']):"";
	$req1_3=isset($_REQUEST['req1_3'])?htmlspecialchars($_REQUEST['req1_3']):"";
	$req1_4=isset($_REQUEST['req1_4'])?htmlspecialchars($_REQUEST['req1_4']):"";
	$req1_5=isset($_REQUEST['req1_5'])?htmlspecialchars($_REQUEST['req1_5']):"";
	$req1_6=isset($_REQUEST['req1_6'])?htmlspecialchars($_REQUEST['req1_6']):"";
	$req2_1=isset($_REQUEST['req2_1'])?htmlspecialchars($_REQUEST['req2_1']):"";
	$req2_2=isset($_REQUEST['req2_2'])?htmlspecialchars($_REQUEST['req2_2']):"";
	$req2_3=isset($_REQUEST['req2_3'])?htmlspecialchars($_REQUEST['req2_3']):"";
	$req2_4=isset($_REQUEST['req2_4'])?htmlspecialchars($_REQUEST['req2_4']):"";
	$req2_5=isset($_REQUEST['req2_5'])?htmlspecialchars($_REQUEST['req2_5']):"";
	$req2_6=isset($_REQUEST['req2_6'])?htmlspecialchars($_REQUEST['req2_6']):"";
	$fix_1=isset($_REQUEST['fix_1'])?intval($_REQUEST['fix_1']):0;
	$fix_2=isset($_REQUEST['fix_2'])?intval($_REQUEST['fix_2']):0;
	$fix_3=isset($_REQUEST['fix_3'])?intval($_REQUEST['fix_3']):0;
	$fix_4=isset($_REQUEST['fix_4'])?intval($_REQUEST['fix_4']):0;
	$package_way1=isset($_REQUEST['package_way1'])?intval($_REQUEST['package_way1']):0;
	$package_way2=isset($_REQUEST['package_way2'])?intval($_REQUEST['package_way2']):0;
	$package_material1=isset($_REQUEST['package_material1'])?intval($_REQUEST['package_material1']):0;
	$package_material2=isset($_REQUEST['package_material2'])?intval($_REQUEST['package_material2']):0;
	$package_material3=isset($_REQUEST['package_material3'])?intval($_REQUEST['package_material3']):0;
	$fix_arrange=isset($_REQUEST['fix_arrange'])?htmlspecialchars($_REQUEST['fix_arrange']):"";
	$attachment_desc=isset($_REQUEST['attachment_desc'])?htmlspecialchars($_REQUEST['attachment_desc']):"";
	$special_req=isset($_REQUEST['special_req'])?htmlspecialchars($_REQUEST['special_req']):"";
	
	
	$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
	if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
	}
	
	$sql = "insert into dagang_order_approve (code,project_name,contact_person,project_addr,contact_tel,supply_dt,req1_1,req1_2,req1_3,req1_4,req1_5,req1_6,req2_1,req2_2,req2_3,req2_4,req2_5,req2_6,fix_1,fix_2,fix_3,fix_4,package_way1,package_way2,package_material1,package_material2,package_material3,fix_arrange,attachment_desc,special_req)values('$code','$project_name','$contact_person','$project_addr','$contact_tel','$supply_dt','$req1_1','$req1_2','$req1_3','$req1_4','$req1_5','$req1_6','$req2_1','$req2_2','$req2_3','$req2_4','$req2_5','$req2_6',$fix_1,$fix_2,$fix_3,$fix_4,$package_way1,$package_way2,$package_material1,$package_material2,$package_material3,'$fix_arrange','$attachment_desc','$special_req')";
	$rs = $mysqli->query($sql);
	if($rs){
		echo json_decode(array('errorMsg'=>'false'));
	}else{
		echo json_decode(array('errorMsg'=>"true"));
	}
	
	
	
	
?>