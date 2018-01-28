<?php 
	include "class/filePath.php";
	include "confg/confg.php";
	include "class/isWin.php";
	class Game
	{
		//游戏界面显示
		private function isShow(){
			$_SESSION["template"] = isset($_GET["template"])?
								$_GET["template"]:
								0;
			include "View/view.php";
		}
		//GET请求主要用于游戏界面显示
		private function isGET(){
			$this->isShow();
		}
		//POST用于文件上传
		private function isPOST(){
				isWin::start();
				$this->isShow();
		}
		//ajax用于游戏过程中数据的计算
		private function isAjax(){
			isWin::isGame($_GET["where"]);
		}
		public function run(){
			if(!empty($_POST)){
				$this->isPOST();
			}elseif(isset($_GET["ajax"]) and $_GET["ajax"] == "y"){
				$this->isAjax();
			}else{
				// isWin::start();
				$this->isGET();
			}
		}
	}
