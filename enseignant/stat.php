<?php 
	session_start();
	require_once('../inc/connect.inc.php');
	$config = new config($db);
	
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
					function listMatiereStat(){
						var xhr = getXhr();
						xhr.onreadystatechange = function(){
							if(xhr.readyState==4 && xhr.status==200){
								document.getElementById('matiere_stat').innerHTML = xhr.responseText;
								document.getElementById('resultat_stat').innerHTML = '';
							}
						}
						xhr.open("POST", "stat/mensuel.ajax.php", true);
						xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
						var sel = document.getElementById('sequence');
						var sequence = sel.options[sel.selectedIndex].value;
						xhr.send("sequence="+sequence);
					}

					function genererStatMatiere(){
						var xhr = getXhr();
						xhr.onreadystatechange = function(){
							if(xhr.readyState==4 && xhr.status==200){
								document.getElementById('resultat_stat').innerHTML = xhr.responseText;
							}
						}
						xhr.open("POST", "stat/mensuel.stat.ajax.php", true);
						xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
						var sequence = document.getElementById('sequence').value;
						var matiere = document.getElementById('subject_stat').value;
						xhr.send("sequence="+sequence+"&matiere="+matiere);
					}


					function listMatiereStatTrimestre(){
						var xhr = getXhr();
						xhr.onreadystatechange = function(){
							if(xhr.readyState==4 && xhr.status==200){
								document.getElementById('matiere_trimestre_stat').innerHTML = xhr.responseText;
								document.getElementById('resultat_trimestre_stat').innerHTML = '';
							}
						}
						xhr.open("POST", "stat/trimestriel.ajax.php", true);
						xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
						var sel = document.getElementById('trimestre_stat');
						var trimestre = sel.options[sel.selectedIndex].value;
						xhr.send("trimestre="+trimestre);
					}

					function genererStatMatiereTrimestre(){
						var xhr = getXhr();
						xhr.onreadystatechange = function(){
							if(xhr.readyState==4 && xhr.status==200){
								document.getElementById('resultat_trimestre_stat').innerHTML = xhr.responseText;
							}
						}
						xhr.open("POST", "stat/trimestriel.stat.ajax.php", true);
						xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
						var trimestre = document.getElementById('trimestre_stat').value;
						var matiere = document.getElementById('subject_trimestre_stat').value;
						xhr.send("trimestre="+trimestre+"&matiere="+matiere);
					}
				</script>
				<title>Statistiques : </title>
			</head>
			<body>
				<?php
					require_once('../part/entete.php');
					require_once('../part/nav.php');
					require_once('../part/aside.php');
				?>
				<div id='body'>
				<h1>Statistiques</h1>
				</div>
				<?php 
					if(isset($_GET['action'])){
						$action = urldecode($_GET['action']);
						if($action=='mensuel'){
							require_once('stat/mensuel.php');
						}elseif($action=='trimestriel'){
							require_once('stat/trimestriel.php');
						}elseif($action=='annuel'){
							require_once('stat/annuel.php');
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