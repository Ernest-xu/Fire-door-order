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
	<div >
	
	</div>
	<div title="订单审批表" class="easyui-panel" style="width:860px;height:500px;padding:20px 0 0 0">
		<form id="doa_form" method="post" style="padding:20px 0 0 0">
		
			<table style="width:560px;padding:0px 20px;">
				<tr>
					<dt style="padding:0px 20px;"><span style="font-size:14px;font-weight:bold;">基本信息：</span></dt>
				</tr>
			</table>
			<table style="width:860px;padding: 0px 20px;">
				
				
				
				<tr>
					<td>工程名称：</td><td><input id="doa_project_name" name="project_name" class="easyui-textbox" required="true" style=""></input></td><td>合同编号：</td><td><input id="doa_code"  name="code" class="easyui-textbox" required="true" style=""></input></td><td>供货日期：</td><td><input  id="doa_supply_dt"  name="supply_dt" class="easyui-datebox"  required="true" editable=false ></input></td>
				</tr>
				<tr>
					<td>联系人：</td><td><input id="doa_contact_person" name="contact_person" class="easyui-textbox" ></input></td><td>电话：</td><td><input id="doa_contact_tel" name="contact_tel" class="easyui-textbox" ></input></td>
				</tr>
				</table>
				<table style="width:860px;padding:0px 20px;">
				<tr>
				<dt style="padding:0px 20px;font-size:12px;">工程地址：<input id="doa_project_addr" name="project_addr" style="width:400px;" class="easyui-textbox" ></input></dt>
				</tr>
				</table>
				<table style="width:860px;padding:0px 20px;">
				<tr>
				<dt style="padding:0px 20px;"><span style="font-size:14px;font-weight:bold;">材料要求：</span></dt>
				</tr>
				<tr>
					<td>喷漆色号：</td><td><input  id="doa_req1_1" name="req1_1" class="easyui-textbox" ></input></td><td>转印底粉：</td><td><input  id="doa_req1_2" name="req1_2" class="easyui-textbox" ></input></td><td>转印纸编号：</td><td><input id="doa_req1_3" name="req1_3" class="easyui-textbox" ></input></td>
				</tr>
				<tr>
					<td>门框料厚：</td><td><input id="doa_req1_4"  name="req1_4" class="easyui-textbox" ></input></td><td>门扇料厚：</td><td><input  id="doa_req1_5" name="req1_5" class="easyui-textbox" ></input></td><td>玻璃外形尺寸：</td><td><input  id="doa_req1_6" name="req1_6" class="easyui-textbox" ></input></td>
				</tr>
				</table>
				<table style="width:860px;padding:0px 20px;">
				<tr>
				<dt style="padding:0px 20px;"><span style="font-size:14px;font-weight:bold;">五金要求：</span></dt>
				</tr>
				<tr>
					<td>锁体：</td><td><input  id="doa_req2_1" name="req2_1" class="easyui-textbox" ></input></td><td>合页：</td><td><input id="doa_req2_2" name="req2_2" class="easyui-textbox" ></input></td><td>闭门器：</td><td><input id="doa_req2_3" name="req2_3" class="easyui-textbox" ></input></td>
				</tr>
				
				<tr>
					<td>插销：</td><td><input id="doa_req2_4" name="req2_4" class="easyui-textbox" ></input></td><td>顺位器：</td><td><input id="doa_req2_5" name="req2_5" class="easyui-textbox" ></input></td><td>其它：</td><td><input  id="doa_req2_6" name="req2_6" class="easyui-textbox" ></input></td>
				</tr>
				</table>
				<table style="width:560px;padding:0px 20px;">
				<tr>
					<dt style="padding:0px 20px;"><span style="font-size:14px;font-weight:bold;">安装工艺：</span></dt><td>固定方式：</td><td><input id ="doa_fix_1"  name="fix_1" type="checkbox" value=1 style="vertical-align:middle; margin-top:0;" >膨胀螺栓</input></td><td><input id="doa_fix_2" name="fix_2" type="checkbox" value=1 style="vertical-align:middle; margin-top:0;">马仔条</input></td><td><input id="doa_fix_3" name="fix_3" type="checkbox" value=1 style="vertical-align:middle; margin-top:0;">焊接</input></td><td><input id="doa_fix_4" name="fix_4" type="checkbox" value=1 style="vertical-align:middle; margin-top:0;">其它</input>
					
				</tr>
				</table>
				<table style="width:410px;padding:0px 20px;">
				<tr>
					<dt style="padding:0px 20px;"><span style="font-size:14px;font-weight:bold;">包装要求：</span></dt>
				</tr>
				<tr >
					<td>打包方式：</td><td><input id="doa_package_way1" name="package_way1" type="checkbox" class="a" value=1 style="vertical-align:middle; margin-top:0;">分拆</input></td><td><input id="doa_package_way2" name="package_way2" type="checkbox" value=1 style="vertical-align:middle; margin-top:0;">配套</input></td>
				</tr>
				<tr>
					<td>包装材料：</td><td><input id="doa_package_material1" name="package_material1" type="checkbox" value=1 style="vertical-align:middle; margin-top:0;">薄膜</input></td><td><input id="doa_package_material2" name="package_material2" type="checkbox" value=1 style="vertical-align:middle; margin-top:0;">纸皮</input></td><td><input id="doa_package_material3" name="package_material3" type="checkbox" value=1 style="vertical-align:middle; margin-top:0;">其它</input></td>
				
				</tr>
				</table>
				<table style="width:860px;padding:0px 20px;">
				<tr>
					 <dt style="padding:1px 20px;font-size:14px;font-weight:bold;">装配分工：<textarea id = "doa_fix_arrange" name="fix_arrange" class="easyui-textbox" style="width:600px;height:100px;" data-options="multiline:true"></textarea> <dt>
				<tr/>
				<tr>
					 <dt style="padding:1px 20px;font-size:14px;font-weight:bold;">附件简述：<textarea id="doa_attachment_desc" name="attachment_desc" class="easyui-textbox" style="width:600px;height:100px;" data-options="multiline:true"></textarea> </dt>
				<tr/>
				<tr>
					 <dt style="padding:1px 20px;font-size:14px;font-weight:bold;">特殊要求：<textarea id="doa_special_req" name="special_req" class="easyui-textbox" style="width:600px;height:100px;" data-options="multiline:true"></textarea> </td>
				<tr/>
				<td></td><Td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok " onclick="doa_from_submit()" style="width:90px">保存</a></td><td></td><td></td>
				
			</table>
		</form>
		
	
	</div>
	
	<script type="text/javascript">
	//提交表单
	function doa_from_submit(){
		
		if($('#doa_form').form('validate')){
			$.messager.confirm('确认','确定保存吗?',function(r){
				if (r){
					$('#doa_form').form('submit',{
						url:"order_approve/insert_doa_form.php",
						onSubmit:function(){
						},success:function(result){
							if(result.errorMsg){
								$.messager.show({
									title: '错误',
									msg: "保存失败！"
				
								});
							}else{
								
								$.messager.show({
									title: '成功',
									msg: "保存成功！"
					
								});
								doa_clear();
								
							}
						},error:function(result){
							$.messager.show({
								title: '错误',
								msg: "保存失败！"
				
							});
						}
				
					});
				}
			});
		}else{
			$.messager.show({
				title: '提示',
				msg: "请按规则填写！"
				
			});
		}
		
		
		
		
		
	}
	//清除数据
	function doa_clear(){
		$('#doa_project_name').textbox('setValue',"");
		$('#doa_code').textbox('setValue',"");
		$('#doa_supply_dt').textbox('setValue',"");
		$('#doa_contact_person').textbox('setValue',"");
		$('#doa_contact_tel').textbox('setValue',"");
		$('#doa_project_addr').textbox('setValue',"");
		$('#doa_req1_1').textbox('setValue',"");
		$('#doa_req1_2').textbox('setValue',"");
		$('#doa_req1_3').textbox('setValue',"");
		$('#doa_req1_4').textbox('setValue',"");
		$('#doa_req1_5').textbox('setValue',"");
		$('#doa_req1_6').textbox('setValue',"");
		$('#doa_req2_1').textbox('setValue',"");
		$('#doa_req2_2').textbox('setValue',"");
		$('#doa_req2_3').textbox('setValue',"");
		$('#doa_req2_4').textbox('setValue',"");
		$('#doa_req2_5').textbox('setValue',"");
		$('#doa_req2_6').textbox('setValue',"");
		$('#doa_fix_1').attr('checked',false);
		$('#doa_fix_2').attr('checked',false);
		$('#doa_fix_3').attr('checked',false);
		$('#doa_fix_4').attr('checked',false);
		$('#doa_package_way1').attr('checked',false);
		$('#doa_package_way2').attr('checked',false);
		$('#doa_package_material1').attr('checked',false);
		$('#doa_package_material2').attr('checked',false);
		$('#doa_package_material3').attr('checked',false);
		$('#doa_fix_arrange').textbox('setValue',"");
		$('#doa_attachment_desc').textbox('setValue',"");
		$('#doa_special_req').textbox('setValue',"");
		
	}	
	
	
	</script>
<style  type="text/css">
.a{
	vertical-align:middle;
}
.ftitle{
			font-size:14px;
			font-weight:bold;
			padding:5px 0;
			margin-bottom:10px;
			border-bottom:1px solid #ccc;
		}
</style>
</body>


</html>