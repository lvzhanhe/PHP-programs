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
			<div class="title"><a href="<?php echo U('Index/index');?>">博客管理</a></div>
			<div class="container">
				<table>
					<tr class="first">
						<td>分类</td>
						<td>标题</td>
						<td>内容</td>
						<td>发布时间</td>
						<td>操作</td>
					</tr>
					<?php if(is_array($article)): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td><?php echo ($vo["name"]); ?></td>
							<td><?php echo ($vo["title"]); ?></td>
							<td><?php echo (mb_substr($vo["content"],0,10,'utf-8')); ?></td>
							<td><?php echo (date('Y.m.d',$vo["update_time"])); ?></td>
							<td><a href="<?php echo U('Index/editBlog',array('id'=>$vo[id]));?>">编辑</a>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; <a href="<?php echo U('Index/delete',array('id'=>$vo[id]));?>">删除</a></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</table>
			</div>
		</div>		
	</div>

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