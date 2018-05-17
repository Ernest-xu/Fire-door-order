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
	<form id="doal_new_form">
	定单编号：<input id="doal_code" name="code" class="easyui-textbox" style="width:160px" required="true"></input>
	工程名称：<input id="doal_name" name="project_name" class="easyui-textbox" style="width:200px" required="true"></input>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add"  onclick="doal_oa_new()" style="width:90px">新增</a>
	</form>
	</div>
	<table id="doal_order_approve_list"  style="width:650px;height:400px" ></table>
	<div id="dorder_approve_dlg"  class="easyui-dialog" style="width:900px;height:500px;padding:center"  modal="true" closed="true">
		<form id="doal_update_form" method="post" style="padding:20px 0 0 0">
		
			<table style="width:560px;padding:0px 20px;">
				<tr>
					<dt style="padding:0px 20px;"><span style="font-size:14px;font-weight:bold;">基本信息：</span></dt>
				</tr>
			</table>
			<table style="width:860px;padding: 0px 20px;">
				
				
				
				<tr>
					<td colspan=1>工程名称：</td><td colspan=1><input id="doa_project_name" name="project_name" class="easyui-textbox" required="true" style=""></input></td><td colspan=1>合同编号：</td><td colspan=1><input id="doa_code"  name="code" class="easyui-textbox" required="true" style=""></input></td><td colspan=1>供货日期：</td><td colspan=1><input  id="doa_supply_dt"  name="supply_dt" class="easyui-datebox"  required="true" editable=false ></input></td>
				</tr>
				<tr>
					<td colspan=1>联系人：</td><td colspan=1 ><input id="doa_contact_person" name="contact_person" class="easyui-textbox" ></input></td><td colspan=1>电话：</td><td><input id="doa_contact_tel" name="contact_tel" class="easyui-textbox" ></input></td>
				</tr>
				
				<tr>
				<td colspan=1><dt style="font-size:12px;">工程地址：</dt></td><td colspan=5><input id="doa_project_addr" name="project_addr" style="width:400px;" class="easyui-textbox" ></input></td>
				</tr>
				
				<tr>
				<td colspan=6><dt > <span style="font-size:14px;font-weight:bold;">材料要求：</span></dt></td>
				</tr>
				<tr>
					<td colspan=1>喷漆色号：</td><td colspan=1><input  id="doa_req1_1" name="req1_1" class="easyui-textbox" ></input></td><td colspan=1>转印底粉：</td><td colspan=1><input  id="doa_req1_2" name="req1_2" class="easyui-textbox" ></input></td><td colspan=1>转印纸编号：</td><td colspan=1><input id="doa_req1_3" name="req1_3" class="easyui-textbox" ></input></td>
				</tr>
				<tr>
					<td colspan=1>门框料厚：</td><td colspan=1><input id="doa_req1_4"  name="req1_4" class="easyui-textbox" ></input></td><td colspan=1>门扇料厚：</td><td colspan=1><input  id="doa_req1_5" name="req1_5" class="easyui-textbox" ></input></td><td colspan=1>玻璃外形尺寸：</td><td colspan=1><input  id="doa_req1_6" name="req1_6" class="easyui-textbox" ></input></td>
				</tr>
				
				<tr>
				 <td colspan=6><dt ><span style="font-size:14px;font-weight:bold;">五金要求：</span></dt></td>
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
				<td colspan=6><dt><span style="font-size:14px;font-weight:bold;">安装工艺：</span></dt>
				</tr>
				<tr>
					</td><td>固定方式：</td><td><input id ="doa_fix_1"  name="fix_1" type="checkbox" value=1 style="vertical-align:middle; margin-top:0;" >膨胀螺栓</input></td><td><input id="doa_fix_2" name="fix_2" type="checkbox" value=1 style="vertical-align:middle; margin-top:0;">马仔条</input></td><td><input id="doa_fix_3" name="fix_3" type="checkbox" value=1 style="vertical-align:middle; margin-top:0;">焊接</input></td><td><input id="doa_fix_4" name="fix_4" type="checkbox" value=1 style="vertical-align:middle; margin-top:0;">其它</input>
					
				</tr>
				
				<tr>
					<td colspan=6><dt><span style="font-size:14px;font-weight:bold;">包装要求：</span></dt></td>
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
		$(function(){
			$('#doal_order_approve_list').datagrid({
				title:'定单审批列表',
				
				height:360,
				pagination: true,
				singleSelect:true,
				rownumbers:true,
				fitColumns:false,
				idField:'id',
				
				url:'order_approve/get_order_approve_list.php',
				columns:[[
				{field:'code',title:'定单编号', width:100,align:'center'},
				{field:'project_name',title:'定单名称', width:100,align:'center'},
				{field:'contact_person',title:'联系人', width:100,align:'center'},
				{field:'contact_tel',title:'电话', width:100,align:'center'},
				{field:'action',title:'', width:100,align:'center',
					formatter:function(value,row,index){
						var g = '<a href="javascript:void(0)" onclick="doal_update_onclick('+row.id+')">详细</a> ';			
						return g;
					}
				},
				{field:'action2',title:'', width:100,align:'center',
					formatter:function(value,row,index){
						var g = '<a href="javascript:void(0)" onclick="doal_delete_onclick('+row.id+')">删除</a> ';			
						return g;
					}
				}/*,
				{field:'action3',title:'', width:100,align:'center',
					formatter:function(value,row,index){
						var g = '<a href="javascript:void(0)" onclick="doal_sub_onclick('+row.id+')">提交</a> ';			
						return g;
					}
				}*/
				]]
				
			});
		});
	</script>
	<script type="text/javascript">
	var doal_id;
	//打开dlg
	function doal_update_onclick(index){
		doal_id=index;
		$('#doal_order_approve_list').datagrid('selectRecord',index);
		var row = $('#doal_order_approve_list').datagrid('getSelected');
		if (row){
			doa_clear();
			$('#doal_update_form').form('load',row);
			$('#dorder_approve_dlg').dialog('open').dialog('setTitle',"定单审批");
		}
	}
	//删除
	function doal_delete_onclick(index){
		$('#doal_order_approve_list').datagrid('selectRecord',index);
			var row = $('#doal_order_approve_list').datagrid('getSelected');
			
			if (row){
				$.messager.confirm('确认','确定删除此记录吗?',function(r){
					if (r){
						$.post('order_approve/delete_order_approve.php',{id:row.id},function(result){
							if (result.success){
								$('#doal_order_approve_list').datagrid('reload');	// reload the user data
							} else {
								$.messager.show({	// show error message
									title: 'Error',
									msg: result.errorMsg
								});
							}
						},'json');
					}
				});
			}
	}
	//新增
	function doal_oa_new(){
		$('#doal_new_form').form('submit',{
			url:'order_approve/insert_order_approve.php',
			onSubmit:function(){
				return $(this).form('validate');
				
			},
			success:function(result){
			
				$('#doal_code').textbox('clear');
				$('#doal_name').textbox('clear');
				$('#doal_order_approve_list').datagrid('reload');
			}
		});
	}
	//提交表单
	function doa_from_submit(){
		
		if($('#doal_update_form').form('validate')){
			
					$('#doal_update_form').form('submit',{
						url:"order_approve/update_doa_form.php?id="+doal_id,
						onSubmit:function(){
						},success:function(result){
							var result = eval('('+result+')');
							
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
								$('#doal_order_approve_list').datagrid('reload');
								$('#dorder_approve_dlg').dialog('close');
								
							}
						},error:function(result){
							$.messager.show({
								title: '错误',
								msg: "保存失败！"
				
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

	</style>
</body>


</html>