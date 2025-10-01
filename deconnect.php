<?php 
	session_start();
	require_once('inc/connect.inc.php');
	$config = new config($db);
	
	if(isset($_SESSION['message'])){
		echo "<script>alert('".$_SESSION['message']."');</script>";
	}unset($_SESSION['message']);
	// Je dois appeler la balise de rafraichissement sur 5 sec et rediriger
	// echo $serveur;
	$render = "<html>";
		$render .= "<head>";
			$render .= "<meta http-equiv='refresh' content = '1;".$serveur."' />";
		$render .= "</head>";
		$render .= "<body>";
			$render.= "<h4>Redirection en cours...</h4>";
		$render .= "</body>";
	$render .= "</html>";
	
	echo $render;
?> 

	
	
