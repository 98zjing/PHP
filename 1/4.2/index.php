<?php 
	session_start();
	include "class/game.php";
	//入口
	$Game = new Game();
	$Game->run();