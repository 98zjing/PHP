<?php 
error_reporting(0);
	class Sql
	{
		private $host = null;
		private $user = null;
		private $pwd  = null;
		private $db_name =  null;
		private $tb_name =  null;
		private $link = null;
		//引入数据库配置
		private function config(){
			require "confg/confg.php";
			$this->host = $confg["host"];
			$this->user = $confg["user"];
			$this->pwd = $confg["pwd"];
			$this->db_name = $confg["db_name"];
			$this->tb_name = $confg["tb_name"];
		}
		//链接数据库
		public function Link(){
			$this->config();
			$this->link = new mysqli($this->host,$this->user,$this->pwd,$this->db_name);
			if($this->link){
				$sql = "SELECT * FROM {$this->tb_name}";
				$mySql = $this->link->query($sql);
				if(isset($_GET["nickname"]) and $_GET["nickname"] != null){
					//添加数据
					$this->addData();
				}
				//
				$arr = array();
				 while($row = $mySql->fetch_row()){
					array_push($arr, $row);
				}
				$_SESSION["data"] = $arr;
				return true;
			}else{	
				return false;
			}
		} 
		// 数据添加
		public function addData(){
				$name = $_GET["nickname"];
				$gameTime = $_SESSION["time"];
				$time = date("M/D/Y");
				$path = $_SESSION["file"];
				$moves = $_SESSION["addUser"];
				$sql =  "INSERT INTO `db_up`.`tb_game` (`gameTime`, `name`, `time`, `userPath`, `moves`) VALUES('" .$gameTime. "','" .$name. "','" .$time. "','" .$path. "','" .$moves. "');";
				 $this->link->query($sql);
		}
	}