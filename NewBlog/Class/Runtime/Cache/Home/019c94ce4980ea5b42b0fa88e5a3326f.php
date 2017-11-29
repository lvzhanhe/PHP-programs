<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>风筝</title>
<meta property="qc:admins" content="27761440017637452167636716450600075507556351645061516450"/>
<link rel="stylesheet" type="text/css" href="/NewBlog/Public/assets/plugins/bootstrap/css/bootstrap.css">
<link href="/NewBlog/Public/assets/global/css/home.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" type="text/css" href="/NewBlog/Public/assets/plugins/zm-rotation/zm-rotation.css"/>
    <link rel="stylesheet" type="text/css" href="/NewBlog/Public/assets/pages/styles/index.css"/>

<style>
	.video{
		height:0;
		overflow: hidden;
	}
</style>
</head>
<body>
<div class="frameset">

	<div class="top">
		<div class="pull-left"><a href="<?php echo U('index/index');?>">首页</a></div>
		<div class="nav">
			<ul>
				<?php if(is_array($all)): $i = 0; $__LIST__ = $all;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(empty($vo['children'])): ?><li><a href="<?php echo U('index/category',array('id'=>$vo['id']));?>"><?php echo ($vo['name']); ?></a></li>
					<?php else: ?>
						<li>
							<a href=""><?php echo ($vo['name']); ?></a>
							<ul>
								<?php if(is_array($vo['children'])): $i = 0; $__LIST__ = $vo['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ch): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('index/category',array('id'=>$ch['id']));?>"><?php echo ($ch['name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
						</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
		<div class="pull-right">
			<span><a href="/NewBlog/index.php?m=Admin&c=index&a=login">登录/注册</a></span>
			 <?php if(session('u_id')): ?><div class="avatar">
					<img src="/NewBlog/Public/assets/global/img/<?php echo ($avatar_file); ?>" alt="">
					<ul class="menu">
						<li>
							<a href="">
								<span class="f3"><?php echo ($name); ?></span>
								<br>
								<span class="f9">正使用"<?php echo ($login_type_name); ?>"账号登录</span>
							</a>
						</li><li>
							<a href="">私信</a>
						</li>
						<li>
							<a href="<?php echo U('index/articleList');?>">个人主页</a>
						</li><li>
							<a href="">反馈意见</a>
						</li>
						<li>
							<a href="">设置</a>
						</li>
						<li>
							<a href="<?php echo U('index/logout');?>" class="exit">退出</a>
						</li>
					</ul>
									</div> 
			<?php else: endif; ?> 
		</div>
	</div>
	
	<div class="in-index">
		<div class="zm-rotation">
            <ul class="rotation-list">
                <li>
                    <a href="javascript:;">
                        <img src="/NewBlog/Public/assets/global/img/bg/gril.jpg" alt="纸飞机飞呀飞 晚霞真美">
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="/NewBlog/Public/assets/global/img/bg/autumn.jpg" alt="摘下你的面具 我们交朋友吧">
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="/NewBlog/Public/assets/global/img/bg/life.jpg" alt='幸运只是努力的另一个代名词'>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="/NewBlog/Public/assets/global/img/bg/numbers.jpg" alt="我喜欢夜晚的寂静 一个人真好">
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <img src="/NewBlog/Public/assets/global/img/bg/autumn.jpg" alt="找到生活中的理想吧">
                    </a>
                </li>
            </ul>         
        </div>
        <div class="rotation-focus"></div>
		<div class="in-header">			
			<!-- <div class="pull-left">
				
			</div>
			<div class="pull-right">
					———  <?php echo ($pageChange['index_show']); ?> 
			</div> -->
		</div>
		<div class="container">	
			<div class="pull-left">
			<?php if(is_array($article)): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="time-line">
					<div class="time-line-text">
						<div class="title">
							<h2>
								<a href="<?php echo U('index/detail',array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a>
							</h2>
						</div>
						<div class="content">
							<?php echo (mb_substr($vo["content"],0,300,'utf-8')); ?>
						</div>
						<div class="tips pull-right">
							<span class="time">
								<i class="icon-timeline"></i>
								<?php echo (date('Y年m月d日 H:i',$vo["update_time"])); ?>
							</span>
							<span class="ready">
								<a href="<?php echo U('index/detail',array('id'=>$vo['id']));?>">
									<i class="icon-timeline"></i>
									阅读全文

								</a>
							</span>
						</div>
					</div>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
				<div class="page">
					<ul>
						<?php echo ($page); ?>
					</ul>
				</div>
			</div>
			<div class="pull-right">
				<div class="time-line">
					<div class="time-line-text">
						<div class="title">
							<h2>近期文章</h2>
						</div>
						<div class="content">
							<ul>
								<?php if(is_array($recently)): $i = 0; $__LIST__ = $recently;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
										<div class="con-title">
											<a href="<?php echo U('index/detail',array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a>
											<span class="pull-right"><?php echo (date('Y.m.d',$vo["update_time"])); ?></span>
										</div>
									</li><?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="time-line">
					<div class="time-line-text">
						<div class="title">
							<h2>文章归档</h2>
						</div>
						<div class="content">
							<ul class="blog-time-line">
								<li><a href="<?php echo U('Index/category');?>">· 二零一五年 · 八月</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<script src="/NewBlog/Public/assets/plugins/jquery/jquery-2.1.3.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/NewBlog/Public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/NewBlog/Public/assets/pages/scripts/public.js"></script>

    <script type="text/javascript" src="/NewBlog/Public/assets/plugins/zm-rotation/jquery.zmrotation.js"></script> 


    <script type="text/javascript">
	    $(document).ready(function(){
	        $(".zm-rotation").zmRotation({height: 350});
	    })
    </script>

<script type="text/javascript">
    $(document).ready(function(){
        Public.init();
    })
</script>


</body>
</html>