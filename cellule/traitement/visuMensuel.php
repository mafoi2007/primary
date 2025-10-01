<div id = 'body2'>
	<h1 class='alert'>Vérification des Notes</h1>
	<form method='post' action=''>
		<p>Classe :
				<select name="clas" id='clas' onChange='listMois()'>
					<?php
					$listeFr = $config->viewClasseSection('actif', 'fr');
					$listeEn = $config->viewClasseSection('actif', 'en');
					echo "<optgroup label='Section Francophone'></optgroup>";	
						for($nb = 0; $nb <count($listeFr);$nb++) {
							echo "<option value=";
							echo $listeFr[$nb]['id'];
							echo ">";
							echo strtoupper($listeFr[$nb]['libelle_classe']);
							echo "</option>\n";
						}
					
					echo "<optgroup label='Section Anglophone'></optgroup>";
						for($na = 0; $na <count($listeEn);$na++) {
							echo "<option value=";
							echo $listeEn[$na]['id'];
							echo ">";
							echo strtoupper($listeEn[$na]['libelle_classe']);
							echo "</option>\n";
						}
					
					?>
					<option value='null' selected>-Choisir une Classe-</option>
				</select></p>
			<div id='mois'>
				
			</div>
			
	</form>
	
	
	
	
<?php 
	if(isset($_POST['verifMois'])){
		$classe = $_POST['clas'];
		$mois = $_POST['mois'];
		if($classe=='null'){
			$_SESSION['message'] = 'Aucune classe n a été choisie';
		}else{
			if($mois=='null'){
				$_SESSION['message'] = 'Vous devez sélectionner un mois';
				unset($_POST);
				header('Location:'.$_SERVER['PHP_SELF']);
			}else{
				$noteSaisies = $config->getNoteSaisieMois($classe, $mois);
				 ?>
				<table border='1' width='100%'>
					<caption>Mois : Mois <?php echo strtoupper($noteSaisies[0]['periode']);?></caption>
					<thead>Classe : <?php echo strtoupper($noteSaisies[0]['libelle_classe']);?></thead>
					<tr>
						<th>N°</th>
						<th>Matière</th>
						<th>Date de Saisie</th>
						<th>Date de Modification</th>
						<th>Poste de Saisie</th>
					</tr>
					<?php 
					$a = 1;
					for($i=0;$i<count($noteSaisies);$i++){
						$cle = 'libelle_competence_'.$noteSaisies[$i]['section'];
						$poste = $noteSaisies[$i]['ip_saisie'].' / ';
						$poste .= $noteSaisies[$i]['type_machine'];
						echo "<tr>
							<td>".$a."</td>
							<td>".$noteSaisies[$i][$cle]."</td>
							<td>".$noteSaisies[$i]['date_saisie_fr']."</td>
							<td>".$noteSaisies[$i]['date_modification_fr']."</td>
							<td>".$poste."</td>
						</tr>";
						$a++;
					}
					?>
					
					
				</table>
<?php 				
			}
		}
	}
?>
	
	
	
	
	
	
	
	
	
	
</div>