<div id = 'body2'>
	<h1 class='alert'>Supprimer des Notes</h1>
	<form method='post' action=''>
		Classe :
				<select name="classe" id='classe' onChange='listMoisDel()'>
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
				</select>
			<div id='mois' style=display:inline>
				
			</div>
			
	</form>
	
	
	
	
<?php 
	if(isset($_POST['verifMois'])){
		$classe = $_POST['classe'];
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
				// echo '<pre>';print_r($noteSaisies); echo '</pre>';
				if(!empty($noteSaisies)){ ?>
					<form method='post' action='../traitement.php'>
						<input 
							type='hidden' 
							name='classe' 
							value='<?php echo $classe;?>' />
						<input 
							type='hidden' 
							name='mois' 
							value='<?php echo $mois;?>' />
						
						<table border='1' width='100%'>
							<caption>Mois : Mois <?php echo strtoupper($noteSaisies[0]['periode']);?></caption>
							<thead>Classe : <?php echo strtoupper($noteSaisies[0]['libelle_classe']);?></thead>
							<tr>
								<th>N°</th>
								<th>Matière</th>
								<th>Date de Saisie</th>
								<th>Supprimer</th>
							</tr>
							<?php 
							$a = 1;
							for($i=0;$i<count($noteSaisies);$i++){
								$cle = 'libelle_competence_'.$noteSaisies[$i]['section'];
								$poste = $noteSaisies[$i]['ip_saisie'].' / ';
								$poste .= $noteSaisies[$i]['type_machine'];
								echo "<tr>
									<td>".$a."</td>
									<td>".strtoupper($noteSaisies[$i][$cle])."</td>
									<td>".$noteSaisies[$i]['date_saisie_fr']."</td>
									<td>
										<input 
											type='radio'
											name='matiere'
											value='".$noteSaisies[$i]['matiere']."' />
									</td>
								</tr>";
								$a++;
							}
							?>
							<tr>
								<th colspan='5'>
									<input
										type='submit'
										name='supprimerNote'
										value='Valider' />
								</th>
							</tr>
						</table>
					</form>
					
					
<?php 
				}else{
					echo "<h3 class='alert'>Une erreur s'est produite.</h3>";
				}
			}
		}
	}
?>
	
	
	
	
	
	
	
	
	
	
</div>