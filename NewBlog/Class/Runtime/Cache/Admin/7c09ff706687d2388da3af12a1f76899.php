<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>风筝</title>
<link href="/NewBlog/Public/assets/global/css/admin.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/NewBlog/Public/assets/global/css/wysiwyg-editor.css" />
</head>
<body>
<div class="admin-bg"></div>
<div class="frameset">
	<div class="top">
		<div class="left">
			<img src="/NewBlog/Public/assets/global/img/风筝.PNG" alt="" />
			<span>风筝</span>
			<div class="nav">
				<a href="<?php echo U('/Home/index/index');?>">主页</a>
				<a href="<?php echo U('Index/index');?>">博客管理</a>
				<a href="<?php echo U('Index/addBlog');?>">写博客</a>
				<a href="<?php echo U('Index/pageChange');?>">页面修改</a>
				<a href="<?php echo U('Index/userinfo');?>">个人信息</a>
			</div>
			
		</div>
		<div class="right">
			<div class="user">
				<img src="/NewBlog/Public/assets/global/img/<?php echo ($userInfo['avatar_file']); ?>" alt="" />
				<span><?php echo ($userInfo['name']); ?></span>
			</div>
		</div>
	</div>
	<div class="container">

		<div class="right">
				
	<div class="main">
		<div class="index-con">
			<div class="title"><a href="">新增用户</a></div>
				<div class="container userinfo-con">
					<form action="<?php echo U('Index/addUser');?>" method="post">
						<lable>登录id</lable><input style="background: #ACF0FB;border-radius: 5px" type="text" name="user_id" value="<?php error_reporting(0); echo $_POST['name']; ?>">
						<lable>用户名</lable><input style="background: #ACF0FB;border-radius: 5px" type="text" name="name" value="<?php error_reporting(0); echo $_POST['gender']; ?>">
						<lable>密码</lable><input style="background: #ACF0FB;border-radius: 5px" type="text" name="password" value="<?php error_reporting(0); echo $_POST['class']; ?>">
						<lable>头像</lable><input style="background: #ACF0FB;border-radius: 5px" type="text" name="avatar_file" value="<?php error_reporting(0); echo $_POST['phone']; ?>">
						<input style="margin-top:12px;margin-left:50px" type="submit" name="bottom" value="ADD">
					</form>
				</div>
		</div>
	</div>
	
	<script type="text/javascript" class="autoinsert" src="/NewBlog/Public/assets/plugins/jquery/jquery-2.1.3.min.js"></script> 
	<script>
		  $(function(){
			$(".img-bac").on('click',function(e){
				e.preventDefault();
				$(".admin-bg").css({
					display:"block",
					height:$(document).height(),
					width:$(document).width()
				});
				var attr=$(this).html();
				$(".page-img img").attr("src","/NewBlog/Public/assets/global/img/"+attr);
				var $box = $('.page-img');
		        $box.css({
		            //设置弹出层距离左边的位置
		            left: ($("body").width() - $box.width()) / 2 - 20 + "px",
		            //设置弹出层距离上面的位置
		            top: ($(window).height() - $box.height()) / 2 + $(window).scrollTop() + "px",
		            display: "block"
		        });
				
				$(document.body).css({
				   "overflow-x":"hidden",
				   "overflow-y":"hidden"
				}); 
			});
			var close = function(){
					$(".admin-bg").css({
						display:"none"
					});
					$(".page-img").css({
						display:"none"
					});
					$(document.body).css({
						   "overflow-x":"auto",
						   "overflow-y":"auto"
					});
			}
			$(".page-img span a").on('click',function(e){
				e.preventDefault();
				close();
			});
		});
	</script>

		</div>
	</div>
	<div class="bottom"></div>
</div>
<div class="page-img">
			<span><a href="">×</a></span>
			<img src="" alt="" />
</div>
</body>
</html>