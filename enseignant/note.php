<?php 
	session_start();
	require_once('../inc/connect.inc.php');
	$config = new Config($db);
	
	if(isset($_SESSION['message'])){
		echo "<script>alert('".$_SESSION['message']."');</script>";
	}unset($_SESSION['message']);
	
	
	if($_SESSION['user']['userPost']=='enseignant'){ ?>
		<!DOCTYPE html>
		<html>
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<link rel="stylesheet" type="text/css" href="../styles/style.css" />
				<link rel ="shortcut icon" type="image/x-icon" href="../images/homme.png" />
				<link type="text/javascript" src="../javascript/js.js" />
				<script>
					function showMatiere(){
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
						xhr.open("POST", "../forms/ajouterNote.ajax.php", true);
						// Ne pas oublier xa pour le POST 
						xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
						// Ne pas oublier de poster les arguments 
						// C'est-à-dire l'id de la Region par exemple
						sel = document.getElementById('mois');
						mois = sel.options[sel.selectedIndex].value;
						xhr.send("mois="+mois);
					}


					function showMatiereSaisie(){
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
						xhr.open("POST", "../forms/modifierNote.ajax.php", true);
						// Ne pas oublier xa pour le POST 
						xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
						// Ne pas oublier de poster les arguments 
						// C'est-à-dire l'id de la Region par exemple
						sel = document.getElementById('mois');
						mois = sel.options[sel.selectedIndex].value;
						xhr.send("mois="+mois);
					}
					
					
					
					function showMatiereConsult(){
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
						xhr.open("POST", "../forms/visualiserNote.ajax.php", true);
						// Ne pas oublier xa pour le POST 
						xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
						// Ne pas oublier de poster les arguments 
						// C'est-à-dire l'id de la Region par exemple
						sel = document.getElementById('mois');
						mois = sel.options[sel.selectedIndex].value;
						xhr.send("mois="+mois);
					}
					
					
					
					function showMatiereSaisieDelete(){
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
						xhr.open("POST", "../forms/supprimerNote.ajax.php", true);
						// Ne pas oublier xa pour le POST 
						xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
						// Ne pas oublier de poster les arguments 
						// C'est-à-dire l'id de la Region par exemple
						sel = document.getElementById('mois');
						mois = sel.options[sel.selectedIndex].value;
						xhr.send("mois="+mois);
					}
					
					
					function addNote(){
						var xhr = getXhr()
						// On définit ce qu'on va faire quand on aura la reponse 
						xhr.onreadystatechange = function(){
							// On ne fait klk choz que si on a tt rxu et ke le serveur est ok
							if(xhr.readyState==4 && xhr.status==200){
								leselect = xhr.responseText;
								// On se sert de l'innerHTML pour rajouter les options à la liste
								document.getElementById('note').innerHTML = leselect;
							}
						}
						// Ici on va voir comment faire du POST
						xhr.open("POST", "note/addnt.ajax.php", true);
						// Ne pas oublier xa pour le POST 
						xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
						// Ne pas oublier de poster les arguments 
						// C'est-à-dire l'id de la Region par exemple
						sel = document.getElementById('subject');
						subject = sel.options[sel.selectedIndex].value;
						xhr.send("subject="+subject);
					}
					
					
					function updNote(){
						var xhr = getXhr()
						// On définit ce qu'on va faire quand on aura la reponse 
						xhr.onreadystatechange = function(){
							// On ne fait klk choz que si on a tt rxu et ke le serveur est ok
							if(xhr.readyState==4 && xhr.status==200){
								leselect = xhr.responseText;
								// On se sert de l'innerHTML pour rajouter les options à la liste
								document.getElementById('note').innerHTML = leselect;
							}
						}
						// Ici on va voir comment faire du POST
						xhr.open("POST", "note/updnt.ajax.php", true);
						// Ne pas oublier xa pour le POST 
						xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
						// Ne pas oublier de poster les arguments 
						// C'est-à-dire l'id de la Region par exemple
						sel = document.getElementById('subject');
						subject = sel.options[sel.selectedIndex].value;
						xhr.send("subject="+subject);
					}
					
					
					
					function viewNote(){
						var xhr = getXhr()
						// On définit ce qu'on va faire quand on aura la reponse 
						xhr.onreadystatechange = function(){
							// On ne fait klk choz que si on a tt rxu et ke le serveur est ok
							if(xhr.readyState==4 && xhr.status==200){
								leselect = xhr.responseText;
								// On se sert de l'innerHTML pour rajouter les options à la liste
								document.getElementById('note').innerHTML = leselect;
							}
						}
						// Ici on va voir comment faire du POST
						xhr.open("POST", "note/viewnt.ajax.php", true);
						// Ne pas oublier xa pour le POST 
						xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
						// Ne pas oublier de poster les arguments 
						// C'est-à-dire l'id de la Region par exemple
						sel = document.getElementById('subject');
						subject = sel.options[sel.selectedIndex].value;
						xhr.send("subject="+subject);
					}
					
					
					function delNote(){
						var xhr = getXhr()
						// On définit ce qu'on va faire quand on aura la reponse 
						xhr.onreadystatechange = function(){
							// On ne fait klk choz que si on a tt rxu et ke le serveur est ok
							if(xhr.readyState==4 && xhr.status==200){
								leselect = xhr.responseText;
								// On se sert de l'innerHTML pour rajouter les options à la liste
								document.getElementById('note').innerHTML = leselect;
							}
						}
						// Ici on va voir comment faire du POST
						xhr.open("POST", "note/delnt.ajax.php", true);
						// Ne pas oublier xa pour le POST 
						xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
						// Ne pas oublier de poster les arguments 
						// C'est-à-dire l'id de la Region par exemple
						sel = document.getElementById('subject');
						subject = sel.options[sel.selectedIndex].value;
						xhr.send("subject="+subject);
					}
					
					
					
				</script>
				<title>Notes : </title>
			</head>
			<body>
				<?php
					require_once('../part/entete.php');
					require_once('../part/nav.php');
					require_once('../part/aside.php');
				?>
				<div id='body'>
				<h1>Notes</h1>
				<?php 
				if($_SESSION['user']['classeTenue']==false){
					echo "<h2 class='blink'>Aucune classe ne vous encore été attribué.</h2>";
				}else{
					if($_SESSION['user']['classeTenue']['etat_classe']=='inactif'){
						echo "<h3 class='blink'>
							Oups!!! Il semble que votre classe ait été désactivée. Si vous 
							pensez qu'il s'agit d'une erreur, contactez la Cellule Informatique
							de votre école.</h3>";
					}else{ ?>
					<h2>Vous enseignez la classe : 
						<font class='alert'>
						<?php echo strtoupper($_SESSION['user']['classeTenue']['libelle_classe']);  ?>
						</font>
					</h2>	
					
					
					
<?php 					}
				}
				?>
				</div>
				<?php 
					if(isset($_GET['action'])){
						$action = urldecode($_GET['action']);
						if($action=='addnt'){
							require_once('note/addnt.php');
						}elseif($action=='updnt'){
							require_once('note/updnt.php');
						}elseif($action=='delnt'){
							require_once('note/delnt.php');
						}elseif($action=='viewnt'){
							require_once('note/viewnt.php');
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