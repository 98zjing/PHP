<?php 
	header('content-type:text/html;charset=utf-8');
	class Users
	{
		/*管理员修改请求*/
		public  function userUpdata(){
			if(@!$_SESSION["login"]) include "./view/login.php";
			$link = new Sqls();
			$link->Link('admin');
			/*保存修改后提交的id */
			$_SESSION['id'] = $_GET['id'];
			$_SESSION['updata'] = $link->SelData(array("id" => $_GET['id']));
			if($_SESSION['updata'])
			include './view/userUpdata.php';
			die;
		}
		/*管理员修改提交*/
		public  function userSubUpdata(){
			if(@!$_SESSION["login"]) include "./view/login.php";
			$sql = new Sqls();
			$sql->Link("admin");
			$content = array(
							'username' => $_POST['username'],
							'password' => md5($_POST['password']),
							'Juris' => $_POST['userJuris']
							 );
			$where = array('id' => $_SESSION['id']);
			$sql->changeData($content,$where);
			include "./view/users.php";
			die;
		}

	}
