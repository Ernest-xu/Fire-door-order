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
	<form id="dsl_new_form">
	定单编号：<input id="dsl_code" name="project_code" class="easyui-textbox" style="width:160px" required="true"></input>
	工程名称：<input id="dsl_name" name="project_name" class="easyui-textbox" style="width:200px" required="true"></input>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add"  onclick="dsl_cn_new()" style="width:90px">新增</a>
	<form>
	</div>
	<table id="dsl_list_table" style="width:700px;height:400px;"></table>
	<div id="dsl_html_dlg"  class="easyui-dialog" style="width:1250px;height:580px;padding:center;" modal=true closed="true"></div>
	<script type="text/javascript">
	$(function(){
		$('#dsl_list_table').datagrid({
			title:'生产单',
			width:600,
			height:300,
			pagination: true,
			singleSelect:true,
			rownumbers:true,
			fitColumns:false,
			idField:'id',
			url:'shengchan_sheet/get_shengchan_list.php',
			columns:[[
				{field:'project_code',title:'订单编号',width:100,align:'center',editor:{type:'text'}},
				{field:'project_name',title:'工程名称', width:100,align:'center',editor:{type:'text'}},
				{field:'action',title:'生产单', width:100,align:'center',
					formatter:function(value,row,index){
						var g = '<a href="javascript:void(0)" onclick="dsl_sheet_onclick('+row.id+')">详细</a> ';	
						return g;
					}
				},
				{field:'action1',title:'物料单', width:100,align:'center',
					formatter:function(value,row,index){
						var g = '<a href="javascript:void(0)" onclick="dsl_zhanshi_onclick('+row.id+')">详细</a> ';	
						return g;
					}
				},
				{field:'action2',title:'操作', width:100,align:'center',
					formatter:function(value,row,index){
						if (row.editing){
							var s = '<a href="javascript:void(0)" onclick="dsl_saverow(this)">保存</a> ';
							var c = '<a href="javascript:void(0)" onclick="dsl_cancelrow(this)">取消</a>';
							return s+c;
						} else {
							var e = '<a href="javascript:void(0)" onclick="dsl_editrow(this)">编辑</a> ';
							var d = '<a href="javascript:void(0)" onclick="dsl_deleterow('+row.id+')">删除</a>';
							return e+d;
							//return e;
						}
						
					}
				}
			]],
			onEndEdit:function(index,row){
				var ed = $(this).datagrid('getEditor', {
					index: index,
					field: 'id'
				});
			},
			onBeforeEdit:function(index,row){
				row.editing = true;
				$(this).datagrid('refreshRow', index);
			},
			onAfterEdit:function(index,row){				    
				dsl_savechanges(row);
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
	<script type="text/javascript">
	var dsl_r=0;
	var dsl_id;
	var dsl_name;
	var dsl_code;
	//新增
	function dsl_cn_new(){
		$('#dsl_new_form').form('submit',{
			url:"shengchan_sheet/insert_shengchan_list.php",
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
					$('#dsl_code').textbox('clear');
					$('#dsl_name').textbox('clear');
					$('#dsl_list_table').datagrid('reload');
				}
				
			}
			
		});
	}
	//获取行信息
		function dsl_getRowIndex(target){
			var tr = $(target).closest('tr.datagrid-row');
			return parseInt(tr.attr('datagrid-row-index'));
		}
		//修改行信息
		function dsl_editrow(target){
			if(dsl_r>0){return;}
			dsl_r=1;
			$('#dsl_list_table').datagrid('beginEdit', dsl_getRowIndex(target));
		}
		//删除选定行
		function dsl_deleterow(index){
			$('#dsl_list_table').datagrid('selectRecord',index);
			var row = $('#dsl_list_table').datagrid('getSelected');
			//alert(row.id);
			if (row){
				$.messager.confirm('确认','确定删除此记录吗?',function(r){
					
					if (r){
						$.post('shengchan_sheet/delete_shengchan_list.php',{id:row.id},function(result){
							if (result.success){
								
								$('#dsl_list_table').datagrid('reload');	// reload the user data
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
		//保存选定行
		function dsl_saverow(target){		
			$('#dsl_list_table').datagrid('endEdit', dsl_getRowIndex(target));
		}
		//取消选择
		function dsl_cancelrow(target){
			$('#dsl_list_table').datagrid('cancelEdit', dsl_getRowIndex(target));
			dsl_r=0;
		}
		//ajax数据改变提交
		function dsl_savechanges(row)
        {     
						
            $.ajax({
			    type: "POST",
				contentType: "application/json; charset=utf-8",	
                url: "shengchan_sheet/update_shengchan_list.php",
                dataType: "json",				
                data: JSON.stringify(row),                
                success: function (text) {
			
					$('#dsl_list_table').datagrid('reload');
				dsl_r=0;
                        //$.Messager.alert ('message', 'text', 'info'); 										
                    },
				error: function(text){
					
					$('#dsl_list_table').datagrid('reload');
				dsl_r=0;
				}
            });
        }
		//弹出sheet的dialg
		function dsl_sheet_onclick(index){
			dsl_id=index;
			$('#dsl_list_table').datagrid('selectRecord',index);
			var row = $('#dsl_list_table').datagrid('getSelected');
			dsl_code=row.project_code;
			dsl_name = row.project_name;
			
			$('#dsl_html_dlg').dialog({
				title:'生产单详情',
				width:1250,
				height:580,
				modal:true,
				content:"<iframe scrolling='auto' frameborder='0' src='dagang_shengchan_sheet.php' style='width:100%;height:100%;'></iframe>"
			});
		$('#dsl_html_dlg').dialog('open');
		}
		
	</script>
	<style  type="text/css">

	</style>
</body>


</html>