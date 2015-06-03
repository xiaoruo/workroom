<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>工作室综合信息服务平台</title>
	<link rel="icon" href="/workroom/Public/images/ioc.ioc" type="image/x-iocn">
	<link rel="stylesheet" href="/workroom/Public/css/total.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="/workroom/Public/css/resume.css">
	<script src="/workroom/Public/js/jquery.1.4.2-min.js" type="text/javascript"></script>
	<script src="/workroom/Public/js/validate.js" type="text/javascript"></script>
	<script type="text/javascript">
		function changeImg(){
			$("#myImg").attr("src","/workroom/Public/image.php?id="+new Date());
		}
	</script>
</head>
<body>
	<div class="photo">
		<a href="index.html"><img src="/workroom/Public/images/logo.png" /></a>
	</div>
	<div class="main">
		<div class="main-top">我的简历</div>
		<div class="main-forms">
			<h4>请输入真实的个人信息,以便工作室对各位同学进行信息收集及发布考核信息</h4>
			<form action="/workroom/index.php/Home/Introduce/join_check" id="forms" method="post">
				<input type="hidden" name="hidden" value="<?php echo ($messageId); ?>">
				<label for="id">学号<font color="#FF8989">*</font>：</label>
				<p>
					<input type="text" name="number" id="number"/>
				</p>
				<label for="name">姓名<font color="#FF8989">*</font>：</label>
				<p>
					<input type="text" name="name" id="name" />
				</p>
				<label for="class">班级<font color="#FF8989">*</font>：</label>
				<p>
					<!-- <input type="text" name="class" id="class"> -->
					<select name="class" id="class">
						<?php if(is_array($class)): foreach($class as $key=>$value): ?><option value="<?php echo ($value["classId"]); ?>"><?php echo ($value["className"]); ?></option><?php endforeach; endif; ?>
					</select>
				</p>
				<label for="QQ">QQ<font color="#FF8989">*</font>：</label>
				<p>
					<input type="text" name="QQ" id="QQ">
				</p>
				<label for="sex">性别<font color="#FF8989">*</font>：</label>
				<p>
					<input type="radio" name="sex" value="1" checked>男
					<input type="radio" name="sex" value="2">女
				</p>
				<label for="own">学习经历(学习过的计算机相关知识)：</label>
				<p>
					<textarea name="oldStudy" id="oldStudy"></textarea>
				</p>
				<label for="own">加入原因：</label>
				<p>
					<textarea name="joinResult" id="joinResult"></textarea>
				</p>
				<label for="own">个人简介：</label>
				<p>
					<textarea name="instructions" id="own"></textarea>
				</p>
				<label for="future">未来学习设想：</label>
				<p>
					<textarea name="future" id="future"></textarea>
				</p>
				<label for="code">验证码<font color="#FF8989">*</font>：</label>
				<p>
					<input type="text" name="code" id="code" class="code">
					<img src="/workroom/Public/image.php" id="myImg" alt="看不清换一张" title="看不清换一张" style="cursor:pointer;width:100px;height:25px;" onclick="changeImg()" align="absmiddle" />
				</p>
				<a href="/workroom/index.php/Home/Introduce/index" class="back">返回</a>
				<input type="submit" value="提交" />
			</form>
		</div>
	</div>
	<div class="copy">Copyright&copy;Parabola.</div>
	<script>
		$(function(){
			validate();
		});
	</script>
</body>
</html>