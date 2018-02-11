<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		#app{
			width: 700px;
			height: 600px;
			margin: 0 auto;
			border: 1px solid #ccc;
			border-radius: 10px;
			text-align:center;
		}
	</style>
</head>
<body>
	<div id="app">
		<form action="index.php" method="POST">
			<p>
				用户名：<input type="text" name="name">
			</p>
			<p>
				密码：<input type="password" name="password">
			</p>
			<p>
				<input type="submit" name="login" value="登录">
				<input type="submit" name="reg" value="注册">
			</p>
		</form>
	</div>
</body>
</html>