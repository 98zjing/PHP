<?php 
	session_start();
	spl_autoload_register(function($fileName){
		require_once str_replace('\\', '/', $fileName).'.php';
	});
	require_once "Classs/run.php";
	$run = new run();
	$run->ruk();