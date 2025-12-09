<?php 
	session_start();
	require_once('../../inc/connect.inc.php');
	$config = new config($db);
	if(isset($_POST['classe'])){
		$classe = $_POST['classe'];
		if($classe=='null'){ ?>
			<h3 class='alert'>Vous devez sélectionner une classe.</h3>
<?php 			
		}else{
			$moisSaisi = $config->trimestrielPret($classe);
			if(empty($moisSaisi)){ ?>
				<h3 class='alert'>Aucun bulletin prêt pour la classe.</h3>
<?php 				
			}else{ ?>
				Trimestre : <select name='trimestre' id='trimestre'>
					<option value='null' selected>-Choisir le Trimestre-</option>
					<?php 
					for($i=0;$i<count($moisSaisi);$i++){
						echo "<option value='";
						echo $moisSaisi[$i]['trimestre'];
						echo "'> Trimestre ".$moisSaisi[$i]['trimestre']."</option>";
					} ?>
				</select>
				<input type='hidden' name='to_print' value='bulletinTrimestre' />
				<input type='submit' name='print' value='Imprimer' />
<?php 				
				
			}
		}
	}