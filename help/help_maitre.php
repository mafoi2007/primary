<?php 
	
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
					
				</script>
				<title>Menu d'Aide pour Enseignant</title>
			</head>
			<body>
				<?php
					require_once('../part/entete.php');
					/*require_once('../part/nav.php');
					require_once('../part/aside.php');*/
				?>
				<div id='body'>
				<h1 class='alert'>Espace en Contruction</h1>
				<?php 
				if($_SESSION['user']['classeTenue']==false){
					echo "<h3 class='blink'>Aucune classe ne vous encore été attribué.</h3>";
				}else{
					if($_SESSION['user']['classeTenue']['etat_classe']=='inactif'){
						echo "<h3 class='blink'>
							Oups!!! Il semble que votre classe ait été désactivée. Si vous 
							pensez qu'il s'agit d'une erreur, contactez la Cellule Informatique
							de votre école.</h3>";
					}else{ ?>
					<h3>Vous enseignez la classe : 
						<font class='alert'>
						<?php echo strtoupper($_SESSION['user']['classeTenue']['libelle_classe']);  ?>
						</font>
					</h3>	
					
					
					
<?php 					}
				}
				?>
				</div>
				<div id ='body2'>
					
				</div>
				<?php 
					echo $_SERVER['HTTP_REFERER'];
					/*if(isset($_GET['action'])){
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
					require_once('../part/footer.php');*/
				?>
			</body>
		</html>
		
		
		
		
		
		
		
		
		
		
		
<?php 		
	}else{
		$_SESSION['message'] = 'Connexion illégale. Vous serez redirigé';
		header('Location:../index.php');
	}