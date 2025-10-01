<?php 
	session_start();
	require_once('../../inc/connect.inc.php');
	$config = new config($db);
	if(isset($_POST['clas'])){
		$classe = $_POST['clas'];
		if($classe=='null'){ ?>
			<h3 class='alert'>Vous devez sélectionner une classe.</h3>
<?php 			
		}else{
			$moisSaisi = $config->getMoisSaisi($classe);
			if(empty($moisSaisi)){ ?>
				<h3 class='alert'>Aucune note saisie pour la classe.</h3>
<?php 				
			}else{ ?>
				Mois : <select name='mois' id='mois'>
					<option value='null' selected>-Choisir le Mois-</option>
					<?php 
					for($i=0;$i<count($moisSaisi);$i++){
						echo "<option value='";
						echo $moisSaisi[$i]['periode'];
						echo "'> Mois ".$moisSaisi[$i]['periode']."</option>";
					} ?>
				</select>
				<input type='submit' name='traitementMensuel' value='Traitement' />
<?php 				
				
			}
		}
	}