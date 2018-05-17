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
	<div>
	<form id="dgl_new_form">
	合同编号：<input id="dgl_code" name="contract_code" class="easyui-textbox" style="width:160px" required="true"></input>
	工程名称：<input id="dgl_name" name="project_name" class="easyui-textbox" style="width:250px" required="true"></input>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add"  onclick="dgl_cn_new()" style="width:90px">新增</a>
	</form>
	</div>
	<table id="dgl_list_table" style="width:900px;height:500px;"></table>
	<div id="dgl_html_dlg"  class="easyui-dialog" style="width:760px;height:580px;padding:center;" modal=true closed="true">
	<div style="padding:20px 20px">
	<form id="dgl_dgl_ffrom" class="easyui-form" method="post">
	    <table style="width:700px">
	    <tr>
		<td>To 致：</td><td><input name="towho" class="easyui-textbox" style="width:220px;" required="true"/></td><td>文件编号:</td><td><input name="file_code" class="easyui-textbox" style="width:220px;" required="true"/></td>
		</tr>
		<tr>
		<td>C.c抄送：</td><td><input name="cc" class="easyui-textbox" style="width:220px;" required="true"/></td><td>页 数:</td><td><input name="page_no" class="easyui-numberbox" style="width:220px;" required="true"/></td>
		</tr>
		<tr>
		<td>From由：</td><td><input name="fromwho" class="easyui-textbox" style="width:220px;" required="true"/></td><td>时 间:</td><td><input name="dt" class="easyui-datebox" style="width:220px;" required="true" editable=false/></td>
		</tr>
		<tr>
		<td>工程名称：</td><td><input name="project_name" class="easyui-textbox" style="width:220px;" required="true"/></td><td>合同编号:</td><td><input name="contract_code" class="easyui-textbox" style="width:220px;" required="true"/></td>
		</tr>
		<tr>
		<td>发文类型：</td><td><input  name="file_typ" type="radio" class="a" value=1 style="vertical-align:middle; margin-top:0;">急件 </input><input  name="file_typ" type="radio" class="a" value=0 style="vertical-align:middle; margin-top:0;" >普通 </input><input  name="file_typ" type="radio" class="a" value=2 style="vertical-align:middle; margin-top:0;">请回复 </input><input  name="file_typ" type="radio" class="a" value=3 style="vertical-align:middle; margin-top:0;">请悉知 </input></td><td>回文传真:</td><td><input name="fax_no" class="easyui-textbox" style="width:220px;" required="true"/></td>
		</tr>
		
		<tr>
		<td>发文主旨：</td><td colspan="3"> <textarea name="" class="easyui-textbox" style="width:420px;"   /></td>
		</tr>
		
		<tr>
		<td>联系内容：</td><td colspan="3"> <textarea name="contact_content" class="easyui-textbox" style="width:420px;height:150px;"  data-options="multiline:true" /></td>
		</tr>
		<tr>
		<td>回 复： <br/><span style="font-size:7px">(回文单位)</span></td><td colspan="3"><textarea name="reply_content" class="easyui-textbox" style="width:420px;height:150px;" data-options="multiline:true" /></td>
		</tr>
		<tr>
		<td></td><Td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok " onclick="dgl_savefrom()" style="width:90px">保存</a></td><td></td><td></td>
		</tr>
		</table>
	</div>
	<script type="text/javascript">
	$(function(){
		
		$('#dgl_list_table').datagrid({
			title:'工程联系函列表',
			width:850,
			height:450,
			pagination: true,
			singleSelect:true,
			rownumbers:true,
			fitColumns:false,
			idField:'id',
			url:'gongcheng_lianxi/get_gongcheng_lianxi.php',
			columns:[[
				{field:'project_name',title:'工程名称',width:180,align:'center'},
				
				{field:'towho',title:'To 致', width:100,align:'center'},
				{field:'file_code',title:'文件编号',width:100,align:'center'},
				{field:'contract_code',title:'合同编号',width:100,align:'center'},
				{field:'file_typ',title:'发文类型',width:100,align:'center',
					formatter:function(value,row,index){
						if(value==""){return "";};
						if(value==0){return "普通";};
						if(value==1){return "急件";};
						if(value==2){return "请回复";};
						if(value==3){return "请悉知";};
					}
				},
				{field:'action',title:'工程联系函明细', width:100,align:'center',
					formatter:function(value,row,index){
						var g = '<a href="javascript:void(0)" onclick="dgl_sheet_onclick('+row.id+')">详细</a> ';	
						return g;
					}
				},
				{field:'action2',title:'操作', width:100,align:'center',
					formatter:function(value,row,index){
						
							var d = '<a href="javascript:void(0)" onclick="dgl_deleterow('+row.id+')">删除</a>';
							return d;
							//return e;
						
						
					}
				}
			]]
			
		});
	});
	</script>
	<script type="text/javascript">
	var dgl_id;
	//删除选定行
		function dgl_deleterow(index){
			$('#dgl_list_table').datagrid('selectRecord',index);
			var row = $('#dgl_list_table').datagrid('getSelected');
			//alert(row.id);
			if (row){
				$.messager.confirm('确认','确定删除此记录吗?',function(r){
					
					if (r){
						$.post('gongcheng_lianxi/delete_gongcheng_lianxi.php',{id:row.id},function(result){
							if (result.success){
								
								$('#dgl_list_table').datagrid('reload');	// reload the user data
							} else {
								$.messager.show({	// show error message
									title: '错误',
									msg: result.errorMsg
								});
							}
						},'json');
					}
				});
			}
		}
		//新增
		function dgl_cn_new(){
			$('#dgl_new_form').form('submit',{
			url:"gongcheng_lianxi/insert_gongcheng_lianxi.php",
			onSubmit:function(result){
				return $(this).form('validate');
			},
			success:function(result){
				var result = eval('('+result+')');
				if(result.errorMsg){
					$.messager.show({
						title: '错误',
						msg: "新增失败！"
				
					});
				}else{
					$('#dgl_code').textbox('clear');
					$('#dgl_name').textbox('clear');
					$('#dgl_list_table').datagrid('reload');
				}
				
			}
			
		});
		}
		//打开工程联系函
		function dgl_sheet_onclick(index){
			
			$('#dgl_list_table').datagrid('selectRecord',index);
			var row = $('#dgl_list_table').datagrid('getSelected');
			if (row){
			
			$('#dgl_dgl_ffrom').form('load',row);
			$('#dgl_html_dlg').dialog('open').dialog('setTitle','工程联系函');
			dgl_id=index;
			}
		}
		//保存from
		function dgl_savefrom(){
			if($('#dgl_dgl_ffrom').form('validate')){
			
					$('#dgl_dgl_ffrom').form('submit',{
						url:"gongcheng_lianxi/update_gongcheng_lianxi.php?id="+dgl_id,
						onSubmit:function(){
						},success:function(result){
							console.log(result);
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
								
								$('#dgl_list_table').datagrid('reload');
								$('#dgl_html_dlg').dialog('close');
								
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
	</script>
	<style  type="text/css">

	</style>

</body>

</html>