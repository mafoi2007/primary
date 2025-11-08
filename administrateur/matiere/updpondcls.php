<div id = 'body2'>
	<h1 class='alert'>Modifier une pondération</h1>
	<form method='post' action='#body3'>
		Sous - Système : 
		<select name='section' id='section' onChange='sectionUpd()'>
			<option value='null'>-Choisir système-</option>
			<?php 
			$section = $config->getSectionAll();
			for($i=0;$i<count($section);$i++){
				echo "<option value='";
				echo $section[$i]['code_section'];
				echo "'>".$section[$i]['libelle_section']."</option>";
			}
			?>
		</select>
		<div id='journal' style=display:inline>
		</div>
	</form>
</div>



<div id='body3'>
<?php 
	if(isset($_POST['info'])){
		// echo '<pre>'; print_r($_POST); echo '</pre>';
		$classe = $_POST['classe'];
		$matiere = $_POST['matiere'];
		$section = $_POST['section'];
		$listeMatiere = $config->listeSousMatiereClasse($classe, $matiere);
		if(!empty($listeMatiere)){
			$cleComp = 'libelle_competence_'.$section;
			$cleSousComp = 'libelle_sous_competence_'.$section;
			require_once('modifierPond.php');
		}else{
			$msg = "<h3 class='alert'>Pas de sous matière pour la matière.</h3>";
			echo $msg;
		}
		// echo '<pre>';print_r($listeMatiere); echo '</pre>';
	}
?>
</div>