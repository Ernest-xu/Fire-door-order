<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
	<LINK href="themes/default/easyui.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="themes/icon.css">
    <link rel="stylesheet" type="text/css" href="demo.css">

	<SCRIPT src="jquery.min.js" type="text/javascript"></SCRIPT>		 
	<SCRIPT src="jquery.easyui.min.js" type="text/javascript"></SCRIPT>
</head>
<body>
	
	<p>点击可修改工程属性.</p>
	<div style="margin:20px 0;"></div>
	
	<table id="dg" title="" style="width:900px;height:auto"
			data-options="
				iconCls: 'icon-edit',
				singleSelect: true,
				url: 'menu/get_menu_list.php',
				method:'get'
			">
		<thead>
			<tr>
				<th data-options="field:'id',width:80,editor:'text'">ID</th>
				<th data-options="field:'name',width:100,editor:'text'">工程名称</th>
				<th data-options="field:'start_dt',width:100,editor:'text'">开工日期</th>
				<th data-options="field:'end_dt',width:100,editor:'text'">完工日期</th>
				<th data-options="field:'line',width:100,editor:'text'">线路</th>				
				<th data-options="field:'locatioin',width:250,editor:'text'">位置</th>
				<th data-options="field:'status',width:60,align:'center',editor:{type:'checkbox',options:{on:'P',off:''}}">状态</th>
			</tr>
		</thead>
	</table>

	<script type="text/javascript">
		$.extend($.fn.datagrid.methods, {
			editCell: function(jq,param){
				return jq.each(function(){
					var opts = $(this).datagrid('options');
					var fields = $(this).datagrid('getColumnFields',true).concat($(this).datagrid('getColumnFields'));
					for(var i=0; i<fields.length; i++){
						var col = $(this).datagrid('getColumnOption', fields[i]);
						col.editor1 = col.editor;
						if (fields[i] != param.field){
							col.editor = null;
						}
					}
					$(this).datagrid('beginEdit', param.index);
                    var ed = $(this).datagrid('getEditor', param);
                    if (ed){
                        if ($(ed.target).hasClass('textbox-f')){
                            $(ed.target).textbox('textbox').focus();
                        } else {
                            $(ed.target).focus();
                        }
                    }
					for(var i=0; i<fields.length; i++){
						var col = $(this).datagrid('getColumnOption', fields[i]);
						col.editor = col.editor1;
					}
				});
			},
            enableCellEditing: function(jq){
                return jq.each(function(){
                    var dg = $(this);
                    var opts = dg.datagrid('options');
                    opts.oldOnClickCell = opts.onClickCell;
                    opts.onClickCell = function(index, field){
                        if (opts.editIndex != undefined){
                            if (dg.datagrid('validateRow', opts.editIndex)){
                                dg.datagrid('endEdit', opts.editIndex);
                                opts.editIndex = undefined;
                            } else {
                                return;
                            }
                        }
                        dg.datagrid('selectRow', index).datagrid('editCell', {
                            index: index,
                            field: field
                        });
                        opts.editIndex = index;
                        opts.oldOnClickCell.call(this, index, field);
                    }
                });
            }
		});

		$(function(){
			$('#dg').datagrid().datagrid('enableCellEditing');
		})
	</script>
</body>
</html>