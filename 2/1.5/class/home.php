<?php 
	include "public.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		#app{
			width: 960px;
			margin: 0 auto;
		}
	</style>
</head>
<body>
	<div id="app">
		<div class="right">
				<?php echo "欢迎：".$_SESSION["name"]; ?>
				<a href="index.php?die=1">退出</a>
				<a href="##" id="change">密码修改</a>
		</div>
		<div id="new" style="display: none;">
			<form action="index.php" method="POST">
				<p>原密码：<input type="password" name="y"></p>
				<p>新密码：<input type="password" name="new"></p>
				<p>再次输入新密码：<input type="password" name="mine"></p>
				<p><input type="submit" name="modify"></p>
			</form>
		</div>
	</div>
</body>
<script>
	document.getElementById('change').onclick = function(){
		document.getElementById('new').style.display = 'block';
	}
</script>
</html>