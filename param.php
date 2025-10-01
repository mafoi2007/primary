<?php
	session_start();
	require('inc/connect.inc.php');
	
	$config = new config($db);
	
	if(isset($_SESSION['message'])){
		echo "<script>alert('".$_SESSION['message']."');</script>";
	} unset($_SESSION['message']);
	// echo '<pre>';print_r($_SESSION);echo '</pre>';
	if(isset($_SESSION['user']['userPost'])){
?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 
	Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="styles/style.css" />
	<link rel ="shortcut icon" type="image/x-icon" href="images/banniere.png" />
	<link type="text/javascript" src="javascript/js.js" />
	<title>Paramètres de l'utilisateur</title>
</head>

<body>
	<?php
		
		require_once('part/entete.php');
		// require_once('part/nav.php');
		// require_once('part/aside.php');
		
		
	?>
	
	
	
	
	<div id="body">
		<?php require_once('forms/passwordchange.form.php'); ?>
	</div>
	
<?php
	require('part/footer.php');
	?>
</body>
</html>

<?php 
	}else{
		$render = "<html>";
		$render .= "<head>";
			$render .= "<meta http-equiv='refresh' content = '3;".$serveur."' />";
		$render .= "</head>";
		$render .= "<body>";
			$render.= "<h4>Action illégale. Redirection en cours...</h4>";
		$render .= "</body>";
		$render .= "</html>";
	
		echo $render;
	}