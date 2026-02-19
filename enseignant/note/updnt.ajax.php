<?php 
    session_start();
	require_once('../../inc/connect.inc.php');
	$config = new config($db);
	// echo '<pre>'; print_r($_SESSION);
	if(isset($_POST['subject'])){
        $matiere = $_POST['subject'];
        if($matiere=='null'){
            echo "<h3 class='alert'>Vous devez choisir une matière.</h3>";
        }else{ 
			$listeSousMatiere = $config->listeSousMatiereClasse($_SESSION['user']['classeTenue']['id'],
                                                                    $matiere);
			
			$cle = 'libelle_competence_'.$_SESSION['user']['classeTenue']['section'];
			$nomMatiere = $listeSousMatiere[0][$cle];
		?>
			<h3 class='bien'>Matière : <?php echo strtoupper($nomMatiere); ?></h3>
			<table border='1' width='100%'>
				<tr>
					<th>N°</th>
					<th>Nom de l'élève</th>
					<?php 
						for($i=0;$i<count($listeSousMatiere);$i++){
							if($_SESSION['user']['classeTenue']['section']=='fr'){
								$sousMatiere  = $listeSousMatiere[$i]['libelle_sous_competence_fr'];
							}elseif($_SESSION['user']['classeTenue']['section']=='en'){
								$sousMatiere = $listeSousMatiere[$i]['libelle_sous_competence_en'];
							}
							$point[] = $listeSousMatiere[$i]['nb_point'];
							echo "<th>".ucwords($sousMatiere)." / ".$listeSousMatiere[$i]['nb_point']."</th>";
							echo "<input type='hidden' name='matiere[]' value='".$listeSousMatiere[$i]['id']."' />";
						}
						$totalPoint = array_sum($point);
					?>
					<th>Total / <?php echo $totalPoint; ?></th>   
				</tr>
				<?php 
				$listeNote = $config->viewNoteMatiere($_SESSION['user']['classeTenue']['id'], 
													$_SESSION['mois'],
													 $matiere);
				$num = 1;
				for($x=0;$x<count($listeNote);$x++){ ?>
					<tr>
						<td><?php echo $num; ?></td>
						<td>
							<input 
								type='hidden' 
								name='eleve[]' 
								value='<?php echo $listeNote[$x]['idNote']; ?>' />
							<?php echo stripslashes($listeNote[$x]['nom_complet']); ?></td>
						<td>
							<input 
								type = 'number'
								name='oral[]'
								max = '<?php echo $listeSousMatiere[0]['nb_point']; ?>'
								min = '0.1'
								step='0.01'
								value = '<?php echo $listeNote[$x]['oral']; ?>'
								/>
						</td>
						<td>
							<input 
								type = 'number'
								name='ecrit[]'
								max = '<?php echo $listeSousMatiere[1]['nb_point']; ?>'
								min = '0.1'
								step='0.01'
								value = '<?php echo $listeNote[$x]['ecrit']; ?>'
								/>
						</td>
						<td>
							<input 
								type = 'number'
								name='prat[]'
								max = '<?php echo $listeSousMatiere[2]['nb_point']; ?>'
								min = '0.1'
								step='0.01'
								value = '<?php echo $listeNote[$x]['prat']; ?>'
								/>
						</td>
						<td>
							<input 
								type = 'number'
								name='se[]'
								max = '<?php echo $listeSousMatiere[3]['nb_point']; ?>'
								min = '0.1'
								step='0.01'
								value = '<?php echo $listeNote[$x]['se']; ?>'
								/>
						</td>
						<td><?php echo $listeNote[$x]['total']; ?></td>
					</tr>
				<?php 
					$num++;
				}
				
				echo "<tr>";
					echo "<td colspan='10' align='center'>";
						echo "<input 
								type='submit' 
								name='updateNote' 
								value='Mettre à Jour ses Notes' />";
					echo "</td>";
				echo "</tr>";
			echo "</table>";
         }
    }