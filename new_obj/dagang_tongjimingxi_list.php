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
	<form id="dtll_new_form">
	定单编号：<input id="dtll_code" name="sheet_code" class="easyui-textbox" style="width:160px" required="true"></input>
	表单名称：<input id="dtll_name" name="sheet_name" class="easyui-textbox" style="width:250px" required="true"></input>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add"  onclick="dtll_cn_new()" style="width:90px">新增</a>
	<form>
	</div>
	<table id="dtll_list_table" style="width:700px;height:500px;"></table>
	<div id="dtll_html_dlg"  class="easyui-dialog" style="width:1250px;height:580px;padding:center;" modal=true closed="true">
	<div style="padding:20px 20px">
	<table id ="dtll_tjmx_sheet_list" style="width:700px;height:400px;" ></table>
	</div>
	
	<div id="dtll_tjmx_sheet_toolbar2">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="dtll_tjmx_new()">新增</a>
	</div>
	</div>
	<script type="text/javascript">
	$(function(){
		$('#dtll_list_table').datagrid({
			title:'统计明细列表',
			width:650,
			height:450,
			pagination: true,
			singleSelect:true,
			rownumbers:true,
			fitColumns:false,
			idField:'id',
			url:'tongjimingxi_list/get_tongjimingxi_list.php',
			columns:[[
				{field:'sheet_code',title:'表单号',width:180,align:'center',editor:{type:'text'}},
				{field:'sheet_name',title:'表单名称', width:220,align:'center',editor:{type:'text'}},
				{field:'action',title:'工程统计明细', width:100,align:'center',
					formatter:function(value,row,index){
						var g = '<a href="javascript:void(0)" onclick="dtll_sheet_onclick('+row.id+')">详细</a> ';	
						return g;
					}
				},
				{field:'action2',title:'操作', width:100,align:'center',
					formatter:function(value,row,index){
						if (row.editing){
							var s = '<a href="javascript:void(0)" onclick="dtll_saverow(this)">保存</a> ';
							var c = '<a href="javascript:void(0)" onclick="dtll_cancelrow(this)">取消</a>';
							return s+c;
						} else {
							var e = '<a href="javascript:void(0)" onclick="dtll_editrow(this)">编辑</a> ';
							var d = '<a href="javascript:void(0)" onclick="dtll_deleterow('+row.id+')">删除</a>';
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
				dtll_savechanges(row);
				row.editing = false;
				$(this).datagrid('refreshRow', index);
			},
			onCancelEdit:function(index,row){
				row.editing = false;
				$(this).datagrid('refreshRow', index);
			}
		});
		$('#dtll_tjmx_sheet_list').datagrid({
				
				width:1200,
				height:500,
				pagination: false,
				singleSelect:true,
				rownumbers:true,
				fitColumns:false,
				idField:'id',
				showFooter: true,
				toolbar:'#dtll_tjmx_sheet_toolbar2',
				url:'',
				columns:[[
				{field:'block_no',title:'楼栋',rowspan:2, width:100,align:'center',editor:{type:'text'}},
				{field:'block_lev',title:'楼层',rowspan:2, width:100,align:'center',editor:{type:'text'}},
				{field:'mark_code',title:'标号',rowspan:2, width:100,align:'center',editor:{type:'text'}},
				{field:'door_code',title:'楼号',rowspan:2, width:100,align:'center',editor:{type:'text'}},
				{field:'zhi_code',title:'制号',rowspan:2, width:100,align:'center',editor:{type:'text'}},
				{field:'made_code',title:'制作依据',rowspan:2, width:100,align:'center',editor:{type:'text'}},
				{field:'fire_grade',title:'防火<br/>等级',rowspan:2, width:45,align:'center',
					formatter:function(value,row,index){
						if(value==0){return "";};
						if(value==1){return "甲";};
						if(value==2){return "乙";};
						if(value==3){return "丙";};
					},
					editor:{type:'combobox',
						options:{
								valueField: 'id',  
								textField: 'name',
								data:[{id:0,name:''},{id:1,name:'甲'},{id:2,name:'乙'},{id:3,name:'丙'}],
								editable: false
						}
					}
				},
				{field:'door_type',title:'门型类<br/>别',rowspan:2, width:80,align:'center',
					formatter:function(value,row,index){
						if(value==0){return "";};
						if(value==1){return "管井门";};
						if(value==2){return "机房门";};
						if(value==3){return "通道门";};
					},
					editor:{type:'combobox',
						options:{
								valueField: 'id',  
								textField: 'name',
								data:[{id:0,name:''},{id:1,name:'管井门'},{id:2,name:'机房门'},{id:3,name:'通道门'}],
								editable: false
						}
					}
				},
				{field:'location',title:'位置',rowspan:2, width:100,align:'center',editor:{type:'text'}},
				{field:'direction',title:'开向',rowspan:2, width:45,align:'center',
					editor:{type:'combobox',
						options:{
								valueField: 'id',  
								textField: 'name',
								data:[{id:'左',name:'左'},{id:'右',name:'右'}],
								editable: false
						}
					}
				},
				{field:'door_type2',title:'门扇类型',rowspan:2, width:100,align:'center',editor:{type:'text'}},
				{field:'qty',title:'数量<br/>（樘）',rowspan:2, width:100,align:'center',formatter:function(value, row){if(value==0){return '';}else{return value;}},editor:{type:'numberbox'}},
				{title:"设计尺寸",colspan:2},{title:"问题洞口尺寸",colspan:2},{title:"门框尺寸",colspan:2},
				{field:'xiakan',title:'下槛',rowspan:2, width:50,align:'center',formatter:function(value, row){if (value==0) {return '';} else if(value==1){return '有';}},editor:{type:'checkbox',options:{on:'1',off:'0'}}},
				{field:'xiamai',title:'下埋',rowspan:2, width:50,align:'center',formatter:function(value, row){if(value==0){return '';}else{return value;}},editor:{type:'numberbox'}},
				{title:"门框尺寸",colspan:7},
				{field:'note',title:'备注',rowspan:2, width:100,align:'center',editor:{type:'text'}},
				
				
				{field:'action',title:'操作',rowspan:2,width:80,align:'center',
						formatter:function(value,row,index){
							if(row.action==1){
								return ""
							}else{
							if (row.editing){
								var s = '<a href="javascript:void(0)" onclick="dtll_tjmx_saverow(this)">保存</a> ';
								var c = '<a href="javascript:void(0)" onclick="dtll_tjmx_cancelrow(this)">取消</a>';
								return s+c;
							} else {
								var e = '<a href="javascript:void(0)" onclick="dtll_tjmx_editrow(this)">编辑</a> ';
								var d = '<a href="javascript:void(0)" onclick="dtll_tjmx_deleterow('+row.id+')">删除</a>';
								return e+d;
								//return e;
							}
							}
						}
				}
				],[
				{field:'design_width',title:'宽度',rowspan:1, width:50,align:'center',formatter:function(value, row){if(value==0){return '';}else{return value;}},editor:{type:'numberbox'}},
				{field:'design_height',title:'高度',rowspan:1, width:50,align:'center',formatter:function(value, row){if(value==0){return '';}else{return value;}},editor:{type:'numberbox'}},
				{field:'qus_width',title:'宽度',rowspan:1, width:50,align:'center',formatter:function(value, row){if(value==0){return '';}else{return value;}},editor:{type:'numberbox'}},
				{field:'qus_height',title:'高度',rowspan:1, width:50,align:'center',formatter:function(value, row){if(value==0){return '';}else{return value;}},editor:{type:'numberbox'}},
				{field:'door_frame_width',title:'宽度',rowspan:1, width:50,align:'center',formatter:function(value, row){if(value==0){return '';}else{return value;}},editor:{type:'numberbox'}},
				{field:'door_frame_height',title:'高度',rowspan:1, width:50,align:'center',formatter:function(value, row){if(value==0){return '';}else{return value;}},editor:{type:'numberbox'}},
				{field:'fanghuo_lock',title:'防火<br/>锁',rowspan:1, width:50,align:'center',formatter:function(value, row){if(value==0){return '';}else{return value;}},editor:{type:'numberbox'}},
				{field:'guanjing_lock',title:'管井<br/>锁',rowspan:1, width:50,align:'center',formatter:function(value, row){if(value==0){return '';}else{return value;}},editor:{type:'numberbox'}},
				{field:'heye',title:'合叶',rowspan:1, width:50,align:'center',formatter:function(value, row){if(value==0){return '';}else{return value;}},editor:{type:'numberbox'}},
				{field:'bimenqi',title:'闭门<br/>器',rowspan:1, width:50,align:'center',formatter:function(value, row){if(value==0){return '';}else{return value;}},editor:{type:'numberbox'}},
				{field:'chaxiao',title:'插销',rowspan:1, width:50,align:'center',formatter:function(value, row){if(value==0){return '';}else{return value;}},editor:{type:'numberbox'}},
				{field:'shuxuqi',title:'顺序<br/>器',rowspan:1, width:50,align:'center',formatter:function(value, row){if(value==0){return '';}else{return value;}},editor:{type:'numberbox'}},
				{field:'boli',title:'玻璃',rowspan:1, width:50,align:'center',formatter:function(value, row){if(value==0){return '';}else{return value;}},editor:{type:'numberbox'}}
	
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
					dtll_tjmx_savechanges(row);
					row.editing = false;
					$(this).datagrid('refreshRow', index);
					
				},
				onCancelEdit:function(index,row){
					row.editing = false;
					$(this).datagrid('refreshRow', index);
				}
			
		});
		
	});
	var dtll_r=0;
	var dtll_tjmx_r=0;
	//获取行信息-表
		function dtll_getRowIndex(target){
			var tr = $(target).closest('tr.datagrid-row');
			return parseInt(tr.attr('datagrid-row-index'));
		}
	//获取行信息-单
	function dtll_tjmx_getRowIndex(target){
		var tr = $(target).closest('tr.datagrid-row');
		return parseInt(tr.attr('datagrid-row-index'));
	}
		//修改行信息-表
		function dtll_editrow(target){
			
			if(dtll_r>0){return;};
			dtll_r=1;
			$('#dtll_list_table').datagrid('beginEdit', dtll_getRowIndex(target));
		}
		//修改行信息-单
		function dtll_tjmx_editrow(target){
			
			if(dtll_tjmx_r>0){return;};
			dtll_tjmx_r=1;
			$('#dtll_tjmx_sheet_list').datagrid('beginEdit', dtll_tjmx_getRowIndex(target));
		}
		//删除选定行-表
		function dtll_deleterow(index){
			$('#dtll_list_table').datagrid('selectRecord',index);
			var row = $('#dtll_list_table').datagrid('getSelected');
			//alert(row.id);
			if (row){
				$.messager.confirm('确认','确定删除此记录吗?',function(r){
					if (r){
						$.post('tongjimingxi_list/delete_tongjimingxi_list.php',{id:row.id},function(result){
							//console.log(result);
							if (result.success){
								$('#dtll_list_table').datagrid('reload');	// reload the user data
							} else {
								$.messager.show({	// show error message
									title: '错误！',
									msg: result.errorMsg
								});
							}
						},'json');
					}
				});
			}
		}
		//删除选定行-单
		function dtll_tjmx_deleterow(index){
			$('#dtll_tjmx_sheet_list').datagrid('selectRecord',index);
			var row = $('#dtll_tjmx_sheet_list').datagrid('getSelected');
			//alert(row.id);
			if (row){
				$.messager.confirm('确认','确定删除此记录吗?',function(r){
					if (r){
						$.post('tongjimingxi_list/delete_tongjimingxi_sheet.php',{id:row.id},function(result){
							//console.log(result);
							if (result.success){
								$('#dtll_tjmx_sheet_list').datagrid('reload');	// reload the user data
							} else {
								$.messager.show({	// show error message
									title: '错误！',
									msg: result.errorMsg
								});
							}
						},'json');
					}
				});
			}
		}
		
		//保存选定行
		function dtll_saverow(target){		
			$('#dtll_list_table').datagrid('endEdit', dtll_getRowIndex(target));
		}
		//保存选定行
		function dtll_tjmx_saverow(target){		
			$('#dtll_tjmx_sheet_list').datagrid('endEdit', dtll_tjmx_getRowIndex(target));
		}
		//取消选择
		function dtll_cancelrow(target){
			$('#dtll_list_table').datagrid('cancelEdit', dtll_getRowIndex(target));
			dtll_r=0;
		}
		//取消选择
		function dtll_tjmx_cancelrow(target){
			$('#dtll_tjmx_sheet_list').datagrid('cancelEdit', dtll_tjmx_getRowIndex(target));
			dtll_tjmx_r=0;
		}
		//ajax数据改变提交-表
		function dtll_savechanges(row)
        {     
						
            $.ajax({
			    type: "POST",
				contentType: "application/json; charset=utf-8",	
                url: "tongjimingxi_list/update_tongjimingxi_list.php",
                dataType: "json",				
                data: JSON.stringify(row),                
                success: function (text) {
			
			//console.log(text);
					$('#dtll_list_table').datagrid('reload');
				dtll_r=0;
                        //$.Messager.alert ('message', 'text', 'info'); 										
                    },
				error: function(text){
					
					$('#dtll_list_table').datagrid('reload');
				dtll_r=0;
				}
            });
        }
		//ajax数据改变提交-单
		function dtll_tjmx_savechanges(row)
        {     
						
            $.ajax({
			    type: "POST",
				contentType: "application/json; charset=utf-8",	
                url: "tongjimingxi_list/update_tongjimingxi_sheet_list.php",
                dataType: "json",				
                data: JSON.stringify(row),                
                success: function (text) {
			
			console.log(text);
					$('#dtll_tjmx_sheet_list').datagrid('reload');
				dtll_tjmx_r=0;
                        //$.Messager.alert ('message', 'text', 'info'); 										
                    },
				error: function(text){
					console.log(text);
					$('#dtll_tjmx_sheet_list').datagrid('reload');
				dtll_tjmx_r=0;
				}
            });
        }
	</script>
	<script type="text/javascript">
	//新增-表
	function dtll_cn_new(){
		$('#dtll_new_form').form('submit',{
			url:"tongjimingxi_list/insert_tongjimingxi_list.php",
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
					$('#dtll_code').textbox('clear');
					$('#dtll_name').textbox('clear');
					$('#dtll_list_table').datagrid('reload');
				}
				
			}
			
		});
	}
	var dtll_id;
	//详情
	function dtll_sheet_onclick(index){
		dtll_id=index;
		var url = "tongjimingxi_list/get_tongjimingxi_sheet.php?idd="+index;
		
		$('#dtll_tjmx_sheet_list').datagrid('reload',url);
		$('#dtll_html_dlg').dialog('open').dialog('setTitle','工程统计明细表');
	}
	//新增-单
	function dtll_tjmx_new(){
		$.ajax({
                 type: "POST",
                 url: "tongjimingxi_list/insert_tongjimingxi_sheet.php?idd="+dtll_id,				
                 contentType: "application/json; charset=utf-8",
                 dataType: "json",
                 success:function(result){
					//console.log(result);
					$('#dtll_tjmx_sheet_list').datagrid('reload');
				 }
			
		});
		
	}
	</script>
	<style  type="text/css">

	</style>
</body>
	

</html>