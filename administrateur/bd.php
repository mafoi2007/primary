<?php 
	session_start();
	require_once('../inc/connect.inc.php');
	$config = new config($db);
	
	if(isset($_SESSION['message'])){
		echo "<script>alert('".$_SESSION['message']."');</script>";
	}unset($_SESSION['message']);
	
	
	if($_SESSION['user']['userPost']=='administrateur'){ ?>
		<!DOCTYPE html>
		<html>
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<link rel="stylesheet" type="text/css" href="../styles/style.css" />
				<link rel ="shortcut icon" type="image/x-icon" href="../images/homme.png" />
				<link type="text/javascript" src="../javascript/js.js" />
				<script>
					function addEleve(){
						var xhr = getXhr()
						// On définit ce qu'on va faire quand on aura la reponse 
						xhr.onreadystatechange = function(){
							// On ne fait klk choz que si on a tt rxu et ke le serveur est ok
							if(xhr.readyState==4 && xhr.status==200){
								leselect = xhr.responseText;
								// On se sert de l'innerHTML pour rajouter les options à la liste
								document.getElementById('eleve').innerHTML = leselect;
							}
						}
						// Ici on va voir comment faire du POST
						xhr.open("POST", "../forms/ajouterEleve.ajax.php", true);
						// Ne pas oublier xa pour le POST 
						xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
						// Ne pas oublier de poster les arguments 
						// C'est-à-dire l'id de la Region par exemple
						sel = document.getElementById('clas');
						clas = sel.options[sel.selectedIndex].value;
						xhr.send("clas="+clas);
					}
					
					
					function listEleve(){
						var xhr = getXhr()
						// On définit ce qu'on va faire quand on aura la reponse 
						xhr.onreadystatechange = function(){
							// On ne fait klk choz que si on a tt rxu et ke le serveur est ok
							if(xhr.readyState==4 && xhr.status==200){
								leselect = xhr.responseText;
								// On se sert de l'innerHTML pour rajouter les options à la liste
								document.getElementById('eleve').innerHTML = leselect;
							}
						}
						// Ici on va voir comment faire du POST
						xhr.open("POST", "etat/liste.ajax.php", true);
						// Ne pas oublier xa pour le POST 
						xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
						// Ne pas oublier de poster les arguments 
						// C'est-à-dire l'id de la Region par exemple
						sel = document.getElementById('clas');
						clas = sel.options[sel.selectedIndex].value;
						xhr.send("clas="+clas);
					}
					
					
					function listMatiere(){
						var xhr = getXhr()
						// On définit ce qu'on va faire quand on aura la reponse 
						xhr.onreadystatechange = function(){
							// On ne fait klk choz que si on a tt rxu et ke le serveur est ok
							if(xhr.readyState==4 && xhr.status==200){
								leselect = xhr.responseText;
								// On se sert de l'innerHTML pour rajouter les options à la liste
								document.getElementById('matiere').innerHTML = leselect;
							}
						}
						// Ici on va voir comment faire du POST
						xhr.open("POST", "etat/releve.ajax.php", true);
						// Ne pas oublier xa pour le POST 
						xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
						// Ne pas oublier de poster les arguments 
						// C'est-à-dire l'id de la Region par exemple
						sel = document.getElementById('clas');
						clas = sel.options[sel.selectedIndex].value;
						xhr.send("clas="+clas);
					}
					
					
					
					
				</script>
				<title>Base de Données : </title>
			</head>
			<body>
				<?php
					require_once('../part/entete.php');
					require_once('../part/nav.php');
					require_once('../part/aside.php');
				?>
				<div id='body'>
				<h1>Base de Données</h1>
				<h3 class='alert'>
					Laisser le concepteur de l'application manipuler cet espace.
				</h3>
				</div>
				<?php 
					if(isset($_GET['action'])){
						$action = urldecode($_GET['action']);
						if($action=='as'){
							require_once('bd/as.php');
						}elseif($action=='appr'){
							require_once('bd/appr.php');
						}elseif($action=='cls'){
							require_once('bd/cls.php');
						}elseif($action=='per'){
							require_once('bd/per.php');
						}elseif($action=='usert'){
							require_once('bd/usert.php');
						}
					}
					require_once('../part/footer.php');
				?>
			</body>
		</html>
		
		
		
		
		
		
		
		
		
		
		
<?php 		
	}else{
		$_SESSION['message'] = 'Connexion illégale. Vous serez redirigé';
		header('Location:../index.php');
	}