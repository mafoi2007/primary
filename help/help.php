<?php 
	session_start();
	require('../inc/connect.inc.php');
	
	$config = new config($db);
	
	if(isset($_SESSION['user']['userPost'])){
		$userPost = $_SESSION['user']['userPost'];
		if($userPost=='cellule'){
			require_once('help_cell.php');
		}elseif($userPost=='administrateur'){
			require_once('help_admin.php');
		}elseif($userPost=='enseignant'){
			require_once('help_maitre.php');
		}else{
			
		}
	}