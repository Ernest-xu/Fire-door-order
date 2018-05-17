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
	<form id="dsgs_new_form">
	生产单号：<input id="dsgs_code" name="shengchan_sheet_no" class="easyui-textbox" style="width:160px" required="true"></input>
	项目名称：<input id="dsgs_name" name="project_name" class="easyui-textbox" style="width:200px" required="true"></input>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add"  onclick="dsgs_data_new()" style="width:90px">新增</a>
	</form>
	</div>
	<table id="dsgs_songhuo_table"  style="width:600px;height:400px" ></table>
	<div id="dsgs_contract_dlg" class="easyui-dialog" style="width:860px;height:600px;padding:20px 50px" closed="true" modal="true">
	<div class="easyui-panel" title="送货单" style="width:760px;height:261px;padding:20px 20px;">
	<form id="dsgs_dsgs_ffrom" class="easyui-form" method="post">
	    <table style="width:700px">
	    <tr>
		<td>负责人: </td><td> <input name="fuzeren" class="easyui-textbox" style="width:220px;" required="true" /></td><td colspan=1>项目名称:</td><td > <input name="project_name" class="easyui-textbox" style="width:220px;" required="true"/></td>
		</tr>
		<tr>
		<td>生产单号:</td><td> <input name="shengchan_sheet_no" class="easyui-textbox" style="width:220px;" required="true"/></td><td colspan=1>联系电话: </td><td ><input name="contact_tel" class="easyui-textbox" style="width:220px;" required="true"/></td>
		</tr>
		<tr>
		<td>送货时间:</td><td> <input name="songhuo_dt" class="easyui-datebox" style="width:220px;" required="true" editable=false/></td><td colspan=1>收货人: </td><td ><input name="shouhuoren" class="easyui-textbox" style="width:220px;" required="true"/></td>
		</tr>
		<tr>
		<td>司机: </td><td><input name="car_driver" class="easyui-textbox" style="width:220px;" required="true"/></td><td >车牌号:</td><td> <input name="car_num" class="easyui-textbox" style="width:220px;"required="true" /></td><td>
		</tr>
		<tr>
			<td colspan=1><dt style="font-size:12px;">地址：</dt></td><td colspan=5><input  name="address" style="width:400px;" class="easyui-textbox" required="true"></input></td>

		</tr>

		<tr>
		<td></td><Td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok " onclick=" dsgs_savefrom()" style="width:90px">保存</a></td><td></td><td></td>
		</tr>
		</table>
	</form >
	</div>
	<br/>
	<table id ="dsgs_songhuo_list" ></table>
	<div id="dsgs_toolbar2">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="dsgs_sheet_new()">新增</a>
	</div>
	<div>
	<script type="text/javascript">
	$(function(){
		$('#dsgs_songhuo_table').datagrid({
				title:'送货列表',
				
				height:360,
				pagination: true,
				singleSelect:true,
				rownumbers:true,
				fitColumns:false,
				idField:'id',
				
				url:'songhuo_sheet/get_songhuo_sheet.php',
				columns:[[
				{field:'shengchan_sheet_no',title:'生产单号', width:150,align:'center'},
				{field:'project_name',title:'项目名称', width:200,align:'center'},
				{field:'action1',title:'',width:80,align:'center',
					formatter:function(value,row,index){
							var g = '<a href="javascript:void(0)" onclick="dsgs_songhuo_onclick('+row.id+')">详细</a> ';
							return g;
					}
				},
				{field:'action2',title:'',width:80,align:'center',
					formatter:function(value,row,index){
							
							var f = '<a href="javascript:void(0)" onclick="dsgs_songhuo_deleterow('+row.id+')">删除</a>';
							return f;

					}
				
				}
				]]
		});
		$('#dsgs_songhuo_list').datagrid({
				
				width:760,
				height:250,
				pagination: false,
				singleSelect:true,
				rownumbers:true,
				fitColumns:false,
				idField:'id',
				showFooter: true,
				toolbar:'#dsgs_toolbar2',
				url:'',
				columns:[[
				{field:'zhi_code',title:'制号',rowspan:2, width:100,align:'center',editor:{type:'text'}},
				{field:'open_direction',title:'开向',rowspan:2, width:45,align:'center',
					editor:{type:'combobox',
						options:{
								valueField: 'id',  
								textField: 'name',
								data:[{id:'左',name:'左'},{id:'右',name:'右'}],
								editable: false
						}
					}
				},
				{field:'menkuang_qty',title:'门框<br/>数量',rowspan:2, width:60,align:'center',editor:{type:'numberbox'}},
				{field:'menshan_qty',title:'门扇<br/>数量',rowspan:2, width:60,align:'center',editor:{type:'numberbox'}},
				{field:'fire_degree',title:'等级',rowspan:2, width:45,align:'center',
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
				{field:'tuzhi_size',title:'图纸<br/>规格',rowspan:2, width:80,align:'center',editor:{type:'text'}},
				{field:'product_typ',title:'类别',rowspan:2, width:80,align:'center',editor:{type:'text'}},
				{title:"设计尺寸",colspan:2},
				{field:'fanghuo_lock',title:'防火锁<br/>（把）',rowspan:2, width:70,formatter:function(value, row){if(value==0){return '';}else{return value;}},align:'center',editor:{type:'numberbox'}},
				{field:'guanjing_lock',title:'管井锁<br/>（把）',rowspan:2, width:70,formatter:function(value, row){if(value==0){return '';}else{return value;}},align:'center',editor:{type:'numberbox'}},
				{field:'heye',title:'合叶<br/>（只）',rowspan:2, width:70,formatter:function(value, row){if(value==0){return '';}else{return value;}},align:'center',editor:{type:'numberbox'}},
				{field:'bimenqi',title:'闭门器<br/>（台）',rowspan:2, width:70,formatter:function(value, row){if(value==0){return '';}else{return value;}},align:'center',editor:{type:'numberbox'}},
				{field:'shunweiqi',title:'顺位器<br/>（支）',rowspan:2, width:70,formatter:function(value, row){if(value==0){return '';}else{return value;}},align:'center',editor:{type:'numberbox'}},
				{field:'M6X10',title:'M6×10<br/>螺钉<br/>（个）',rowspan:2, width:70,formatter:function(value, row){if(value==0){return '';}else{return value;}},align:'center',editor:{type:'numberbox'}},
				{field:'note',title:'备注',rowspan:2, width:100,align:'center',editor:{type:'text'}},
				{field:'action',title:'操作',rowspan:2,width:80,align:'center',
						formatter:function(value,row,index){
							if(row.action==1){
								return ""
							}else{
							if (row.editing){
								var s = '<a href="javascript:void(0)" onclick="dsgs_saverow(this)">保存</a> ';
								var c = '<a href="javascript:void(0)" onclick="dsgs_cancelrow(this)">取消</a>';
								return s+c;
							} else {
								var e = '<a href="javascript:void(0)" onclick="dsgs_editrow(this)">编辑</a> ';
								var d = '<a href="javascript:void(0)" onclick="dsgs_deleterow('+row.id+')">删除</a>';
								return e+d;
								//return e;
							}
							}
						}
				}
				],[
				{field:'width',title:'宽',rowspan:1, width:60,align:'center',editor:{type:'numberbox'}},
				{field:'height',title:'高',rowspan:1, width:60,align:'center',editor:{type:'numberbox'}}
				
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
					dsgs_savechanges(row);
					row.editing = false;
					$(this).datagrid('refreshRow', index);
					
				},
				onCancelEdit:function(index,row){
					row.editing = false;
					$(this).datagrid('refreshRow', index);
				}
			
		});
	});
	var dsgs_id;
	function dsgs_songhuo_onclick(index){
		$('#dsgs_songhuo_table').datagrid('selectRecord',index);
		var row = $('#dsgs_songhuo_table').datagrid('getSelected');
		
		if (row){
			var url = "songhuo_sheet/get_songhuo_sheet_data.php?idd="+row.id;
			$('#dsgs_dsgs_ffrom').form('load',row);
			$('#dsgs_songhuo_list').datagrid('reload',url);
			//$('#dcl_pi_form').form('submit',{
			//	url:url,
			//	onSubmit:function(){
					
				
			//	},
			//	success:function(result){
			//	console.log(result);
				
			//}
				
			//});
			$('#dsgs_contract_dlg').dialog('open').dialog('setTitle','详细');
			dsgs_id=row.id;
		}
	}
	//新增送货单
	function dsgs_data_new(){
		$('#dsgs_new_form').form('submit',{
			url:'songhuo_sheet/insert_songhuo_sheet.php',
			onSubmit:function(){
				return $(this).form('validate');
				
			},
			success:function(result){
			//console.log(result);
			
				$('#dsgs_code').textbox('clear');
				$('#dsgs_name').textbox('clear');
				$('#dsgs_songhuo_table').datagrid('reload');
			}
		});
	}
	//新增货物
	function dsgs_sheet_new(){
		$.ajax({
                 type: "POST",
                 url: "songhuo_sheet/insert_songhuo_sheet_data.php?idd="+dsgs_id,				
                 contentType: "application/json; charset=utf-8",
                 dataType: "json",
                 success:function(result){
					//console.log(result);
					$('#dsgs_songhuo_list').datagrid('reload');
				 }
			
		});
	}
	var dsgs_r;
	//获取行信息
		function dsgs_getRowIndex(target){
			var tr = $(target).closest('tr.datagrid-row');
			return parseInt(tr.attr('datagrid-row-index'));
		}
		//修改行信息
		function dsgs_editrow(target){
			if(dsgs_r>0){return;}
			dsgs_r=1;
			$('#dsgs_songhuo_list').datagrid('beginEdit', dsgs_getRowIndex(target));
		}
		//删除选定行
		function dsgs_deleterow(index){
			$('#dsgs_songhuo_list').datagrid('selectRecord',index);
			var row = $('#dsgs_songhuo_list').datagrid('getSelected');
			//alert(row.id);
			if (row){
				$.messager.confirm('确认','确定删除此记录吗?',function(r){
					if (r){
						$.post('./songhuo_sheet/delete_songhuo_sheet_data.php',{id:row.id},function(result){
							//console.log(result);
							if (result.success){
								$('#dsgs_songhuo_list').datagrid('reload');	// reload the user data
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
		//删除订单
		function dsgs_songhuo_deleterow(index){
			$('#dsgs_songhuo_table').datagrid('selectRecord',index);
			var row = $('#dsgs_songhuo_table').datagrid('getSelected');
			//alert(row.id);
			if (row){
				$.messager.confirm('确认','确定删除此记录吗?',function(r){
					if (r){
						$.post('./songhuo_sheet/delete_songhuo_sheet.php',{id:row.id},function(result){
							//console.log(result);
							if (result.success){
								$('#dsgs_songhuo_table').datagrid('reload');	// reload the user data
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
		//保存选定行
		function dsgs_saverow(target){		
			$('#dsgs_songhuo_list').datagrid('endEdit', dsgs_getRowIndex(target));
		}
		//取消选择
		function dsgs_cancelrow(target){
			$('#dsgs_songhuo_list').datagrid('cancelEdit', dsgs_getRowIndex(target));
			dsgs_r=0;
		}
		//ajax数据改变提交
		function dsgs_savechanges(row)
        {     
						
            $.ajax({
			    type: "POST",
				contentType: "application/json; charset=utf-8",	
                url: "songhuo_sheet/update_songhuo_sheet_data.php",
                dataType: "json",				
                data: JSON.stringify(row),                
                success: function (text) {
			
			//console.log(text);
					$('#dsgs_songhuo_list').datagrid('reload');
				dsgs_r=0;
                        //$.Messager.alert ('message', 'text', 'info'); 										
                    },
				error: function(text){
					
					$('#dsgs_songhuo_list').datagrid('reload');
				dsgs_r=0;
				}
            });
        }
		//提交form
		function dsgs_savefrom(){
			$('#dsgs_dsgs_ffrom').form('submit',{
			url:'songhuo_sheet/update_songhuo_sheet.php?id='+dsgs_id,
			onSubmit:function(){
				return $(this).form('validate');
				
			},
			success:function(result){
			var result = eval('('+result+')');
				if(result.errorMsg){
					$.messager.show({
						title: '错误',
						msg: "保存失败！"
				
					});
				}else{
					$('#dsgs_code').textbox('clear');
					$('#dsgs_name').textbox('clear');
					$('#dsgs_songhuo_table').datagrid('reload');
					$.messager.show({
						title: '成功',
						msg: "保存成功！"
				
					});
				}
			
				
			}
		});
		}
	</script>
	<style  type="text/css">

	</style>
</body>


</html>