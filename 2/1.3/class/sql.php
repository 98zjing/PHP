<?php 
 	class Sqls
 	{
 		private $error = '';
 		/*默认为*/
 		private $host = "";
 		private $user_name = "";
 		private $password = "";
 		private $db_name = "";
 		private $tb_name = "";
 		private $mySqli = null;
 		/*导入数据库配置*/
 		private function Config()
 		{
 			require "config/config.php";
 			$this->host = $config["host"];
 			$this->user_name = $config["user_name"];
 			$this->password = $config["password"];
 			$this->db_name = $config["db_name"];
 			$this->tb_name = $config["tb_name"];
 		}
 		/*链接*/
 		public function Link()
 		{
 			$this->Config();
 			$this->mySqli = new mySqli($this->host,$this->user_name,$this->password,$this->db_name);
 			if(!empty($this->mySqli)){
 				$this->mySqli->query('SET NAMES UTF8');
 			}else{
 				$this->error = "Connect Error (". mysqli_connect_errno() . mysqli_connect_error() .")";
 				return $this->error;
 			}
 		}
 		/*每次操作链接检查*/
 		private function Check(){
 			if(empty($this->mySqli)){
				$this->error = "请检查数据库是否链接";
				return $this->error;
				die;
			}
 		}
 		/*查询*/
 		public function SelData($where=1,$like=1)
 		{
 			$this->Check();
			$arr = array();
			if($like == 1 && $where == 1){
				$sql = "SELECT * FROM " .$this->tb_name. " WHERE " .$where. " AND " .$like; 
				$rows = $this->mySqli->query($sql);
				if($rows == false) return false;
				/*获取所有数据*/
				while ($row = $rows->fetch_assoc()) {
					array_push($arr, $row);
				}
			}elseif($where != 1 && $like == 1){
				if(!is_array($where)){
					$this->error = "请输入array类型！";
					return $this->error;
					die;
				}
				foreach ($where as $key => $val) {
					$sql = "SELECT * FROM " .$this->tb_name. " WHERE " .$key. "='" .$val. "'";
				}
				$rows = $this->mySqli->query($sql);
				/*获取一行数据*/
				@$arr = $rows->fetch_assoc();
			}elseif($like != 1 && $where != 1){
				if(!is_array($where) && !is_array($like)){
					$this->error = "请输入array类型！";
					return $this->error;
					die;
				}
				foreach ($where as $key => $val) {
					$sql = "SELECT * FROM " .$this->tb_name. " WHERE " .$key. "='" .$val. "'";
				}
				foreach ($like as $key => $val) {
					$sql .= " AND " .$key. "='" .$val. "'";
				}
				$rows = $this->mySqli->query($sql);
				/*获取一行数据*/
				@$arr = $rows->fetch_assoc();
			}
			return $arr;
		}
		//添加
		public function addData($data=array()){
			$this->Check();
			if(!is_array($data)){
				$this->error = "请输入array类型！";
				return $this->error;
				die;
			}
			$arr = array();
			$sql = "INSERT INTO " .$this->tb_name ." ";
			$sql .= "(" .(implode(',',array_keys($data))). ")";
			$varStr = " VALUES (";
			$vals = array_values($data);
			foreach ($vals as $val) {
				$varStr .= "'" .$val. "',";
			}
			/**/
			$sql .= subStr($varStr,0,-1) .")";
			if($this->mySqli->query($sql)){
				return true;
			}else{
				return false;
			}
		}
		/*删除*/
		public function DelData($data=array())
		{
			$this->Check();
			if(!is_array($data)){
				$this->error = "请输入array类型！";
				return $this->error;
				die;
			}
			$arr = array();
			$sql = "DELETE FROM " .$this->tb_name. " WHERE ";
			$varStr = "";
			foreach ($data as $key=>$val) {
				$varStr .= $key. "='" .$val. "'";
			}
			$sql .= $varStr;
			if($this->mySqli->query($sql)){
				return true;
			}else{
				return false;
			}
		}
		/*改 $set更改后的值 $where更改的目标*/
		public function changeData($set=array(),$where=array()){
			$this->Check();
			if(!is_array($set) && !is_array($where)){
				$this->error = "请输入array类型！";
				return $this->error;
				die;
			}
			echo "sss";
			$arr = array();
			foreach ($set as $key => $val) {
				$sql = "UPDATE " .$this->tb_name. " SET " .$key. "='" .$val. "'";
			}
			foreach ($where as $key => $val) {
				$sql .= " WHERE " .$key. "='" .$val. "'";
			}
			if($this->mySqli->query($sql)){
				return true;
			}else{
				return false;
			}
		}
 	}