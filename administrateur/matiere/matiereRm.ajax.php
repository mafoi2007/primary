<?php 	
	session_start();
	require_once('../../inc/connect.inc.php');
	$config = new config($db);
	// print_r($_POST);
	if(isset($_POST['classe'])){
		$classe = $_POST['classe'];
		if($classe=='null'){
			$msg = "<h3 class='alert'>Vous devez choisir une classe.</h3>";
			echo $msg;
		}else{
			$matiere = $config->listeMatiereClasse($classe);
			// echo '<pre>'; print_r($matiere); echo '</pre>';
			if(!empty($classe)){ 
				$cle = 'libelle_competence_'.$matiere[0]['section'];
				// echo $cle;
			?>
				Matière : 
				<select name='matiere' id='matiere'>
					<?php 
					for($i=0;$i<count($matiere);$i++){
						$idMatiere = $matiere[$i]['id_competence'];
						$nomMatiere = strtoupper($matiere[$i][$cle]);
						echo "<option value='".$idMatiere."'>".$nomMatiere."</option>";
					}?>
				</select>
				<input 
					type='submit'
					name='info'
					value='Supprimer' />
<?php 	
			}else{
				$msg = "<h3 class='alert'>Aucune matière pour cette classe.</h3>";
				echo $msg;
			}
		}
	}	
?>