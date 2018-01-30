<?php 
	include "class/filePath.php";
	// include "confg/confg.php";
	include "class/isWin.php";
	include "class/Sql.php";
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
				if(!empty($_FILES["photo"]) and $_FILES["photo"]["tmp_name"] != null){
					$path = "uploads/";
					$fileName = filePath::submitFile($_FILES["photo"],$path);
					if($fileName !=false){
						$_SESSION["file"] = $path .$fileName;
					}else{
						echo "文件上传失败！";
						die;
					}
				}
				isWin::start();
				$this->isShow();
		}
		//ajax用于游戏过程中数据的计算
		private function isAjax(){
			isWin::isGame($_GET["where"]);
		}
		//游戏数据提交
		private function isSql(){
			$link = new Sql();
			if($link->Link() != true){
				echo "数据库链接失败！";
				die;
			}
			$this->isShow();
		}
		//入口
		public function run(){
			if(!empty($_POST)){
				$this->isPOST();
			}elseif(isset($_GET["ajax"]) and $_GET["ajax"] == "y"){
				$this->isAjax();
			}else{
				$this->isSql();
				$this->isGET();
			}
		}
	}
