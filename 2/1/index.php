<?php 
	session_start();
	include "class/run.php";
	/*用户*/
	$_SESSION['names'] = array("张三"=>"333","李四"=>"4444","王五"=>"55555");
	$run = new run();
	$run->ruk();