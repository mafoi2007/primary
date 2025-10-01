<?php 
	session_start();
	require_once('../inc/connect.inc.php');
	$config = new config($db);
	
	if(isset($_POST['classe'])){
		$clas = (int) $_POST['classe'];
		// print_r($clas);
		if($clas==0){
			echo "<h3 class='alert'>Vous devez choisir une classe.</h3>";
		}else{ ?>
			<table border='0' width='70%'>
				<tr>
					<td>Nom de l'enseignant</td>
					<td> : </td>
					<td>
					<select name='enseignant'>
						<?php 
						$enseignant = $config->getUtilisateurType('enseignant');
						for($i=0;$i<count($enseignant);$i++){
							echo "<option value='";
							echo $enseignant[$i]['idEnseignant'];
							echo "'>";
							echo $enseignant[$i]['nom'];
							echo "</option>";
						}
						?>
					</select>
					</td>
				</tr>
				
				
				<tr>
					<td colspan='3'>&nbsp;</td>
				</tr>
				<tr>
					<td colspan='3'>
						<input 
							type="submit" 
							name="ajout_utilisateur_classe" 
							value="Affecter à la classe" />
					</td>
				</tr>
			</table>
			
			
<?php 		}
	}