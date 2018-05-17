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
	<form id="dcl_new_form">
	合同编号：<input id="dcl_code" name="contract_code" class="easyui-textbox" style="width:160px" required="true"></input>
	工程名称：<input id="dcl_name" name="project_name" class="easyui-textbox" style="width:200px" required="true"></input>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add"  onclick="dcl_cl_new()" style="width:90px">新增</a>
	</form>
	</div>
	<table id="dcl_contract_list"  style="width:1000px;height:400px" ></table>
	
	<div id="dcl_toolbar2">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="dcl_cil_new()">新增</a>
	</div>
	<script type="text/javascript">
	$(function(){
			
			$('#dcl_contract_list').datagrid({
				title:'合同通知单列表',
				
				height:360,
				pagination: true,
				singleSelect:true,
				rownumbers:true,
				fitColumns:false,
				idField:'id',
				
				url:'dagang_contract/get_contract_list.php',
				columns:[[
				//{field:'id',title:'id', width:80,align:'center'},
				//{field:'sign_dt',title:'签订时间', width:80,align:'center'},
				{field:'contract_code',title:'合同编号', width:100,align:'center'},
				{field:'project_name',title:'工程名称', width:160,align:'center'},
				{field:'jiaohuo_dt',title:'交货时间', width:80,align:'center'},
				{field:'jianshe_team',title:'建设单位', width:160,align:'center'},
				{field:'sales_name',title:'销售人员', width:80,align:'center'},
				//{field:'project_addr',title:'工程地址', width:80,align:'center'},
				//{field:'project_contact',title:'工程联系人', width:80,align:'center'},
				//{field:'_note',title:'说明', width:80,align:'center'},
				//{field:'tech_sign',title:'技术员签字', width:80,align:'center'},
				//{field:'cons_sign',title:'签字', width:80,align:'center'},
				//{field:'fini_sign',title:'签字', width:80,align:'center'},
				//{field:'tech_dt',title:'签字时间', width:80,align:'center'},
				//{field:'cons_dt',title:'签字时间', width:80,align:'center'},
				//{field:'fini_dt',title:'签字时间', width:80,align:'center'},
				//{field:'made_person',title:'制作人', width:80,align:'center'},
				//{field:'check_person',title:'检测人员', width:80,align:'center'},
				//{field:'approve_person',title:'批准人员', width:80,align:'center'}
				{field:'action1',title:'',width:80,align:'center',
					formatter:function(value,row,index){
							var g = '<a href="javascript:void(0)" onclick="dcl_zhanshi_onclick('+row.id+')">详细</a> ';
							
							return g;
						
						
					}
				
				},
					{field:'action3',title:'',width:80,align:'center',
					formatter:function(value,row,index){
							var g = '<a href="javascript:void(0)" onclick="dcl_zhanshi_onclick('+row.id+')">讨论</a> ';
							
							return g;
						
						
					}
				
				},
					{field:'action4',title:'',width:80,align:'center',
					formatter:function(value,row,index){
							var g = '<a href="javascript:void(0)" onclick="dcl_zhanshi_onclick('+row.id+')">提交</a> ';
							
							return g;
						
						
					}
				
				},
				{field:'action2',title:'',width:80,align:'center',
					formatter:function(value,row,index){
							
							var f = '<a href="javascript:void(0)" onclick="dcl_cl_deleterow('+row.id+')">删除</a>';
							return f;
						
						
					}
				
				}
				]]
			});
			$('#dcl_product_information').datagrid({
				url:"",
				title:"产品信息",
                width:700,
                height:250,  
                fitColumns:false,
				rownumbers:true,
                singleSelect:true,
                showFooter: true,
				idField:'id',
				toolbar:'#dcl_toolbar2',
                columns:[[
				{field:'product_name',title:'产品名称',width:320,height:200,align:'center',editor:{type:'text'}},
				{field:'product_qty',title:'数量',width:120,align:'center',editor:{type:'numberbox'}},
				{field:'product_note',title:'备注',width:120,align:'center',editor:{type:'text'}},
				{field:'action',title:'操作',width:100,align:'center',
					formatter:function(value,row,index){
						if(value){
							return "";
						}else{
						if(row.editing){
							var s = '<a href="javascript:void(0)" onclick="dcl_saverow(this)">保存</a> ';
							var c = '<a href="javascript:void(0)" onclick="dcl_cancelrow(this)">取消</a>';
							return s+c;
						}else{
							var a = '<a href="javascript:void(0)" onclick="dcl_editrow(this)">编辑</a>&nbsp;&nbsp;';
							var b = '<a href="javascript:void(0)" onclick="dcl_deleterow('+row.id+')">删除</a>';
							return a+b;
						}
						
					}
					}
				}
				]],
				onEndEdit:function(index,row){
					var ed = $(this).datagrid('getEditor', {
						index: index,
						field: 'id'
					});
								  
					//row.name = $(ed.target).combobox('getText');
				},
				onBeforeEdit:function(index,row){
					row.editing = true;
					$(this).datagrid('refreshRow', index);
				},
				onAfterEdit:function(index,row){	
		    
					dcl_savechanges(index,row);
					row.editing = false;
					$(this).datagrid('refreshRow', index);
					
					
				},
				onCancelEdit:function(index,row){
					row.editing = false;
					$(this).datagrid('refreshRow', index);
				}	
			});	
	});
	
	</script>
	
	
	<div id="dcl_contract_dlg" class="easyui-dialog" style="width:860px;height:600px;padding:20px 50px" closed="true" modal="true">
	<div class="easyui-panel" title="合同通知单" style="width:760px;height:270px;padding:20px 20px;">
	<form id="dcl_dcl_ffrom" class="easyui-form" method="post">
	    <table style="width:700px">
	    <tr>
		<td>签订时间: </td><td> <input name="sign_dt" class="easyui-datebox" style="width:220px;" required="true" editable=false/></td><td>合同编号:</td><td> <input name="contract_code" class="easyui-textbox" style="width:220px;" required="true"/></td>
		</tr>
		<tr>
		<td>工程名称:</td><td> <input name="project_name" class="easyui-textbox" style="width:220px;" required="true"/></td><td>交货日期:</td><td> <input name="jiaohuo_dt" class="easyui-datebox" style="width:220px;" required="true" editable=false/></td><td>
		</tr>
		<tr>
		<Td>建设单位: </td><td><input name="jianshe_team" class="easyui-textbox" style="width:220px;" /></td><td>销售人员: </td><td><input name="sales_name" class="easyui-textbox" style="width:220px;"/></td><td>
		</tr>
		<tr>
		<td>工程地址: </td><td><input name="project_addr" class="easyui-textbox" style="width:220px;" /></td><td>工程联系人:</td><td> <input name="project_contact" class="easyui-textbox" style="width:220px;" /></td><td>
		</tr>
		<tr>
		<td>备注:</td><td colspan="3"> <input name="_note" class="easyui-textbox" style="width:420px;height:50px;"  data-options="multiline:true" /></td>
		</tr>
		<tr>
		<td>说明: </td><td colspan="3"><input name="_note2" class="easyui-textbox" style="width:420px;height:50px;" data-options="multiline:true" /></td>
		</tr>
		<tr>
		<td></td><Td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok " onclick=" dcl_savefrom()" style="width:90px">保存</a></td><td></td><td></td>
		</tr>
		</table>
	</form >
	</div>
	<br/>
	<table id ="dcl_product_information" ></table>
	<form id="dcl_pi_form"></form>
	</div>
	<script type="text/javascript">	
	var cl_id;
	
	function dcl_zhanshi_onclick(index){
		$('#dcl_contract_list').datagrid('selectRecord',index);
		var row = $('#dcl_contract_list').datagrid('getSelected');
		if (row){
			var url = "dagang_contract/get_contract_information.php?id="+row.id;
			$('#dcl_dcl_ffrom').form('load',row);
			$('#dcl_product_information').datagrid('reload',url);
			$('#dcl_pi_form').form('submit',{
				url:url,
				onSubmit:function(){
					
				
				},
				success:function(result){
				console.log(result);
				
			}
				
			});
			$('#dcl_contract_dlg').dialog('open').dialog('setTitle','编辑');
			cl_id=row.id;
		}
	}
	
	//新增一条合同
	function dcl_cl_new(){
		
		$('#dcl_new_form').form('submit',{
			url:'dagang_contract/insert_contract.php',
			onSubmit:function(){
				return $(this).form('validate');
				
			},
			success:function(result){
			//console.log(result);
				$('#dcl_code').textbox('clear');
				$('#dcl_name').textbox('clear');
				$('#dcl_contract_list').datagrid('reload','dagang_contract/get_contract_list.php');
			}
		});
		
		
	}
	//新增一条产品
	function dcl_cil_new(){
		//alert(cl_id);
		//var url="dagang_contract/insert_ci_list.php?name=12";
		//$('#dcl_pi_form').form('submit',{
		//		url:url,
		//		onSubmit:function(){
		//		//return $(this).form('validate');
		//		},
		//		success:function(result){
		//			
		//		}
		//	});
		
		$.ajax({
                 type: "POST",
                 url: "dagang_contract/insert_ci_list.php?id="+cl_id,				
                 contentType: "application/json; charset=utf-8",
                 dataType: "json",
                 success:function(result){
					console.log(result);
				$('#dcl_product_information').datagrid('reload');
				 }
			
		});
		
	
		
	}
	//保存修改的from
	function dcl_savefrom(){
		//alert(cl_id);
		$('#dcl_dcl_ffrom').form('submit',{
			url:'dagang_contract/update_contract_information.php?id='+cl_id,
			onSubmit:function(){
				return $(this).form('validate');
				
			},
			success:function(result){
			console.log(result);
				$('#dcl_contract_list').datagrid('reload','dagang_contract/get_contract_list.php');
			}
		});
		
	}
	//详图的修改
	var dcl_r=0;
		//获取行
		function dcl_getRowIndex(target){
			var tr = $(target).closest('tr.datagrid-row');
			return parseInt(tr.attr('datagrid-row-index'));
		}
		//编辑行
		function dcl_editrow(target){
			if(dcl_r>0){return;}
				dcl_r=1;
				$('#dcl_product_information').datagrid('beginEdit', dcl_getRowIndex(target));
			}
		//删除行
		function dcl_deleterow(index){
			$('#dcl_product_information').datagrid('selectRecord',index);
			var row = $('#dcl_product_information').datagrid('getSelected');
			
			if (row){
				$.messager.confirm('确认','确定删除此记录吗?',function(r){
					if (r){
						$.post('dagang_contract/delete_ci_list.php',{id:row.id},function(result){
							if (result.success){
								$('#dcl_product_information').datagrid('reload');	// reload the user data
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
		//删除选定行
		function dcl_cl_deleterow(index){
			
			$('#dcl_contract_list').datagrid('selectRecord',index);
			var row = $('#dcl_contract_list').datagrid('getSelected');
			
			if (row){
				$.messager.confirm('确认','确定删除此记录吗?',function(r){
					if (r){
						$.post('dagang_contract/delete_contract.php',{id:row.id},function(result){
							if (result.success){
								$('#dcl_contract_list').datagrid('reload');	// reload the user data
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
		//保存行
		function dcl_saverow(target){
		     
					
			$('#dcl_product_information').datagrid('endEdit', dcl_getRowIndex(target));
		}
		
		
		//详图的取消
		function dcl_cancelrow(target){
			$('#dcl_product_information').datagrid('cancelEdit', dcl_getRowIndex(target));
			dcl_r=0;
		}
		function dcl_savechanges(index,row)
		
        {     
		
            $.ajax({
			    type: "POST",
				contentType: "application/json; charset=utf-8",	
                url: "dagang_contract/update_contract_from.php",
                dataType: "json",				
                data: JSON.stringify(row),                
                success: function (result) { 
				//console.log(result);
				$('#dcl_product_information').datagrid('reload');
				dcl_r=0;
                        //$.Messager.alert ('message', 'text', 'info'); 										
                    }	,
				error: function(result){
					console.log(result);
					$('#dcl_product_information').datagrid('reload');
					dcl_r=0
				}
            });
        }
</script>
<style  type="text/css">

</style>
</style>
</body>



</html>