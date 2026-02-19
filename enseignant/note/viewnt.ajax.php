<?php 
    session_start();
	require_once('../../inc/connect.inc.php');
	$config = new config($db);
	if(isset($_POST['subject'])){
        $matiere = $_POST['subject'];
        if($matiere=='null'){
            echo "<h3 class='alert'>Vous devez choisir une matière.</h3>";
        }else{
			// Uniquement pour les entêtes 
			$listeSousMatiere = $config->listeSousMatiereClasse($_SESSION['user']['classeTenue']['id'],
                                                                    $matiere);
			// Celui qui porte toutes les notes 
			$listeNote = $config->viewNoteMatiere($_SESSION['user']['classeTenue']['id'], 
													$_SESSION['mois'],
													 $matiere);
			$cle = 'libelle_competence_'.$_SESSION['user']['classeTenue']['section'];
			$nomMatiere = $listeSousMatiere[0][$cle];
			// echo '<pre>'; print_r($listeNote); echo '</pre>';
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
				$num = 1;
				for($x=0;$x<count($listeNote);$x++){ ?>
					<tr>
						<td><?php echo $num; ?></td>
						<td><?php echo stripslashes($listeNote[$x]['nom_complet']); ?></td>
						<td><?php echo $listeNote[$x]['oral']; ?></td>
						<td><?php echo $listeNote[$x]['ecrit']; ?></td>
						<td><?php echo $listeNote[$x]['prat']; ?></td>
						<td><?php echo $listeNote[$x]['se']; ?></td>
						<td><?php echo $listeNote[$x]['total']; ?></td>
					</tr>
				<?php 
					$num++;
				}
				
			echo "</table>";
         }
    }