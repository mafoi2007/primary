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
					<th>Côte </th>   
				</tr>
				<?php 
				$listeEleve = $config->listeEleve($_SESSION['user']['classeTenue']['id'],
                                                        'non_supprime',
                                                        $_SESSION['information']['id']);
				for($a=0;$a<count($listeEleve);$a++){
					$nomEleve = $listeEleve[$a]['nom_complet'];
					$idEleve = $listeEleve[$a]['id'];
					echo "<tr>";
						echo "<td>";
							echo $nomEleve;
						echo "</td>";
						for($b=0;$b<count($listeSousMatiere);$b++){
							$mat = $listeSousMatiere[$b]['id'];
							$noteEleve = $config->noteEleveSousMatiere($idEleve,$mat,$_SESSION['mois']);
							$totalNote[$a][] = $noteEleve['note'];
							echo "<td align='center'>";
								echo $noteEleve['note'];
							echo "</td>";
						}
						$totalNoteEleve = array_sum($totalNote[$a]);
						$appr = $config->getAppreciation($totalNoteEleve,$totalPoint);
						echo "<td>";
							echo $totalNoteEleve;
						echo "</td>";
						echo "<td align='center'>".$appr."</td>";
					echo "</tr>";
				}
			echo "</table>";
         }
    }