<?php 
	$user = $_SESSION['user']['userPost'];
	if($user=='cellule'){
		require_once('menu_cell.php');
	}elseif($user=='administrateur'){
		require_once('menu_admin.php');
	}elseif($user=='enseignant'){
		require_once('menu_enseignant.php');
	}else{
		require_once('no_menu.php');
	}
?>
		
		
		
		
		
		
		
		
		
		
		