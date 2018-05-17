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
<!--



-->
	<div style="margin:10px 0;"></div>	
	<table id="dss_sheet_table" style="width:1200px;height:490px;"></table>
	<div id="dss_toolbar1">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="dss_sheet_new()">新增</a>
	</div>
	<script type="text/javascript">
	$(function(){
		var dass_name = parent.dsl_name;
		var dass_code = parent.dsl_code;
		var dass_table = '<table"><tr><td>订单编号：'+dass_code+'</td>&nbsp;<td>工程名称:'+dass_name+'</td></tr></table>';
		$('#dss_sheet_table').datagrid({
				title:dass_table,
				width:1200,
				height:480,
				pagination: false,
				singleSelect:true,
				rownumbers:true,
				fitColumns:false,
				idField:'id',
				showFooter: true,
				toolbar:'#dss_toolbar1',
				url:'shengchan_sheet/get_shengchan_sheet.php?idd='+parent.dsl_id,
				columns:[[
				{field:'zhi_code',title:'制号',rowspan:2, width:100,align:'center',editor:{type:'text'}},
				{field:'men_code',title:'门号',rowspan:2, width:110,align:'center',editor:{type:'text'}},
				{field:'product_typ',title:'类型',rowspan:2, width:80,align:'center',
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
				{field:'door_typ',title:'门型',rowspan:2, width:70,align:'center',
					formatter:function(value,row,index){
						if(value==0){return "";};
						if(value==1){return "单开";};
						if(value==2){return "双开";};
						if(value==3){return "子母";};
					},
					editor:{type:'combobox',
						options:{
								valueField: 'id',  
								textField: 'name',
								data:[{id:0,name:''},{id:1,name:'单开'},{id:2,name:'双开'},{id:3,name:'子母'}],
								editable: false,
								
						}
					}
				},
				{field:'fire_degree',title:'防火<br/>等级',rowspan:2, width:45,align:'center',
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
				{field:'made_standard',title:'制作<br/>依据',rowspan:2, width:55,align:'center'},
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
				{field:'qty',title:'数量',rowspan:2, width:70,align:'center',editor:{type:'numberbox'}},
				{field:'surface',title:'表面<br/>处理',rowspan:2, width:90,align:'center',editor:{type:'text'}},
				{title:"门框尺寸",colspan:3},{title:"门扇尺寸",colspan:5},{title:"剪板尺寸",colspan:5},
				{field:'xialan',title:'下槛',rowspan:2, width:50,align:'center',formatter:function(value, row){if (value==0) {return '';} else if(value==1){return '有';}},editor:{type:'checkbox',options:{on:'1',off:'0'}}},
				{field:'xiamai',title:'下埋',rowspan:2, width:50,align:'center',formatter:function(value, row){if(value==0){return '';}else{return value;}},editor:{type:'numberbox'}},
				{field:'fire_lock',title:'防火锁<br/>（把）',rowspan:2, width:70,formatter:function(value, row){if(value==0){return '';}else{return value;}},align:'center'},
				{field:'guanjing_lock',title:'管井锁<br/>（把）',rowspan:2, width:70,formatter:function(value, row){if(value==0){return '';}else{return value;}},align:'center'},
				{field:'heye',title:'合叶<br/>（只）',rowspan:2, width:70,formatter:function(value, row){if(value==0){return '';}else{return value;}},align:'center'},
				{field:'bimenqi',title:'闭门器<br/>（台）',rowspan:2, width:70,formatter:function(value, row){if(value==0){return '';}else{return value;}},align:'center'},
				{field:'shunweiqi',title:'顺位器<br/>（支）',rowspan:2, width:70,formatter:function(value, row){if(value==0){return '';}else{return value;}},align:'center'},
				{field:'anchaxiao',title:'暗插销<br/>（支）',rowspan:2, width:70,formatter:function(value, row){if(value==0){return '';}else{return value;}},align:'center'},
				{field:'fanghuoboli25',title:'防火玻<br/>璃25mm<br/>（块）',rowspan:2, width:70,formatter:function(value, row){if(value==0){return '';}else{return value;}},align:'center'},
				{field:'fanghuoboli35',title:'防火玻<br/>璃35mm<br/>（块）',rowspan:2, width:70,formatter:function(value, row){if(value==0){return '';}else{return value;}},align:'center'},
				{field:'note',title:'备注',rowspan:2, width:100,align:'center'},
				{field:'action',title:'操作',rowspan:2,width:80,align:'center',
						formatter:function(value,row,index){
							if(row.action==1){
								return ""
							}else{
							if (row.editing){
								var s = '<a href="javascript:void(0)" onclick="dss_saverow(this)">保存</a> ';
								var c = '<a href="javascript:void(0)" onclick="dss_cancelrow(this)">取消</a>';
								return s+c;
							} else {
								var e = '<a href="javascript:void(0)" onclick="dss_editrow(this)">编辑</a> ';
								var d = '<a href="javascript:void(0)" onclick="dss_deleterow('+row.id+')">删除</a>';
								return e+d;
								//return e;
							}
							}
						}
					}
				],[
				{field:'wai_width',title:'外宽',rowspan:1, width:60,align:'center',editor:{type:'numberbox'}},
				{field:'nei_width',title:'内宽',rowspan:1, width:60,align:'center'},
				{field:'height',title:'高度',rowspan:1, width:60,align:'center',editor:{type:'numberbox'}},
				{field:'main_width',title:'主宽度',rowspan:1, width:60,align:'center'},
				{field:'_signal',title:'',rowspan:1, width:30,align:'center'},
				{field:'fu_width',title:'副宽度',rowspan:1, width:60,align:'center'},
				{field:'height2',title:'高度',rowspan:1, width:60,align:'center'},
				{field:'thinkness',title:'厚度',rowspan:1, width:60,align:'center'},
				{field:'main_mianban',title:'主面板',rowspan:1, width:60,align:'center'},
				{field:'main_beiban',title:'主背板',rowspan:1, width:60,align:'center'},
				{field:'fu_mianban',title:'副面板',rowspan:1, width:60,align:'center'},
				{field:'fu_beiban',title:'副背板',rowspan:1, width:60,align:'center'},
				{field:'height3',title:'高度',rowspan:1, width:60,align:'center'}
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
					dss_savechanges(row);
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
	var dss_r;
	//获取行信息
		function dss_getRowIndex(target){
			var tr = $(target).closest('tr.datagrid-row');
			return parseInt(tr.attr('datagrid-row-index'));
		}
		//修改行信息
		function dss_editrow(target){
			if(dss_r>0){return;}
			dss_r=1;
			$('#dss_sheet_table').datagrid('beginEdit', dss_getRowIndex(target));
		}
		//删除选定行
		function dss_deleterow(index){
			$('#dss_sheet_table').datagrid('selectRecord',index);
			var row = $('#dss_sheet_table').datagrid('getSelected');
			//alert(row.id);
			if (row){
				parent.$.messager.confirm('确认','确定删除此记录吗?',function(r){
					if (r){
						$.post('./shengchan_sheet/delete_shengchan_sheet.php',{id:row.id},function(result){
							//console.log(result);
							if (result.success){
								$('#dss_sheet_table').datagrid('reload');	// reload the user data
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
		function dss_saverow(target){		
			$('#dss_sheet_table').datagrid('endEdit', dss_getRowIndex(target));
		}
		//取消选择
		function dss_cancelrow(target){
			$('#dss_sheet_table').datagrid('cancelEdit', dss_getRowIndex(target));
			dss_r=0;
		}
		//ajax数据改变提交
		function dss_savechanges(row)
        {     
						
            $.ajax({
			    type: "POST",
				contentType: "application/json; charset=utf-8",	
                url: "shengchan_sheet/update_shengchan_sheet_list.php",
                dataType: "json",				
                data: JSON.stringify(row),                
                success: function (text) {
			
					$('#dss_sheet_table').datagrid('reload');
				dss_r=0;
                        //$.Messager.alert ('message', 'text', 'info'); 										
                    },
				error: function(text){
					
					$('#dss_sheet_table').datagrid('reload');
				dss_r=0;
				}
            });
        }
		//新增
		function dss_sheet_new(){
			$.ajax({
                 type: "POST",
                 url: "shengchan_sheet/insert_shengchan_sheet.php?idd="+parent.dsl_id,				
                 contentType: "application/json; charset=utf-8",
                 dataType: "json",
                 success:function(result){
					//console.log(result);
					$('#dss_sheet_table').datagrid('reload');
				 }
			
		});
		}
	</script>
	<style  type="text/css">
		
	</style>
</body>


</html>