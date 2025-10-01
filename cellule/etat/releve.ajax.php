<?php 
	session_start();
	require_once('../../inc/connect.inc.php');
	$config = new config($db);
	
	$as = $config->getCurrentYear();
	if(isset($_POST['classe'])){
		$classe = $_POST['classe'];
		if($classe=='null'){ ?>
			<h3 class='alert'>Vous devez sélectionner une classe.</h3>
		<?php }else{ 
			$section =$config->getSection($classe);
			$liste = $config->listeMatiereClasse($classe); ?>
			Matière : <select name='lib_matiere' id='lib_matiere' >
				<option value='null' selected>-Choisir la Matière / Choose Subject-</option>
				<?php for($i=0;$i<count($liste);$i++){
					$codeMatiere = $liste[$i]['id_competence'];
					if($section=='en'){
						$libComp = $liste[$i]['libelle_competence_en']; 
						echo "<option value='".$codeMatiere."'>".strtoupper($libComp)."</option>";
					}elseif($section=='fr'){
						$libComp = $liste[$i]['libelle_competence_fr'];
						echo"<option value='".$codeMatiere."'>".strtoupper($libComp)."</option>";
					}
				} ?>
			</select>
	<input type='hidden' name='section' value='<?php echo $section; ?>' />
	<input type='hidden' name='to_print' value='releveEleve' />
	<input type='submit' name='print' value='Imprimer' />
				
<?php 
		}
	}
?>