<?php 
	header("content-type:text/html;charset=utf-8");
	require_once './class/sql.php';
	class run
	{
		/*登陆*/
		private function login(){
			@$_SESSION['name'] = $_POST["name"];
			@$_SESSION['password'] = $_POST["password"];
			/*分页显示的index索引*/
            $_SESSION["index"] = 0;
            /*分页最显示的按钮数量*/
            $_SESSION['agebtn'] = 5;
            /*开始的分页的index*/
            $_SESSION['startIndex'] = 0;
			$sql = new Sqls();
			$sql->Link("admin");
			$i = $sql->SelData(array("username"=>$_SESSION['name']),array("password"=>md5($_SESSION['password'])));
			if($i){
				if(isset($_POST['remember'])){
					/*用$_COOKIE*/
					setcookie("login", 'true', time() + 60*30);
					setcookie("name", $_SESSION['name'], time() + 60*30);
					// sleep(2);
					@$_SESSION["login"] =  'true';
				}else{
					$_SESSION["login"] =  'true';
				}
			}else{
				if(isset($_SESSION["login"]))unset($_SESSION["login"]);
			}
			$this->test();
		}
		/*退出*/
		private function isExit(){
			if(isset($_COOKIE)){
				@setcookie("login", 'true', 0);
				@setcookie("name", $_SESSION['password'], 0);
			}
			unset($_SESSION["login"]);
			include "./view/login.php";
			die;
		}
		/**/
		private function test(){
			if(@!empty($_SESSION["login"])){
				include "./view/index.php";
				die;
			}else{
				include "./view/login.php";
				echo "<script>alert('用户或密码错误！')</script>";
				die;
			}
		}
		/*修改密码*/
/*		private function SelData(){
			$sql = new Sqls();
			$sql->Link();
			$y = $_POST["y"];
			$i = $sql->SelData($_SESSION['name'],$y);
			先查询密码是否正确
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
		}*/
		/*注册*/
/*		private function Reg(){
			$sql = new Sqls();
			$sql->Link();
			@$_SESSION['name'] = $_POST["name"];
			@$_SESSION['password'] = $_POST["password"];
			$arr = array("username"=>$_SESSION['name']);
			$i = $sql->SelData($arr);
			进行用户名查询
			if(isset($i) && !empty($i)){
				echo "<script>alert('该用户名已被占用！');</script>";
				include "class/login.php";
				return;
			}
			没有同名用户进行注册
			$arr = array("username"=>$_SESSION['name'],"password"=>md5($_SESSION['password']));
			$sql->addData($arr);
			if($sql->SelData(
							array("username"=>$_SESSION['name']),
							array("password"=>md5($_SESSION['password']))
							)
			  ){
				echo "<script>alert('注册成功！');</script>";
				$_SESSION["login"] = true;
				include "class/home.php";
			}
		}*/
		/*删除数据*/
		private function DelData(){
			if(@!$_SESSION["login"]) include "./view/login.php";
			$id = array('id' =>$_GET["id"]);
			$sql = new Sqls();
			$sql->Link("news");
			$sql->DelData($id);
			include "./view/index.php";
			die;
		}
		/*插入数据*/
		private function release(){
			if(@!$_SESSION["login"]) include "./view/login.php";
			$sql = new Sqls();
			$sql->Link("news");
			$content = array(
							'title' => $_POST['small-input'],
							'author' => $_POST['medium-input'],
							'create_time' => time(),
							'content' => $_POST['textfield']
							 );
			$sql->addData($content);
			include "./view/index.php";
			die;
		}
		/*添加文章页  Publish.php*/
		private function publish(){
			if(@!$_SESSION["login"]) include "./view/login.php";
			include './view/Publish.php';
			die;
		}
		/*文章管理主页  index.php*/
		private function home(){
			if(@!$_SESSION["login"]) include "./view/login.php";
			include './view/index.php';
			die;
		}
		/*分页请求处理*/
		private function pages(){
			if(@!$_SESSION["login"]) {include "./view/login.php"; die;}
			if(isset($_GET['first'])){
				/*到第一个分页*/
				$_SESSION['index'] = 0;
				$_SESSION['startIndex'] = 0;
			}elseif(isset($_GET['last'])) {
				/*到最后一个分页*/
				$_SESSION['index'] = $_SESSION['maxpage'] - 1;
				$_SESSION['startIndex'] = $_SESSION['maxpage'] - $_SESSION['agebtn'];
			}elseif(isset($_GET['previous'])){
				/*上一页*/
				$_SESSION['index'] -= $_GET['previous'];
				if($_SESSION['index'] < ($_SESSION['startIndex'])){
					$_SESSION['startIndex'] -= $_GET['previous'];
				}
			}elseif(isset($_GET['next'])){
				/*下一页*/
				$_SESSION['index'] += $_GET['next'];
				if($_SESSION['index'] >= ($_SESSION['startIndex'] + $_SESSION['agebtn'])){
					$_SESSION['startIndex'] += $_GET['next'];
				}
			}else{
				$_SESSION["index"] = $_GET["pages"];
			}
			include './view/index.php';
			die;
		}
		/*文章修改*/
		private function updata(){
			if(@!$_SESSION["login"]) include "./view/login.php";
			$link = new Sqls();
			$link->Link('news');
			/*保存修改后提交的id */
			$_SESSION['id'] = $_GET['id'];
			$_SESSION['updata'] = $link->SelData(array("id" => $_GET['id']));
			if($_SESSION['updata'])
			include './view/updata.php';
			die;
		}
		/*文章修改提交*/
		private function SubUpdata(){
			if(@!$_SESSION["login"]) include "./view/login.php";
			$sql = new Sqls();
			$sql->Link("news");
			$content = array(
							'title' => $_POST['small-input'],
							'author' => $_POST['medium-input'],
							'create_time' => time(),
							'content' => $_POST['textfield']
							 );
			$sql->changeData($content,$_SESSION['id']);
			include "./view/index.php";
			die;
		}
		/*入口*/
		public function ruk(){
			if(isset($_SESSION) && isset($_POST["login"])){
				/*进入登录*/
				$this->login();
			}elseif (isset($_SESSION) && isset($_GET["die"])) {
				/*进入退出*/
				$this->isExit();
			}elseif(isset($_GET["del"]) && $_GET["del"] == 1){
				/*删除*/
				$this->DelData();
			}elseif (isset($_POST["release"])) {
				/*插入数据*/
				$this->release();
			}elseif (isset($_GET["publish"]) && $_GET["publish"] == 1) {
				/*进入添加文章页面*/
				$this->publish();
			}elseif (isset($_GET["index"]) && $_GET["index"] == 1) {
				/*进入index页面*/
				$this->home();
			}elseif (isset($_SESSION) && isset($_GET['pages'])) {
				/*处理分页请求*/
				$this->pages();
			}elseif(isset($_SESSION) && isset($_GET['set']) && $_GET['set'] == 1){
				/*修改文章*/	
				$this->updata();
			}elseif(isset($_SESSION) && isset($_GET['updata'])){
				/*文章修改提交*/
				$this->SubUpdata();
			}else{
				if(isset($_COOKIE["login"])){
					/*有COOKIE时放回还原SESSION数据*/
					$_SESSION["login"] =  $_COOKIE["login"];
					$_SESSION["index"] =  0;
					$_SESSION["name"] =  $_COOKIE["name"];
					$_SESSION['startIndex'] = 0;
					include "./view/index.php";
					return;
				}
				include "./view/login.php";
			}
		}
	}