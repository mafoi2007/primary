<?php 
	$config = new Config($db); 
?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" 
				content="text/html; charset=utf-8" />
		<link rel="stylesheet" 
				type="text/css" 
				href="styles/styleConnect.css" />
		<link rel ="shortcut icon" 
				type="image/x-icon" 
				href="images/cle.png" />
		<link type="text/javascript" 
				src="javascript/js.js" />
		<title>Initialisation de l'application</title>
		<script>
			function getDepartement(){
				var xhr = getXhr()
				// On définit ce qu'on va faire quand on aura la reponse 
				xhr.onreadystatechange = function(){
					// On ne fait klk choz que si on a tt rxu et ke le serveur est ok
					if(xhr.readyState==4 && xhr.status==200){
						leselect = xhr.responseText;
						// On se sert de l'innerHTML pour rajouter les options à la liste
						document.getElementById('departement').innerHTML = leselect;
					}
				}
				// Ici on va voir comment faire du POST
				xhr.open("POST", "inc/departement.ajax.php", true);
				// Ne pas oublier xa pour le POST 
				xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				// Ne pas oublier de poster les arguments 
				// C'est-à-dire l'id de la Region par exemple
				sel = document.getElementById('region');
				region = sel.options[sel.selectedIndex].value;
				xhr.send("region="+region);
			}
			
			
			
			function getAs(){
				var xhr = getXhr()
				// On définit ce qu'on va faire quand on aura la reponse 
				xhr.onreadystatechange = function(){
					// On ne fait klk choz que si on a tt rxu et ke le serveur est ok
					if(xhr.readyState==4 && xhr.status==200){
						leselect = xhr.responseText;
						// On se sert de l'innerHTML pour rajouter les options à la liste
						document.getElementById('fin').innerHTML = leselect;
					}
				}
				// Ici on va voir comment faire du POST
				xhr.open("POST", "inc/as.ajax.php", true);
				// Ne pas oublier xa pour le POST 
				xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				// Ne pas oublier de poster les arguments 
				// C'est-à-dire l'id de la Region par exemple
				sel = document.getElementById('debut');
				debut = sel.options[sel.selectedIndex].value;
				xhr.send("debut="+debut);
			}
		</script>
	</head>
	
	
	
	<body id='first'>
		<h1>Initialisation de l'aplication Noteplus</h1>
		<form method='post' action='traitement.php'>
			<h4>Libellé Ministère (Français): 
				<input
					type='text'
					name='ministereFr'
					size='55'
					placeholder='Nom du Ministère en Français'
					required
				/>
			</h4>
			<h4>Libellé Ministère (Anglais):
				<input
					type='text'
					name='ministereEn'
					size='55'
					placeholder='Nom du Ministère en Anglais'
					required
				/>
			</h4>
			<h4>Nom de la Region :
				<?php $region = $config->getRegion(); 
				/*echo '<pre>';print_r($region);echo '</pre>';*/?>
				<select name='region' id='region' onChange='getDepartement()'>
					<?php for($i=0;$i<count($region);$i++){
						echo "<option value='";
						echo $region[$i]['id'];
						echo "'>".$region[$i]['nom_court_fr']."</option>";
					} ?>
					<option value='null' selected>-Choix Region-</option>
				</select>
			</h4>
			<div id='departement' style = 'display:inline'>
				
			</div>
		</form>
	</body>