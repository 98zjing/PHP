<?php 
	header("content-type:text/html;charset=utf-8");
	require_once 'class/sql.php';
	class run
	{
		/*登陆*/
		private function login(){
			@$_SESSION['name'] = $_POST["name"];
			@$_SESSION['password'] = $_POST["password"];
			$sql = new Sqls();
			$sql->Link();
			$i = $sql->SelData(array("username"=>$_SESSION['name']),array("password"=>md5($_SESSION['password']));
			if($i){
				$_SESSION["login"] = true;
			}else{
				if(isset($_SESSION["login"]))unset($_SESSION["login"]);
			}
			$this->test();
		}
		/*退出*/
		private function isExit(){
			unset($_SESSION["login"]);
			include "class/login.php";
		}
		/**/
		private function test(){
			if(!empty($_SESSION["login"])){
				include "class/home.php";
			}else{
				include "class/login.php";
				echo "<script>alert('用户或密码错误！')</script>";
			}
		}
		/*修改密码*/
		private function SelData(){
			$sql = new Sqls();
			$sql->Link();
			$y = $_POST["y"];
			$i = $sql->SelData($_SESSION['name'],$y);
			/*先查询密码是否正确*/
			if(!$i){
				echo "<script>alert('您输入的密码有误！')</script>";
				$this->test();
				echo "<script>document.getElementById('new').style.display = 'block';</script>";
				return;
			}
			if( $_POST["new"] == $_POST["mine"]){
				$set = array("password"=>md5($_POST["new"]));
				$where = array("username"=>$_SESSION["name"]);
				if($sql->changeData($set,$where)){
					$_SESSION["password"] = $y;
					echo "<script>alert('密码修改成功！')</script>";
					$this->test();
				}
			}else{
				echo "<script>alert('两次输入的密码有误！')</script>";
				$this->test();
				echo "<script>document.getElementById('new').style.display = 'block';</script>";
				return;
			}
		}
		/*注册*/
		private function Reg(){
			$sql = new Sqls();
			$sql->Link();
			@$_SESSION['name'] = $_POST["name"];
			@$_SESSION['password'] = $_POST["password"];
			$arr = array("username"=>$_SESSION['name']);
			$i = $sql->SelData($arr);
			/*进行用户名查询*/
			if(isset($i) && !empty($i)){
				echo "<script>alert('该用户名已被占用！');</script>";
				include "class/login.php";
			}else{
				/*没有同名用户进行注册*/
				$arr = array("username"=>$_SESSION['name'],"password"=>md5($_SESSION['password']));
				$sql->addData($arr);
				if($sql->SelData(array("username"=>$_SESSION['name']),array("password"=>md5($_SESSION['password'])))){
					echo "<script>alert('注册成功！');</script>";
					$_SESSION["login"] = true;
					include "class/home.php";
				}
			}
		}
		/*入口*/
		public function ruk(){
			if(isset($_SESSION) && isset($_POST["login"])){
				/*进入登录*/
				$this->login();
			}elseif (isset($_SESSION) && isset($_GET["die"])) {
				/*进入退出*/
				$this->isExit();
			}elseif(isset($_SESSION) && isset($_POST["modify"])){
				/*进入修改密码*/
				$this->SelData();
			}elseif(isset($_SESSION) && isset($_POST["reg"])){
				/*进入注册*/
				$this->Reg();
			}else{
				include "./class/login.php";
			}
		}
	}