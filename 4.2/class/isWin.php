<?php 
	class isWin 
	{
		//开始新游戏所有步数初始化
		public static function start(){
			$_SESSION["path"] = array();
			for($i=0;$i<9;$i++){
				array_push($_SESSION["path"], $i);
			}
			$_SESSION["user"] = array();
			$_SESSION["computer"] = array();
			$_SESSION["win"] = array(
									array(0,1,2),
									array(3,4,5),
									array(6,7,8),
									array(0,3,6),
									array(1,4,7),
									array(2,5,8),
									array(0,4,8),
									array(2,4,6),
								);
			//开始新的游戏原有获胜方被移除
			unset($_SESSION["alert"]);
			//玩家下棋步数
			$_SESSION["addUser"] = 0;
			//电脑下棋步数
			$_SESSION["addComputer"] = 0;
			//游戏时间
			$_SESSION["time"] = 0;
			//控制时间请求 默认为false  为true时游戏结束不再请求
			$_SESSION["untime"] = false;
		}
		//走棋数据处理
		public static function isGame($where){
			switch ($where) {
				//用户走棋
				case 'user':
					$_SESSION["addUser"]++;
					array_push($_SESSION["user"],$_GET["index"]);
					unset($_SESSION["path"][$_GET["index"]]);
					//判定
					if(self::Win($_SESSION["user"],$_SESSION["win"]) == true){
						//玩家赢
						$_SESSION["untime"] = true;
						$_SESSION["alert"] = "You Win!!";
						$arr = array("game"=>"user","user"=>$_SESSION["user"],"computer"=>$_SESSION["computer"],"addUser"=>$_SESSION["addUser"],"addComputer"=>$_SESSION["addComputer"],"time"=>$_SESSION["time"]);
						echo json_encode($arr);
					}else{
						//没人赢游戏继续
						$index = self::computerIndex() + 1;
						$arr = array("index"=>$index,"user"=>$_SESSION["user"],"computer"=>$_SESSION["computer"],"addUser"=>$_SESSION["addUser"],"addComputer"=>$_SESSION["addComputer"],"time"=>$_SESSION["time"]);
						echo json_encode($arr);
					}
					break;
				//电脑走棋
				case 'computer':
					$_SESSION["addComputer"]++;
					array_push($_SESSION["computer"],$_GET["index"]);
					unset($_SESSION["path"][$_GET["index"]]);
					//判定
					if(self::Win($_SESSION["computer"],$_SESSION["win"]) == true){
						// 电脑赢
						$_SESSION["untime"] = true;
						$_SESSION["alert"] = "Computer Win!!";
						$arr = array("game"=>"computer","user"=>$_SESSION["user"],"computer"=>$_SESSION["computer"],"addUser"=>$_SESSION["addUser"],"addComputer"=>$_SESSION["addComputer"],"time"=>$_SESSION["time"]);
						echo json_encode($arr);
					}else{
						//没人赢游戏继续
						$arr = array("user"=>$_SESSION["user"],"computer"=>$_SESSION["computer"],"addUser"=>$_SESSION["addUser"],"addComputer"=>$_SESSION["addComputer"],"time"=>$_SESSION["time"]);
						echo json_encode($arr);
					}
					break;
				//页面刷新用游戏数据重新载入
				case 'load':
					$_SESSION["alert"] = isset($_SESSION["alert"])?
										 $_SESSION["alert"]:
										 false;
					$_SESSION["untime"] = isset($_SESSION["untime"])?
										 $_SESSION["untime"]:
										 false;
					$arr = array("user"=>$_SESSION["user"],"computer"=>$_SESSION["computer"],"alert"=>$_SESSION["alert"],"addUser"=>$_SESSION["addUser"],"addComputer"=>$_SESSION["addComputer"],"time"=>$_SESSION["time"],);
					echo json_encode($arr);
					break;
				//开始新的游戏
				case 'start':
					self::start();
					break;
				//游戏时间
				case 'time':
					if($_SESSION["untime"] !=true){
						$_SESSION["time"]++;
						echo json_encode(array("time"=>$_SESSION["time"]));
					}else{
						echo json_encode(array("time"=>$_SESSION["time"],"untime"=>$_SESSION["untime"]));
					}
					break;
				default:
					# code...
					break;
			}
		}
		private static function computerIndex(){
			$index = array_rand($_SESSION["path"]);
			return $_SESSION["path"][$index];
		}
		private static function Win($where,$paths){
			foreach ($paths as $path){
				$num = 0;
				foreach ($where as $value) {
					if(in_array($value, $path)){
						$num++;
					}
					if($num>=3){
						return true;
					}
				}
			}
			return false;
		}

	}
