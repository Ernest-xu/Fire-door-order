<?php
	$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
		if ($mysqli->connect_errno) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
	$htmlData = '';
	$id=intval($_REQUEST['id']);
	$auto_id = isset($_POST['auto_id'])?1:0;
	if($auto_id==1){
	if (!empty($_POST['content1'])) {
		if (get_magic_quotes_gpc()) {
			$htmlData = stripslashes($_POST['content1']);
		} else {
			$htmlData = $_POST['content1'];
		}
		if(true){
		$mysqli  =new mysqli("127.0.0.1","root","x5","x5sys");
		if ($mysqli->connect_errno) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
		//echo $htmlData;
		$sql = "update melay_articles set html_content='$htmlData' where id=$id";
		$result =  $mysqli->query($sql);
		}	
	}
	}else if($auto_id==0){
		
		 $sql = "select * from melay_articles where id=$id";
		 $results =  $mysqli->query($sql);
		while($row= mysqli_fetch_assoc($results)){
			
		$htmlData =	 $row['html_content'];
		};
		
			
		
	}
	mysqli_close($mysqli);
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title>KindEditor PHP</title>
	<link rel="stylesheet" href="../kindeditor/themes/default/default.css" />
	<link rel="stylesheet" href="../kindeditor/plugins/code/prettify.css" />
	<script charset="utf-8" src="../kindeditor/kindeditor.js"></script>
	<script charset="utf-8" src="../kindeditor/lang/zh_CN.js"></script>
	<script charset="utf-8" src="../kindeditor/plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content1"]', {
				cssPath : '../kindeditor/plugins/code/prettify.css',
				uploadJson : '../kindeditor/php/upload_json.php',
				fileManagerJson : '../kindeditor/php/kindeditor/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
				}
			});
			prettyPrint();
			var editor1 = K.create('textarea[name="content1"]');
		});
	</script>
</head>
<body>
	<!--<?php echo $htmlData; ?>-->
	<form name="example" method="post" action="menu/text_dlg.php?id=<?php echo $id;?>">
		<!--<a href="javascript:void(0)" id="example_id" name="example_id" >-->
		<textarea name="content1" style="width:700px;height:390px;visibility:hidden;"><?php echo htmlspecialchars($htmlData); ?></textarea>
		<input type="hidden" name="auto_id" value="1"/>
		<br/>
		<input type="submit" name="button" value="提交内容" /> (提交快捷键: Ctrl + Enter)
		
	</form>
	
</body>
</html>

