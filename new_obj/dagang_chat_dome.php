<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>		
	<LINK href="themes/default/easyui.css" rel="stylesheet" type="text/css">	
	<link rel="stylesheet" type="text/css" href="themes/icon.css">
	<link rel="stylesheet" type="text/css" href="themes/color.css">
    <link rel="stylesheet" type="text/css" href="demo.css">
	<SCRIPT src="jquery.min.js" type="text/javascript"></SCRIPT>		 
	<SCRIPT src="jquery.easyui.min.js" type="text/javascript"></SCRIPT>	 
	
</head>
<body>	
	<div style="margin:10px 0;"></div>	
	<!--<div class="easyui-panel" style="width:700px;height:200px;padding:10px;">-->
<div class="easyui-layout" style="width:700px;height:450px;padding:10px;font-size: 16px;">
	<div class="easyui-panel" title="聊天记录列表"  data-options="region:'west',collapsed:false,collapsible:false" style="width:700px;font-size: 16px;" id="dcd_msglist">
	<ul class="chats">
	
	</ul>
	<!--<span style="color: white; background-color: #5bc0de">真厉害！</span>-->
	</div>
	<!--<div class="easyui-panel" title="用户列表" data-options="region:'center'" style="width:200px;font-size: 16px;" id="usrlist">-->
	</div>
</div>
	<!-- 对<input class="easyui-combobox" id="usr_select_list" data-options="valueField:'id',textField:'text'"/>说-->
	 <input type="input"  id="dcd_ipt_msg" style="width: 600px; height: 30px; font-size: 16px;" />
    <a href="#" class="easyui-linkbutton" id="dcd_btn_send" style="width:95px;height:30px;" onclick="dcd_onsubmit()">点击发送</a><br/>
	 
	<form id="dcd_form"></form>
	
	
	<script type="text/javascript">
$(function(){
	$.ajax({
		type: "POST",
		url:'chat_demo/get_msg_list.php',
		 contentType: "application/json; charset=utf-8",
		 data:JSON.stringify({"pid":parent.html_id}),
         dataType: "json",
         success:function(result){
			 //var json = $.parseJSON(result);
			 //console.log(result);
			 for(i=0;i<result.length;i++){
				 add_li_dcd(result[i].dt,result[i].msg,result[i].uid);
				 }
			dcd_scrollToBottom();
		 },error:function(result){
			 
			 
		 }
		
	});
 	

	
	
});


$('#dcd_ipt_msg').keydown(function(e){
	
	if($.trim($('#dcd_ipt_msg').val()) === ''){return;};
	if(e.keyCode==13){
		
		dcd_onsubmit();
		
	}
	
});
//滚动到底部
function dcd_scrollToBottom() {
    	var scrollTop = $("#dcd_msglist")[0].scrollHeight;
		
    	$("#dcd_msglist").scrollTop(scrollTop);
 	}
function add_li_dcd(now,msg,user){
	var chats = $('.chats');
	var who="";
	var imgg="";
	var li = $('<li class="me" >'+'<div class="image" >' +'<img src="" />'  +'<b style="color:#054095;"></b>' +'<i class="timesent" style="" data-time=' + now + '> <span  style="font-size:12px;">'+'['+now+']'+'<span></i> ' +'</div>' +'<p></p>' +'</li>');
//'+'['+now+']'+'    person.png
		// use the 'text' method to escape malicious user input
		li.find('p').text(msg);
		li.find('b').text(user);
		
		chats.append(li);
		
}
 function dcd_onsubmit(){
	 
	 if($.trim($('#dcd_ipt_msg').val()) === ''){return;};
	$.ajax({
		 type: "POST",
         url: "chat_demo/insert_msg_list.php",				
         contentType: "application/json; charset=utf-8",
		 data:JSON.stringify({'msg': $('#dcd_ipt_msg').val(),'uid':1,"pid":parent.html_id}),
         dataType: "json",
         success:function(result){
			
			if(result.error){
				
			}else{
				add_li_dcd(result.dt,result.msg,result.uid);
				
				dcd_scrollToBottom();
				$('#dcd_ipt_msg').val("");
				
			}
			//console.log(result);
		},error:function(result){
			//console.log(result);
			
		}
		
	});
	
		//$('#dcd_msglist').append('<span style="color: white; background-color: #5bc0de">123真厉害！</span><br><span style="color: white; background-color: #5bc0de">234真厉害！</span><br>');
	
 }
 function sub(){
	 $('#dcd_form').form('submit',{
		 url:'chat_demo/get_msg_list.php',
		 success:function(text){
			 var json = $.parseJSON(text);
//console.log(json[0].msg);
			//alert( text.length());
			// console.log(text);
			for(i=0;i<json.length;i++){
				add_li_dcd(json[i].dt,json[i].msg,json[i].uid);
				
			} 
		 }
	 });
	 
 }
</script>
	<style  type="text/css">

.chats {
	list-style-type: none;
	margin-top:4px;
}
.me {
	clear:both;
	float:left;
	margin-bottom:4px;
}

.chats .me p {
	text-align:left;
	float: left;
	display: inline-block;
	margin-left: 20px;
	margin-top:10px;
	margin-bottom:5px;
	padding: 25px 34px;
	min-width: 160px;
	min-height: 10px;
	max-width: 480px;
	background-color: #5C9C34;
	border-radius: 3px;
	box-shadow: 0px 3px 3px #E3E4E6;
	color: #FFFFFF;
	line-height: 1.4;
	word-wrap: break-word;
}
.image b {
	overflow: hidden;
	display: block;
	clear: both;
	padding-top: 2px;
}

.image i{
	font-size: 12px;
	line-height: 1.2;
	display: block;
	opacity: 0.8;
	padding-top: 4px;
}
</style>
</body>



</html>