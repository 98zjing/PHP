<?php 
	class run
	{
		/*登陆*/
		private function login(){
			@$_SESSION['name'] = $_POST["name"];
			@$_SESSION['password'] = $_POST["password"];
			$arr = $_SESSION['names'];
			foreach ($arr as $key => $value) {
				if($key == $_SESSION['name'] && $value == $_SESSION['password']){
					$_SESSION["login"] = true;
				}	
			}
			$this->test();
		}
		/*退出*/
		private function isExit(){
			unset($_SESSION["login"]);
			$this->test();
		}
		/**/
		private function test(){
			if(!empty($_SESSION["login"])){
				include "class/home.php";
			}else{
				include "class/login.php";
			}
		}
		/*入口*/
		public function ruk(){
			if(isset($_SESSION) && isset($_POST["go"])){
				$this->login();
			}elseif (isset($_SESSION) && isset($_POST["exit"])) {
				$this->isExit();
			}else{
				include "./class/login.php";
			}
		}
	}