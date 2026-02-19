<h1 class='alert'>Révendication des Notes</h1>
<form method='post' action='../traitement.php'>
	<?php $listeMois = $config->getMoisSaisi($_SESSION['user']['classeTenue']['id']);
	$compteur = count($listeMois);
	// Pour modifier les notes, il faut recencer tous les mois qui ont reçu les notes de la classe
	if($compteur==0){ // Aucune note encore insérée.
		echo "<h3 class='alert'>La classe n'a encore aucune note enregistrée.</h3>";
	}else{ ?>
		Mois :
			<select name='mois' id='mois' onChange='showMatiereSaisieRev()'>
				<?php 
				for($i=0;$i<$compteur;$i++){
					echo "<option value='".$listeMois[$i]['periode']."'>Mois ".$listeMois[$i]['periode']."</option>\n";
				}
				?>
				<option value='null' selected>-Choisir un Mois-</option>
			</select>
		<div id='matiere' style = display:inline>
		</div>
		
<?php 
	}
?>
	
	
</form>