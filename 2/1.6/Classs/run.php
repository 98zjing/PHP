<?php 
	header("content-type:text/html;charset=utf-8");
	class run extends Classs\Users
	{
		/*登陆*/
		private function login()
		{
			@$_SESSION['name'] = $_POST["name"];
			@$_SESSION['password'] = $_POST["password"];
			/*分页显示的index索引*/
            $_SESSION["index"] = 0;
            /*分页最显示的按钮数量*/
            $_SESSION['agebtn'] = 5;
            /*开始的分页的index*/
            $_SESSION['startIndex'] = 0;
			$sql = new Classs\Sqls();
			$sql->Link("admin");
			$_SESSION['admin'] = $sql->SelData(array("username"=>$_SESSION['name']),array("password"=>md5($_SESSION['password'])));
			if($_SESSION['admin']){
				if(isset($_POST['remember'])){
					/*用$_COOKIE*/
					setcookie("login", 'true', time() + 60*30);
					setcookie("name", $_SESSION['name'], time() + 60*30);
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
		private function isExit()
		{
			if(isset($_COOKIE)){
				@setcookie("login", 'true', 0);
				@setcookie("name", $_SESSION['password'], 0);
			}
			unset($_SESSION["login"]);
			include "./view/login.php";
			die;
		}
		/**/
		private function test()
		{
			if(@!empty($_SESSION["login"])){
				/*超级管理员 a级*/
				if($_SESSION['admin']['Juris'] == 'a'){
					include "./view/users.php";
					return;
				}
				/*其他*/
				if($_SESSION['admin']['Juris'] != 'a'){
					include "./view/index.php";
					return;
				}
				die;
			}else{
				include "./view/login.php";
				echo "<script>alert('用户或密码错误！')</script>";
				die;
			}
		}
		/*删除数据*/
		private function DelData()
		{
			if(@!$_SESSION["login"]) include "./view/login.php";
			$id = array('id' =>$_GET["id"]);
			$sql = new Classs\Sqls();
			$sql->Link("news");
			$sql->DelData($id);
			include "./view/index.php";
			die;
		}
		/*插入数据*/
		private function release()
		{
			if(@!$_SESSION["login"]) include "./view/login.php";
			$sql = new Classs\Sqls();
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
		private function publish()
		{
			if(@!$_SESSION["login"]) include "./view/login.php";
			include './view/Publish.php';
			die;
		}
		/*文章管理主页  index.php*/
		private function home()
		{
			if(@!$_SESSION["login"]) include "./view/login.php";
			include './view/index.php';
			die;
		}
		/*分页请求处理*/
		private function pages()
		{
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
			$link = new Classs\Sqls();
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
			$sql = new Classs\Sqls();
			$sql->Link("news");
			$content = array(
							'title' => $_POST['small-input'],
							'author' => $_POST['medium-input'],
							'create_time' => time(),
							'content' => $_POST['textfield']
							 );
			$where = array('id' => $_SESSION['id']);
			$sql->changeData($content,$where);
			include "./view/index.php";
			die;
		}
		/*权限*/
		private function Juris(){

		}
		/*入口*/
		public function ruk(){
			/*超级管理员 管理员管理*/
			if( isset($_SESSION) && isset($_SESSION['admin']) && $_SESSION['admin']['Juris'] == 'a'){

			}
			/*超级管理员 特殊请求*/
			if(isset($_SESSION) && isset($_GET['user'])){
				if(isset($_GET['user']) && isset($_GET['id'])){
					$this->userUpdata();
				}else{
					include "./view/users.php";
				}
				return;
			}
			if(isset($_SESSION) && isset($_POST['user']) && isset($_POST['userUpdata'])){
				$this->userSubUpdata();
				return;
			}
			if(isset($_SESSION) && isset($_POST["login"])){
				/*进入登录*/
				$this->login();
			}elseif (isset($_SESSION) && isset($_GET["die"])) {
				/*进入退出*/
				$this->isExit();
			}elseif(isset($_GET["del"]) && $_GET["del"] == 1){
				/*删除*/
				$this->DelData();
			}elseif (isset($_POST["release"])){
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
			}elseif(isset($_SESSION) && isset($_POST['updata'])){
				/*文章修改提交*/
				$this->SubUpdata();
			}else{
				if(isset($_COOKIE["login"])){
					/*有COOKIE时放回还原SESSION数据*/
					$_SESSION["login"] =  $_COOKIE["login"];
					$_SESSION["index"] =  0;
					$_SESSION["name"] =  $_COOKIE["name"];
					$_SESSION['startIndex'] = 0;
					if(isset($_SESSION['admin']) && $_SESSION['admin']['Juris'] == 'a'){
						/*超级管理员*/
						include "./view/users.php";
					}else{
						include "./view/index.php";
					}
					return;
				}
				include "./view/login.php";
			}
		}
	}