<!DOCTYPE HTML>
<HTML><HEAD>
<META http-equiv="Content-Type" content="text/html; charset=UTF-8">		 
<META name="viewport" content="width=device-width, initial-scale=1">
<TITLE>产品及会员管理系统</TITLE>		 
<LINK href="themes/default/easyui.css" rel="stylesheet" type="text/css">
<LINK href="jeasy/kube.css" rel="stylesheet" type="text/css">
<LINK href="jeasy/main.css" rel="stylesheet" type="text/css">
<LINK href="/favicon.ico" rel="shortcut icon" type="image/x-icon">
<LINK href="jeasy/prettify.css" rel="stylesheet" type="text/css">		

<link rel="stylesheet" type="text/css" href="themes/icon.css">
<link rel="stylesheet" type="text/css" href="themes/color.css">
<link rel="stylesheet" type="text/css" href="demo.css">


<SCRIPT src="jeasy/prettify.js" type="text/javascript"></SCRIPT>		 
<SCRIPT src="jquery.min.js" type="text/javascript"></SCRIPT>		 
<SCRIPT src="jquery.easyui.min.js" type="text/javascript"></SCRIPT>
<script type="text/javascript" src="locale/easyui-lang-zh_CN.js"></script>

<SCRIPT type="text/javascript">
			$(function(){
                
				$('#tt').tabs({
					onLoad:function(panel){						
						var plugin = panel.panel('options').title;						
						/*
						panel.find('textarea[name="code-'+plugin+'"]').each(function(){
							var data = $(this).val();
							data = data.replace(/(\r\n|\r|\n)/g, '\n');
							if (data.indexOf('\t') == 0){
								data = data.replace(/^\t/, '');
								data = data.replace(/\n\t/g, '\n');
							}
							data = data.replace(/\t/g, '    ');							
							var pre = $('<pre name="code" class="prettyprint linenums"></pre>').insertAfter(this);
							pre.text(data);
							$(this).remove();
						});
						prettyPrint();  */
					}
				});  
				
											
				var sw = $(window).width();
				if (sw < 767){
					$('body').layout('collapse', 'west');
				}
				$('.navigation-toggle span').bind('click', function(){
					$('#head-menu').toggle();
				});
			}
			
			);
          

			function open1(plugin,mytitle){
				if ($('#tt').tabs('exists',mytitle)){
					$('#tt').tabs('select', mytitle);
				} else {
					$('#tt').tabs('add',{
						title:mytitle,
						href:plugin+'.php',						
						closable:true,
						bodyCls:'content-doc'
						/*
						extractor:function(data){
							data = $.fn.panel.defaults.extractor(data);
							var tmp = $('<div></div>').html(data);
							data = tmp.find('#content').html();
							tmp.remove();							
							return data;
						}*/
					});
				}
			}
		</SCRIPT>
		 
<STYLE type="text/css">
			.tree-title{
				font-size: 14px;
			}
			.tree-title a{
				text-decoration: none;
			}
			.top_links{
				background:#fff;
				color:#000;
				overflow:hidden;
				height:60px;
				text-align:center
			}
			.top_links a{
				color: #999;
				display: inline;
				margin: 0;
				padding: 0;
				text-decoration: none;
			}
			.top_links a:hover{
				color: #E26B1D;
			}
			#head-menu{
				position: absolute;
				z-index: 8;
				display: none;
				background: #2d3e50;
				color: #fff;
				left: 0;
				padding: 0 4.5%;
				top: 60px;
			}
			#head-menu .navbar{
				margin: 0 40px 20px 40px;
			}
			#head-menu a{
				color: #fff;
			}
		</STYLE>
	 
</HEAD>	 
<BODY class="easyui-layout" style="text-align: left;">


<DIV id="head-menu">
<DIV class="navbar navbar-right">
<UL>
  <LI><A href="index.html">产品管理</A></LI>
  <LI><A href="index.html">会员管理</A></LI>
  <LI><A href="index.html">订单管理</A></LI>
  <LI><A href="index.html">功能四</A></LI>
  <LI><A href="index.html">功能五</A></LI>
  <LI><A href="index.html">功能六</A></LI>
  <LI><A href="index.html">系统设置</A></LI>
  <LI><A href="forum/index.php">退出</A></LI>
</UL>
</DIV>
</DIV>


<DIV class="group wrap header" style="height: 64px; overflow: hidden; font-size: 100%;" 
border="false" region="north">
<DIV class="content">

