<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>工作室综合信息服务平台</title>
	<link rel="icon" href="/workroom/Public/images/ioc.ioc" type="image/x-iocn">
	<link rel="stylesheet" type="text/css" href="/workroom/Public/css/total.css">
	<link rel="stylesheet" type="text/css" href="/workroom/Public/css/main.css">
	<link rel="stylesheet" href="/workroom/Public/css/style.css">
	<!--[if lt IE 8]>
	<!-->
	<link rel="stylesheet" href="/workroom/Public/css/ie7.css">
	<!--<![endif]-->
	<script src="/workroom/Public/js/jquery.1.4.2-min.js" type="text/javascript"></script>
	<script src="/workroom/Public/js/jquery.color.js" type="text/javascript"></script>
	<script src="/workroom/Public/js/main.js" type="text/javascript"></script>
	<script type="text/javascript">
		function changeImg(){
			$("#myImg").attr("src","/workroom/Public/image.php?id="+new Date());
		}
	</script>
</head>
<body>
	<div id="nav-new" class="nav clearfix" style="display: block">
		<a class="nav-logo" href="index.html">
			<img src="/workroom/Public/images/logos.png"></a>
		<ul class="nav-bar clearfix">
			<li>
				<a href="/workroom/index.php">首页</a>
			</li>
			<li>
				<a href="/workroom/index.php/#college">院系介绍</a>
			</li>
			<li>
				<a href="/workroom/index.php/#notice">纳新公告</a>
			</li>
			<li>
				<a href="/workroom/index.php/#search">工作室索引</a>
			</li>
			<li>
				<a href="/workroom/index.php/Home/Introduce/index">工作室介绍</a>
			</li>
		</ul>
		<a class="nav-bgd" href="#">工作室入口</a>
	</div>
	<div style="width: 100%;height: 80px;"><!--占位置--></div>
	<div id="introduce-top">
		<h1>Studio Marketplace <span>PREVIEW</span></h1>
		<p>工作室综合信息平台，你可以在这里寻找所有你想要了解的工作室信息</p>
	</div>
	<div id="introduce" class="clearfix">
	<?php echo ($a); ?>
		<div class="introduce-left">
		<?php if($workroom_msg): ?><p class="search-name">检索信息：<span class="searchSpan"><?php echo ($searchMsg); ?></span></p>
			<?php if(is_array($workroom_msg)): foreach($workroom_msg as $key=>$value): ?><div class="intro">
					<h3><a href="/workroom/<?php echo ($value["filePath"]); ?>"><?php echo ($value["workroomName"]); ?></a></h3>
					<p>指导教师：<span><?php echo ($value["teacher"]); ?></span></p>
					<p>成立时间：<span><?php echo ($value["setupTime"]); ?></span></p>
					<p>负责人：<span><?php echo ($value["leader"]); ?></span></p>
					<p>联系方式：<span><?php echo ($value["telephone"]); ?></span>　QQ：<span><?php echo ($value["qq"]); ?></span></p>
					<p>其他成员：<span><?php echo ($value["name"]); ?></span></p>
					<p>地点：<span><?php echo ($value["address"]); ?></span></p>
					<p class="intro-direct">
						主要方向：
						<span>
						<?php if(is_array($value["direct"])): foreach($value["direct"] as $key=>$v): ?><a href="javascript:void(0);"><?php echo ($v); ?></a><?php endforeach; endif; ?>
						</span>
						<a href="/workroom/index.php/Home/Introduce/resume/messageId/<?php echo ($value["messageId"]); ?>" class="join">简历投递</a>
					</p>
				</div><?php endforeach; endif; ?>
			    <!-- <a href="#">首页</a>&nbsp;&nbsp;
				<a href="#">上一页</a>&nbsp;&nbsp;
				<a href="#">下一页</a>&nbsp;&nbsp;
				<a href="#">尾页</a>&nbsp;&nbsp; -->
		<?php else: ?>
			<p class="search-none">根据您搜索的关键字，并未找到相关工作室信息，请<a href="/workroom/index.php/#search" style="color:red;">重新搜索</a>试试看</p><?php endif; ?>

		</div>
		<div class="introduce-right">
			<div>
				<p>投递简历须知</p>
				<span>
					1.本系统囊括计算机学院所有教师工作室，涉及多个方向，请大家慎重考虑。<br/><br/>
					2.每个人最多向三个工作室投递简历，简历内容应尽可能体现你的个人特点。<br/><br/>
					3.每个工作室将会对收到的所有简历，进行筛选，进行下一步的纳新或考核。<br/><br/>
				</span>
				<a href="javascript:void(0);" id="relation">联系我们</a>
			</div>
		</div>
	</div>
	<div class="backtop icon icon-chevron-up"></div>
	<div id="shade">
		<div align="center">
			<img class="shade-head" src="/workroom/Public/images/logo.png" />
		</div>
			<div class="forms">
			<p class="title">请在此填写您对此网站的意见</p>
			<form action="/workroom/index.php/Home/Introduce/suggest" method="post">
				<label for="problem">网站问题：</label>
				<p>
					<textarea name="problem" id="problem" ></textarea>
				</p>
				<p style="margin: 10px 0">是否愿意留下您的姓名与联系方式？</p>
				<label for="name">姓名：</label>
				<p>
					<input type="text" name="name" id="name" />
				</p>
				<label for="QQ">QQ：</label>
				<p>
					<input type="text" name="call_method" id="QQ" />
				</p>
				<label for="code">验证码：</label>
				<p>
					<input type="text" name="code" id="code" style="width:200px;" />
					<img src="/workroom/Public/image.php" id="myImg" alt="看不清换一张" title="看不清换一张" style="cursor:pointer;width:100px;height:25px;" onclick="changeImg()" align="absmiddle" />
				</p>
				<input type="submit" value="告诉他们">
				<a href="javascript:void(0);" id="close">关闭页面</a>
			</form>
			</div>
			</div>
	<script>
		$(function(){
			mouseHover();
			backTop();
			onLoads();
			showShade();
			validate();
		});
	</script>
</body>
</html>