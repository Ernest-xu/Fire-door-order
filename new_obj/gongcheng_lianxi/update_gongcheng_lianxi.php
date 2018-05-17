<?php

	$id=intval($_GET['id']);
	$towho=isset($_REQUEST['towho'])?htmlspecialchars($_REQUEST['towho']):"";
	$file_code=isset($_REQUEST['file_code'])?htmlspecialchars($_REQUEST['file_code']):"";
	$cc=isset($_REQUEST['cc'])?htmlspecialchars($_REQUEST['cc']):"";
	$fromwho=isset($_REQUEST['fromwho'])?htmlspecialchars($_REQUEST['fromwho']):"";
	$project_name=isset($_REQUEST['project_name'])?htmlspecialchars($_REQUEST['project_name']):"";
	$contract_code=isset($_REQUEST['contract_code'])?htmlspecialchars($_REQUEST['contract_code']):"";
	$dt=htmlspecialchars($_REQUEST['dt']);
	$fax_no=isset($_REQUEST['fax_no'])?htmlspecialchars($_REQUEST['fax_no']):"";
	$title=isset($_REQUEST['title'])?htmlspecialchars($_REQUEST['title']):"";
	$contact_content=isset($_REQUEST['contact_content'])?htmlspecialchars($_REQUEST['contact_content']):"";
	$reply_content=isset($_REQUEST['reply_content'])?htmlspecialchars($_REQUEST['reply_content']):"";
	
	$page_no=isset($_REQUEST['page_no'])?intval($_REQUEST['page_no']):0;
	$file_typ=isset($_REQUEST['file_typ'])?intval($_REQUEST['file_typ']):0;
	
	
	
	$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
	if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
	}
	//echo $id;
	$sql = "update dagang_gongcheng_lianxi set towho='$towho' ,file_code='$file_code',cc='$cc',fromwho='$fromwho',project_name='$project_name',contract_code='$contract_code',dt='$dt',fax_no='$fax_no',title='$title',contact_content='$contact_content',reply_content='$reply_content',page_no=$page_no,file_typ=$file_typ   where id=$id";
	$rs = $mysqli->query($sql);
	if($rs){
		echo json_encode(array('errorMsg'=>false));
	}else{
		echo json_encode(array('errorMsg'=>true));
	}
	
	
	
	
?>