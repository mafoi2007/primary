<?php 
	session_start();
	require_once('../inc/connect.inc.php');
	$config = new config($db);
	header('Location:../contact.php');