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
	<div class="demo-info" style="margin-bottom:0px">
		
		<!--<div>填写内容提交表单.</div>-->
		<div>
		一级分类：
		<input id ="pd_select1" class="easyui-combobox"  value=1 required="true"  style="width:100px" editable=false  
		data-options=" valueField :'id',textField:'name',url : './002/get_data1.php' ,onSelect:function(ect){$('#pd_select2').combobox('clear');$('#pd_select3').combobox('clear');var url = './002/get_tab.php?id='+ect.id; $('#pd_select2').combobox('reload',url); }" >
		</input>
		二级分类：
		<input id = "pd_select2" class="easyui-combobox"   required="true"  style="width:100px" editable=false 
		data-options=" valueField :'id',textField:'name',prompt:'请选择' ,onSelect:function(ect){$('#pd_select3').combobox('clear');var url = './002/get_data2.php?id='+ect.id; $('#pd_select3').combobox('reload',url); }" >
		
		</input>
		三级分类：
		<input id = "pd_select3" class="easyui-combobox" required="true"  style="width:100px" editable=false data-options="valueField :'id',textField:'name',prompt:'请选择' ,onSelect:function(ect){var url='./002/get_pd_list.php?id='+ect.id;$('#pd_detail').datagrid('reload',url);}">
		</input>
		
	</div>
	</div>
	
	<table id="pd_detail" class="easyui-datagrid" style="width:1100px;"></table>
	<script type="text/javascript">	
			$(function(){			
			
			$('#pd_detail').datagrid({
				url:'',				
                iconCls:'icon-edit',
                width:1000,
                height:400,  
                fitColumns:false,
				rownumbers:true,
                singleSelect:true,
                pagination:true,
				idField:'id',
				
				
                columns:[[ 
									
				
				{field:'img1',title:'图片',width: 60 ,align:'center',
					formatter:function(value,row,index){
						if(""!=value&&null!=value){
							
							var image = '<img style="width:60px; height:60px" src='+value+' onclick="onimgframe('+row.id+')">';
							
							
							return image;
							
						}else{
					
							var image = '<img style="width:60px; height:60px" src="1.png" onclick="onimgframe('+row.id+')">';return image;
							
						}
						
					}
				},
				{field:'name',title:'名称',width:150,align:'center',editor:{type:'text'}}, 
				{field:'price',title:'价格',width:50,align:'center',editor:{type:'numberbox',options:{precision:2}}},
				{field:'product',title:'产品介绍',width:70,align:'center',formatter:function(value,row,index){
					var e = '<a href="javascript:void(0)" onclick="pd_explain('+row.id+')">编辑</a> ';
					
					return e;
				}},
				
				{field:'cost_price',title:'产品成本',width:70,align:'center',editor:{type:'numberbox',options:{precision:2}}},
				{field:'product_mode',title:'型号规格',width:70,align:'center',editor:{type:'text'},
					formatter:function(value,row,index){
						var s = '<a href="javascript:void(0)" onclick="pmchange('+row.id+')">'+value+'</a>';
						return s;
					}
				},
				{field:'details',title:'详图',width:70,align:'center',formatter:function(value,row,index){
					var e = '<a href="javascript:void(0)" onclick="pd_details('+row.id+')">编辑</a> ';
					
					return e;
				}},
				{field:'product_code',title:'产品代码',width:70,align:'center',editor:{type:'text'}},
				{field:'product_unit',title:'商品单位',width:70,align:'center',editor:{type:'text'}},
				{field:'brand',title:'品牌',width:70,align:'center',editor:{type:'text'}},
				{field:'pv',title:'pv',width:50,align:'center',editor:{type:'text'}},
				{field:'bv',title:'bv',width:50,align:'center',editor:{type:'text'}},
				{field:'product_qty',title:'数量',width:50,align:'center',editor:{type:'numberbox'}},
				{field:'cal_price',title:'结算价格',width:70,align:'center',editor:{type:'numberbox',options:{precision:2}}},
				{field:'postage',title:'包邮',width:50,align:'center',formatter:function(value, row){if (value==0) {return '';} else if(value==1){return '启用';}},editor:{type:'checkbox',options:{on:'1',off:'0'}}},
				{field:'price_000',title:'原价',width:50,align:'center',editor:{type:'numberbox',options:{precision:2}}},
				{field:'price_gold',title:'金币',width:50,align:'center',editor:{type:'text'}},
				{field:'action',title:'操作',width:80,align:'center',
					formatter:function(value,row,index){
					
						if (row.editing){
							var s = '<a href="javascript:void(0)" onclick="mpl_saverow(this)">保存</a> ';
							var c = '<a href="javascript:void(0)" onclick="mpl_cancelrow(this)">取消</a>';
							return s+c;
						} else {
							var e = '<a href="javascript:void(0)" onclick="mpl_editrow(this)">编辑</a> ';
							var d = '<a href="javascript:void(0)" onclick="deleterow(this)">删除</a>';
							//return e+d;
							return e;
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
		    
					mpl_savechanges(index,row);
					row.editing = false;
					$(this).datagrid('refreshRow', index);
					r=0;
					
				},
				onCancelEdit:function(index,row){
					row.editing = false;
					$(this).datagrid('refreshRow', index);
				}	
						
				});
				$('#pd_pm_table').datagrid({
				url:"",
				
                width:320,
                height:200,  
                fitColumns:false,
				rownumbers:true,
                singleSelect:true,
                pagination:false,
				idField:'id',
				
                columns:[[
				{field:'typ',title:'类型',width:100,align:'center',formatter:function(value, row){if(value==1){return "颜色";}else if(value==2){return "尺寸";}} },
				{field:'name',title:'参数',width:120,align:'center'},
				{field:'action',title:'操作',width:40,align:'center',
					formatter:function(value,row,index){
						var a = '<a href="javascript:void(0)" onclick="deletetyp('+row.id+')">删除</a>';
						return a;
					}
				}
				]]
			});	
			$('#pd_detail_table').datagrid({
				url:"",
                width:700,
                height:400,  
                fitColumns:false,
				rownumbers:false,
                singleSelect:true,
                pagination:false,
				idField:'id',
				
                columns:[[
				{field:'img1',title:'图片',width:320,height:200,align:'center',
					formatter:function(value,row,index){
						var a = '<img style="width:320px; height:200px" src='+value+' onclick="onimgdetailframe('+row.id+')">';
						return a;
					}
				},
				{field:'note',title:'广告语',width:120,align:'center',editor:{type:'text'}},
				{field:'flag',title:'产品介绍图',width:120,align:'center',formatter:function(value, row){if (value==0) {return '';} else if(value==1){return '是';}},editor:{type:'checkbox',options:{on:'1',off:'0'}}},
				{field:'action',title:'操作',width:100,align:'center',
					formatter:function(value,row,index){
						if(row.editing){
							var s = '<a href="javascript:void(0)" onclick="pd_detail_saverow(this)">保存</a> ';
							var c = '<a href="javascript:void(0)" onclick="pd_detail_cancelrow(this)">取消</a>';
							return s+c;
						}else{
							var a = '<a href="javascript:void(0)" onclick="pd_detail_editrow(this)">编辑</a>&nbsp;&nbsp;';
							var b = '<a href="javascript:void(0)" onclick="pd_detail_deleterow('+row.id+')">删除</a>';
							return a+b;
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
		    
					detail_savechanges(row);
					row.editing = false;
					$(this).datagrid('refreshRow', index);
					d_r=0;
					
				},
				onCancelEdit:function(index,row){
					row.editing = false;
					$(this).datagrid('refreshRow', index);
				}	
			});	
				
			});	
				
	</script>  
	<!-- 产品说明 -->
	<div id="pd_product_dlg" class="easyui-dialog"  style="font-size:15px;width:600px;height:350px;padding:10px 20px"
			closed="true" buttons="#pd_product_dlg-buttons" modal="true" >
		<div class="ftitle">产品介绍</div>
		<form id="fmproduct" method="post" novalidate>
			<div class="fitem">
				<label>商品简介:</label>
				<input id="ppd_product" name="product_desc" class="f easyui-textbox"  required="true" data-options="width:'380px',height:'30px'">
			</div>
			<div class="fitem">
				<label>商品详情:</label>
				<input id = "ppd_details" name="product_details" class="f easyui-textbox" data-options="width:'380px',height:'150px',multiline:true">
			</div>

		
		</form>
		
	</div>
	<!-- 图片框 -->
	<div id = "pd_imgframe_dlg" class="easyui-dialog" style="width:400px;height:200px;padding:10px 20px"  
		closed="true" buttons="#pd_imgframe_dlg-buttons" modal="true" 
	>
		<div class="ftitle">图片分类上传</div>
		<form id="pd_fmimg"  method="post"
		 enctype="multipart/form-data">
		<!--<label for="file">Filename:</label>-->
		<input  type="file" name="file" id="pd_file_input"   onchange="imgframe(this.files)" /> 
		<br/>
		
		
		</form>
	</div>
	<!-- 规格 -->
	<div id = "pd_pm_dlg" class="easyui-dialog" style="width:400px;height:400px;padding:10px 20px"  
		closed="true" buttons="#pd_pm_dlg-buttons" modal="true" 
	>
		<div id="pd_pm_title" class="ftitle"></div>
		<form id="pd_pm_fm" method="post" enctype="multipart/form-data">
			类型：<select id="pd_pm_typ" name="typ"   class="easyui-combobox" value="1" required="true"  editable="false" style = "width:120px" >
				<option value="1">颜色</option>
                <option value="2">尺寸</option>
			</select>
			<br/>
			<br/>
			参数：<input id="pd_pm_input" name="name" class="easyui-textbox" required="true"></input>&nbsp;&nbsp;&nbsp;&nbsp;<a href ="javascript:void(0)"  iconCls="icon-add" class="easyui-linkbutton" style="width:90px" onclick="addpm()">添加</a>
			
		</form>
		
			<table id ="pd_pm_table" class="easyui-datagrid"  style="width:300px;height:100px;"></table>
		 
		
	</div>
	<!-- 规格 -->
	<div id="pd_pm_dlg-buttons">
		<!--<a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="savepm()" style="width:90px">保存</a>-->
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#pd_pm_dlg').dialog('close')" style="width:90px">取消</a>
	</div>
	<!-- 详图 -->
	<div id = "pd_detail_dlg" class="easyui-dialog" style="width:800px;height:500px;padding:10px 20px"  
		closed="true" buttons="#pd_detail_dlg-buttons" modal="true" 
	>
		<div id="pd_detail_title" class="ftitle"></div>
		<form id="pd_detail_fm" method="post" enctype="multipart/form-data">
			图片上传(414宽)（640X400) <input id="pd_detail_file" type="file" name="file" onchange="detailframe(this.files)"></input>&nbsp;&nbsp;&nbsp;&nbsp;(允许 GIF,JPG,PNG) <a href ="javascript:void(0)"  iconCls="icon-add" class="easyui-linkbutton" style="width:90px" onclick="adddetail()">上传</a>
		<form>
		<table id = "pd_detail_table" class="easyui-datagrid"  style="width:700px;height:400px;"></table>
		
		
 		
	</div>
	<!-- 详图 -->
	<div id="pd_detail_dlg-buttons">
		
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#pd_detail_dlg').dialog('close')" style="width:90px">取消</a>
	</div>
	
	<!-- 产品说明按钮 -->
	<div id="pd_product_dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveproduct()" style="width:90px">保存</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#pd_product_dlg').dialog('close')" style="width:90px">取消</a>
	</div>
	<!-- 图片上传按钮 -->
	<div id="pd_imgframe_dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveimg()" style="width:90px">上传</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#pd_imgframe_dlg').dialog('close')" style="width:90px">取消</a>
	</div>
		
	
	
	<script type="text/javascript">		
		var url;//路径
		var index_img;//图片行id
		var url_img;//图片路径
		var index_pm;
		var index_detail;
		
		function abc(){alert(111)};
		//file图片修改路径
		function imgframe(files){

		var index = files[0].name.lastIndexOf(".");
		
		type =files[0].name.substring(index);
		url_img = '002/upload_file.php?id='+index_img+'&type='+type;

		}
		//详图图片修改路径
		function detailframe(files){
		var index = files[0].name.lastIndexOf(".");
		
		type =files[0].name.substring(index);
		url_img = 'product_list/upload_imgdetails_file.php?idd='+index_detail+'&type='+type;
		}
		//删除规格
		function deletetyp(index){
			$('#pd_pm_table').datagrid('selectRecord',index);
			var row = $('#pd_pm_table').datagrid('getSelected');
			var pp='./product_list/delete_color_size.php';
			if (row){
				$.messager.confirm('确认','确定删除此记录吗?',function(r){
				
					if (r){
						$.post(pp,{id:row.id},function(result){
						
							if (result.success){
								$('#pd_pm_table').datagrid('reload');	// reload the user data
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
		//详图的删除
		function pd_detail_deleterow(index){
		$('#pd_detail_table').datagrid('selectRecord',index);
			var row = $('#pd_detail_table').datagrid('getSelected');
			var pp='./product_list/delete_imgdetails_list.php';
			if (row){
				$.messager.confirm('确认','确定删除此记录吗?',function(r){
				
					if (r){
					
						$.post(pp,{id:row.id},function(result){
						
							if (result.success){
								$('#pd_detail_table').datagrid('reload');	// reload the user data
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
		
		//修改规格
		function pmchange(index){
			$('#pd_detail').datagrid('selectRecord',index);
			var row = $('#pd_detail').datagrid('getSelected');
			//alert(row.id);
			
			var cs_url = "product_list/get_color_size.php?id="+row.id;
			$('#pd_pm_typ').combobox({
				onSelect:function(n,c){
					cs_url=cs_url+"&typ="+n.value;
					$('#pd_pm_table').datagrid('reload',cs_url);	
				}
				
			});
			
			$('#pd_pm_title').text("商品名称:"+row.name);
			$('#pd_pm_dlg').dialog('open').dialog('setTitle','编辑');
			index_pm=row.id;
		};
		
		//添加规格
		function addpm(){
			var cs_url = "product_list/insert_color_size.php?id="+index_pm;
			$('#pd_pm_fm').form('submit',{
				url:cs_url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
				//console.log(result);
					$('#pd_pm_table').datagrid('reload');	// reload the user data
					$('#pd_pm_input').textbox("clear");		// close the dialog
					
				
				}
			});
		};
		//产品说明dlg
		function pd_explain(index){
			$('#pd_detail').datagrid('selectRecord',index);
			var row = $('#pd_detail').datagrid('getSelected');
			if(row){
				$('#pd_product_dlg').dialog('open').dialog('setTitle','编辑');
				$("#ppd_product").textbox('textbox').css("font-size", "15px");
				$("#ppd_details").textbox('textbox').css("font-size", "15px");
				$('#fmproduct').form('load',row);
				url = 'product_list/update_desc.php?id='+index;
			}
			
		}
		//产品详情dlg
		function pd_details(index){
			
			$('#pd_detail').datagrid('selectRecord',index);
			var row = $('#pd_detail').datagrid('getSelected');
			if(row){
				var cs_url = "product_list/get_imgdetails_list.php?id="+row.id; 
				index_detail=row.id;
				$('#pd_detail_table').datagrid('reload',cs_url);
				$('#pd_detail_title').text("商品名称:"+row.name);
				$('#pd_detail_dlg').dialog('open').dialog('setTitle','编辑详图');
				
			}
		}
		
		//打开图片编辑框
		function onimgframe(index){
			
			index_img=index;
			$('#pd_file_input').val("");
			$('#pd_imgframe_dlg').dialog('open').dialog('setTitle','编辑');
			
		}
		
		//保存提交图片
		function saveimg(){
			$('#pd_fmimg').form('submit',{
				url :url_img,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					$('#pd_imgframe_dlg').dialog('close');		// close the dialog
					$('#pd_detail').datagrid('reload');	// reload the user data
				
				}
				
				});
		}
		//
		//添加详图
		function adddetail(){
		$('#pd_detail_fm').form('submit',{
				url :url_img,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					$('#pd_detail_fm').form('clear');		// close the dialog
					$('#pd_detail_table').datagrid('reload');	// reload the user data
				
				}
				});
		}
	

		var r=0;
		var d_r=0;
		//
		function mpl_getRowIndex(target){
			var tr = $(target).closest('tr.datagrid-row');
			return parseInt(tr.attr('datagrid-row-index'));
		}
		//商品的修改
		function mpl_editrow(target){
			if(r>0){return;}
			r=1;
			$('#pd_detail').datagrid('beginEdit', mpl_getRowIndex(target));
			
			
			
		}
		//详图的修改
		function pd_detail_editrow(target){
			if(d_r>0){return;}
				d_r=1;
				$('#pd_detail_table').datagrid('beginEdit', mpl_getRowIndex(target));
			}
		function deleterow(target){
			$.messager.confirm('Confirm','Are you sure?',function(r){
				if (r){
					$('#pd_detail').datagrid('deleteRow', mpl_getRowIndex(target));
				}
			});
		}
		function deleterow(target){
			$.messager.confirm('Confirm','Are you sure?',function(r){
				if (r){
					$('#pd_detail').datagrid('deleteRow', mpl_getRowIndex(target));
				}
			});
		}
		//商品的保存
		function mpl_saverow(target){
		     
					
			$('#pd_detail').datagrid('endEdit', mpl_getRowIndex(target));
		}
		//详图的保存
		function pd_detail_saverow(target){
		     
					
			$('#pd_detail_table').datagrid('endEdit', mpl_getRowIndex(target));
		}
		//商品的取消
		function mpl_cancelrow(target){
			$('#pd_detail').datagrid('cancelEdit', mpl_getRowIndex(target));
			r=0;
		}
		//详图的取消
		function pd_detail_cancelrow(target){
			$('#pd_detail_table').datagrid('cancelEdit', mpl_getRowIndex(target));
			d_r=0;
		}
		function mpl_savechanges(index,row)
		
        {     
		
            $.ajax({
			    type: "POST",
				contentType: "application/json; charset=utf-8",	
                url: "product_list/update_product_list.php",
                dataType: "json",				
                data: JSON.stringify(row),                
                success: function (text) { 
			
				$('#pd_detail').datagrid('reload',index);
				
                        //$.Messager.alert ('message', 'text', 'info'); 										
                    }	,
				error: function(){
					$('#pd_detail').datagrid('reload',index);
				}
            });
        }
		//详图保存修改
		function detail_savechanges(row)
		
        {     
            $.ajax({
			    type: "POST",
				contentType: "application/json; charset=utf-8",	
                url: "product_list/update_imgdetails_list.php",
                dataType: "json",				
                data: JSON.stringify(row),                
                success: function (text) { 
				
				
				
				$('#pd_detail_table').datagrid('reload');
														
                    },
				error:function(text){
				
				$('#pd_detail_table').datagrid('reload');
				
				}					
            });
        }
		//保存产品介绍
		function saveproduct(){
			$('#fmproduct').form('submit',{
				url: url,
				onSubmit: function(){
				return $(this).form('validate');
				},
				success: function(result){
				console.log(result);
				$('#pd_product_dlg').dialog('close');
				$('#pd_detail').datagrid('reload');
				}
			});
		}
		//产品的删除
		function destroytab(){
			var row = $('#pd_detail').datagrid('getSelected');
			if (row){
				$.messager.confirm('确认','确定删除此记录吗?',function(r){
					if (r){
						$.post('./002/destroy_accordion.php',{id:row.id},function(result){
							if (result.success){
								$('#pd_detail').datagrid('reload');	// reload the user data
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
		
	</script>  
	<style type="text/css">
		#fmproduct{
			margin:0;
			padding:10px 30px;
		}
		.ftitle{
			font-size:14px;
			font-weight:bold;
			padding:5px 0;
			margin-bottom:10px;
			border-bottom:1px solid #ccc;
		}
		.fitem{
			margin-bottom:5px;
		}
		.fitem label{
			display:inline-block;
			width:80px;
		}
		.fitem input{
			width:160px;
		}
		.f{
			width:300px;
		}
	</style>
	
	
</body>
</html>  