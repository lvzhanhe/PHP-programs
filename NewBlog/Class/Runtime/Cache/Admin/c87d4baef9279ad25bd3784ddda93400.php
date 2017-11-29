<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>风筝</title>
<link href="/NewBlog/Public/assets/global/css/home.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="frameset">
	<div class="top">
		<div class="nav">
			<div class="pull-left">风筝</div>
			<input type="text" />
			<a href="/NewBlog/index.php?m=Home&c=index&a=index">首页</a>
			<a href="/NewBlog/index.php?m=Home&c=index&a=category">轻微博</a>
			<a href="/NewBlog/index.php?m=Home&c=index&a=category">前端开发</a>
			<a href="/NewBlog/index.php?m=Home&c=index&a=category">闲心集</a>	
			<div class="pull-right">
			
			<a href="<?php echo U('index/login');?>">博主登入</a>
			</div>
		</div>	
	</div>
	<div class="in-login">
		<div class="in-header">			
			<div class="pull-left">
				<img src="/NewBlog/Public/assets/global/img/风筝.PNG" alt="" />
			</div>
			<div class="pull-right">
					———  我想要一根不会断的风筝线……但我还没找到。
			</div>
		</div>
		<div class="lo-container">
			<div class="pull-left">
					<div class="title">
						<img src="/NewBlog/Public/assets/global/img/大圣.jpg" alt="" />
						<h2>博主登入</h2>
					</div>
					<form action="<?php echo U('Index/dologin');?>" method="post">
						<input type="text" placeholder="账号" name="user_id"/>
						<input type="password" placeholder="密码" name="password"/>
		<!-- 				<button type="submit" class="btn">登录</button> -->
						<input type="submit" value="登录" class="btn"/>
					</form>
					<form action="<?php echo U('Index/doAdminlogin');?>" method="post">
						<input type="submit" value="管理员登录" class="btn"/>
					</form>
			</div>
			<div class="pull-right">
				<p>你陪了我多少年</p>
				<p>花开花落</p>
				<p>一路上起起跌跌</p>
				<p>——定风波</p>
			</div>
		</div>
	</div>
	<div class="bottom"></div>
</div>

<script type="text/javascript" class="autoinsert" src="/NewBlog/Public/assets/plugins/jquery/jquery-2.1.3.min.js"></script> 
<script src="/NewBlog/Public/assets/global/js/snowfall.jquery.js"></script> 
<script>
$(document).snowfall('clear');
$(document).snowfall({
    image: "/NewBlog/Public/assets/global/img/樱花.jpg",
    flakeCount:30,
    minSize: 5,
    maxSize: 22
});
</script>
</body>
</html>