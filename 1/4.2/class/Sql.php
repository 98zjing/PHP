<?php 

// error_reporting(0);
	class Sql
	{
		private $host = "localhost:3306";
		private $user = "root";
		private $pwd = "root";
		private $link = null;
		//链接数据库
		public function Link($db_name,$tb_name){
			$this->link = new mysqli($this->host,$this->user,$this->pwd,$db_name);
			if($this->link){
				$sql = "SELECT * FROM {$tb_name}";
				$mySql = $this->link->query($sql);
				$this->addData();
				$arr = array();
				 while($row = $mySql->fetch_row()){
					array_push($arr, $row);
				}
				$_SESSION["data"] = $arr;
				return true;
			}else{	
				echo "数据库链接失败！";
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



