<DIV class="navigation-toggle" data-target="#navbar-1" data-tools="navigation-toggle">
<SPAN>产品管理</SPAN>
</DIV>

<DIV class="navbar navbar-left" id="elogo">
<UL>
  <LI><A href="index.html">
  <IMG alt="jQuery EasyUI" src="jeasy/logo_melay.png"></A></LI>
</UL>
</DIV>

<DIV class="navbar navbar-right" id="navbar-1">
<UL>
  <LI><A href="index.html">产品管理</A></LI>
  <LI><A href="index.html">会员管理</A></LI>
  <LI><A href="index.html">订单管理</A></LI>
  <LI><A href="index.html">功能四</A></LI>
  <LI><A href="index.html">功能五</A></LI>
  <LI><A href="index.html">功能六</A></LI>
  <LI><A href="index.html">系统设置</A></LI>
  <LI><A href="index.html">退出</A></LI></UL></DIV>
<DIV style="clear: both;"></DIV></DIV>
<SCRIPT type="text/javascript">
	function setNav(){
		var demosubmenu = $('#demo-submenu');
		if (demosubmenu.length){
			if ($(window).width() < 450){
				demosubmenu.find('a:last').hide();
			} else {
				demosubmenu.find('a:last').show();
			}
		}
		if ($(window).width() < 767){
			$('.navigation-toggle').each(function(){
				$(this).show();
				var target = $(this).attr('data-target');
				$(target).hide();
				setDemoNav();
			});
		} else {
			$('.navigation-toggle').each(function(){
				$(this).hide();
				var target = $(this).attr('data-target');
				$(target).show();
			});
		}
	}
	function setDemoNav(){
		$('.navigation-toggle').each(function(){
			var target = $(this).attr('data-target');
			if (target == '#navbar-demo'){
				if ($(target).is(':visible')){
					$(this).css('margin-bottom', 0);
				} else {
					$(this).css('margin-bottom', '2.3em');
				}
			}
		});
	}
	$(function(){
		setNav();
		$(window).bind('resize', function(){
			setNav();
		});
		$('.navigation-toggle').bind('click', function(){
			var target = $(this).attr('data-target');
			$(target).toggle();
			setDemoNav();
		});
	})
</SCRIPT>

<!--	
<DIV class="top_links">
<A style="color: rgb(37, 117, 237);" href="documentation/index.php">EasyUI for jQuery</A>
<A style="margin-left: 40px;" href="documentation2/index.php">EasyUI for Angular</A>	
</DIV>
-->

</DIV>
<DIV title="产品管理" style="padding: 5px; width: 20%; min-width: 180px;" region="west" 
split="true">
<UL class="easyui-tree">
  <LI iconcls="icon-base"><SPAN>产品</SPAN>
  <UL>
    <LI iconcls="icon-gears"><A onclick="open1('dagang_contract_list','合同列表')" href="#">合同列表</A></LI>
    
   </UL></LI>
  <LI iconcls="icon-layout"><SPAN>产品分类</SPAN>
  <UL>
    <LI iconcls="icon-gears"><A onclick="open1('dagang_chat_dome','一级分类')" href="#">一级分类</A></LI>
  
    </UL></LI>
  <LI iconcls="icon-menu"><SPAN>产品销售</SPAN>
  <UL>
    <LI iconcls="icon-gears"><A onclick="open1('menu','销售列表')" href="#">销售列表</A></LI>
	 <LI iconcls="icon-gears"><A onclick="open1('dagang_songhuo_sheet','送货')" href="#">送货</A></LI>
	 <LI iconcls="icon-gears"><A onclick="open1('dagang_shengchan_list','生产单列表')" href="#">生产单列表</A></LI>
	 <LI iconcls="icon-gears"><A onclick="open1('dagang_order_approve_list','订单审批列表')" href="#">订单审批列表</A></LI>
	  <LI iconcls="icon-gears"><A onclick="open1('dagang_tongjimingxi_list','统计列表')" href="#">统计列表</A></LI>
	   <LI iconcls="icon-gears"><A onclick="open1('dagang_gongcheng_lianxi','工程联系函列表')" href="#">工程联系函列表</A></LI>
  </UL>
  </LI>

 	
	</UL></DIV>
<DIV region="center">

<DIV class="easyui-tabs" id="tt" border="false" plain="true" fit="true">
<DIV title="首页" class="content-doc" href="blank.html"></DIV>
</DIV>

</DIV>
</BODY>
</HTML>
