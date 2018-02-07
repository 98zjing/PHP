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
			<form action="index.php" method="POST">
				<?php echo "欢迎：".$_SESSION["name"]; ?>
				<input type="submit" name="exit" value="退出">
			</form>
		</div>
	</div>
</body>
</html>