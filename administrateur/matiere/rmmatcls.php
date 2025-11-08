<div id = 'body2'>
	<h1 class='alert'>Retirer une matière</h1>
	<form method='post' action='#body3'>
		Sous - Système : 
		<select name='section' id='section' onChange='sectionRm()'>
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
		$info['section'] = $classe;
		$info['matiere'] = $matiere;
		$info['classe'] = $classe;
		// $listeMatiere = $config->listeSousMatiereClasse($classe, $matiere);
		// echo '<pre>';print_r($listeMatiere);
		$config->deleteMatiere($info);
		echo "<meta http-equiv='refresh' content=1>";
		
	}
?>
</div>