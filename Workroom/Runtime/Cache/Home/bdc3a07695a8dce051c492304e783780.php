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
	<script>window.location.href='http://cdn.dmeng.net/upgrade-your-browser.html?referrer='+location.href;</script>
	<link rel="stylesheet" href="/workroom/Public/css/ie7.css">
	<![endif]-->
	<script src="/workroom/Public/js/jquery.1.4.2-min.js" type="text/javascript"></script>
	<script src="/workroom/Public/js/jquery.color.js" type="text/javascript"></script>
	<script src="/workroom/Public/js/jquery.timelinr-0.9.3.js" type="text/javascript"></script>
	<script src="/workroom/Public/js/main.js" type="text/javascript"></script>
</head>
<body>
	<div id="top" class="nav clearfix">
		<a class="nav-logo" href="#top">
			<img src="/workroom/Public/images/logo.png" alt=""></a>
		<ul class="nav-bar clearfix">
			<li>
				<a href="#top">首页</a>
			</li>
			<li>
				<a href="#college">院系介绍</a>
			</li>
			<li>
				<a href="#notice">纳新公告</a>
			</li>
			<li>
				<a href="#search">工作室索引</a>
			</li>
			<li>
				<a href="/workroom/index.php/Home/Introduce/index">工作室介绍</a>
			</li>
		</ul>
		<a class="nav-bgd" href="#">工作室入口</a>
	</div>
	<h2>大连民族学院&nbsp;计算机科学与工程学院</h2>
	<h1>工作室综合服务平台</h1>
	<div class="public"></div>
	<!-- 第一部分 -->
	<div id="college"class="clearfix">
		<h3>学院简介</h3>
		<div class="college-left clearfix">
			<img src="/workroom/Public/images/bgg.jpg">
			　　计算机科学与工程学院前身为计算机科学与工程系，始建于1999年7月，2005年学校实行二级学院制管理。经过九年的发展，计算机科学与工程学院一培养实用型、应用型人才为主，注重培养学生的实践能力。教师立足专业，以工作室为平台，培养学生的实践创新能力，为学生提供实践机会。
			<br/>
			　　工作室，由计算机科学与工程学院李锡祚院长率先提出，并成立第一批工作室。工作室主要目的是增强学生与老师交流、提高学生实践创新能力。其中，ACM工作室和仿真机器人工作室主要代表学校参加各种创新比赛等，自成立至今获得市级、省级、国家级、国际级等各种比赛的各种奖项。<br/>
			　　计算机科学与工程学院前身为计算机科学与工程系，始建于1999年7月，2005年学校实行二级学院制管理。经过九年的发展，计算机科学与工程学院一培养实用型、应用型人才为主，注重培养学生的实践能力。教师立足专业，以工作室为平台，培养学生的实践创新能力，为学生提供实践机会。
		</div>
	</div>
	<!-- 第二部分 -->
	<div id="notice">
		<div class="notice-head">
			<h2>纳新公告</h2>
			<p>你可以在这里查询到最新的纳新信息呦~</p>
		</div>
				<div class="notice-main">
			<div id="timeline">
				<ul id="dates">
				<?php if(is_array($noticeTime)): foreach($noticeTime as $key=>$v1): ?><li><a href="javascript:void(0)"><?php echo ($v1["time"]); ?></a></li><?php endforeach; endif; ?>	
				</ul>
				<ul id="issues">
				<?php if(is_array($notice)): foreach($notice as $key=>$v2): ?><li id="">
						<h1><?php echo ($v2["title"]); ?></h1>
						<p><?php echo ($v2["content"]); ?></p>
					</li><?php endforeach; endif; ?>
				</ul>
				<div id="grad_left"></div>
				<div id="grad_right"></div>
				<a href="javascript:void(0)" id="next">&gt;</a>
				<a href="javascript:void(0)" id="prev">&lt;</a>
			</div>
		</div>
	</div>
	<div id="search" class="clearfix">
		<div class="search clearfix">
			<div class="search-left">
				<h1>全站查找</h1>
				<p>输入你的条件查找符合你条件的工作室</p>
			</div>
			<div class="search-right">
				<form action="/workroom/index.php/Home/Introduce/index" method="post">
					<input type="text" name="workroomName" placeholder="请输入工作室名称"/>
					<input type="submit" value="查找" />
				</form>
			</div>
		</div>
	</div>
	<!-- 第三部分 -->
	<div class="guide">
		<table>
			<tr>
				<td >
					<a href="/workroom/index.php/Home/Introduce/index/study_find/web">
						<span class="icon icon-windows"></span>
						<h3>web</h3>
						<p>新一代的网站开发技术</p>
					</a>
				</td>
				<td>
					<a href="/workroom/index.php/Home/Introduce/index/study_find/android">
						<span class="icon icon-android"></span>
						<h3>android</h3>
						<p>一手机，一世界</p>
					</a>
				</td>
				<td>
					<a href="/workroom/index.php/Home/Introduce/index/study_find/ios">
						<span class="icon icon-apple"></span>
						<h3>ios</h3>
						<p>扁平化的创造者</p>
					</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="/workroom/index.php/Home/Introduce/index/study_find/云">
						<span class="icon icon-cloud"></span>
						<h3>云计算</h3>
						<p>开源、高效、云存储</p>
					</a>
				</td>
				<td>
					<a href="/workroom/index.php/Home/Introduce/index/study_find/网络安全">
						<span class="icon icon-stats"></span>
						<h3>网络安全</h3>
						<p>数字领域守护者</p>
					</a>
				</td>
				<td>
					<a href="/workroom/index.php/Home/Introduce/index/study_find/数学建模">
						<span class="icon icon-cubes"></span>
						<h3>数学建模</h3>
						<p>大数据时代下的必修课</p>
					</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="/workroom/index.php/Home/Introduce/index/study_find/机器人">
						<span class="icon icon-soccer"></span>
						<h3>机器人</h3>
						<p>人工智能的典型用例</p>
					</a>
				</td>
				<td>
					<a href="/workroom/index.php/Home/Introduce/index/study_find/ACM">
						<span class="icon icon-group"></span>
						<h3>ACM</h3>
						<p>算法提高必经之路</p>
					</a>
				</td>
				<td>
					<a href="/workroom/index.php/Home/Introduce/index/study_find/java">
						<span class="icon icon-fire"></span>
						<h3>Java</h3>
						<p>应用最广泛的语言</p>
					</a>
				</td>
			</tr>
		</table>
	</div>
	<!-- 第四部分 -->
	<div class="footer">
		<img class="footer-logo" src="/workroom/Public/images/logo.png" />
		<p class="footer-introduce">
			工作室公共信息服务平台 给广大学生提供服务的平台
		</p>
		<p class="footer-copy">
			Copyright &copy; 2015&nbsp;Parabola.&nbsp;All rights
		</p>
	</div>
	<!-- 第五部分 -->
	<div class="backtop icon icon-chevron-up"></div>
	<!-- 返回顶部 -->
	<div id="nav-new">
		<div class="nav clearfix">
			<a class="nav-logo" href="#top">
				<img src="/workroom/Public/images/logos.png">
			</a>
			<ul class="nav-bar clearfix">
				<li>
					<a href="#top">首页</a>
				</li>
				<li>
					<a href="#college">院系介绍</a>
				</li>
				<li>
					<a href="#notice">纳新公告</a>
				</li>
				<li>
					<a href="#search">工作室索引</a>
				</li>
				<li>
					<a href="/workroom/index.php/Home/Introduce/index">工作室介绍</a>
				</li>
			</ul>
			<a class="nav-bgd" href="#">工作室入口</a>
		</div>
	</div>
	<script>
		$(function() {
			mouseHover();
			backTop();
			showNav();
			skip();
			$().timelinr();
		});
	</script>
</body>
</html>