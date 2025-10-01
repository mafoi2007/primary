<?php 
	session_start();
	require_once('../inc/connect.inc.php');
	$config = new Config($db);
	if(isset($_POST['debut'])){
		$fin = $_POST['debut']+1;
		echo " / <select name='fin'>
			<option value='".$fin."'>".$fin."</option>
		</select>";
	} ?>
<input type ='submit' name='setSchoolYear' value="Debuter l'année" />