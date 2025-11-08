<?php 	
	session_start();
	require_once('../../inc/connect.inc.php');
	$config = new config($db);
	// print_r($_POST);
	if(isset($_POST['section'])){
		$section = $_POST['section'];
		if($section=='null'){
			$msg = "<h3 class='alert'>Vous devez choisir une section.</h3>";
			echo $msg;
		}else{
			$classe = $config->viewClasseSection('actif', $section);
			// echo '<pre>'; print_r($classe); echo '</pre>';
			if(!empty($classe)){ ?>
				Classe : 
				<select name='classe' id='classe' onChange='classeRm()'>
					<option value='null' selected>-Choisir Classe-</option>
					<?php 
					for($i=0;$i<count($classe);$i++){
						$idClasse = $classe[$i]['id'];
						$nomClasse = strtoupper($classe[$i]['libelle_classe']);
						echo "<option value='".$idClasse."'>".$nomClasse."</option>";
					}?>
				</select>
				<div id='matiere' style=display:inline>
				</div>
	
<?php 	
			}else{
				$msg = "<h3 class='alert'>Aucune classe pour cette section.</h3>";
				echo $msg;
			}
		}
	}
	
?>