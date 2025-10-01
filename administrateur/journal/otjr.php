<div id = 'body2'>
	<h1 class='alert'>Journal des Enseignants</h1>
	<form method='post' action=''>
		Nom de l'enseignant : 
		<select name='enseignant' id='enseignant' onChange='Journal()'>
			<option value='null'>-Choisir un enseignant-</option>
			<?php 
			$enseignant = $config->getUtilisateurType('enseignant');
			for($i=0;$i<count($enseignant);$i++){
				echo "<option value='";
				echo $enseignant[$i]['idEnseignant'];
				echo "'>".$enseignant[$i]['nom']."</option>";
			}
			?>
		</select>
		<div id='journal'>
		</div>
	</form>
</div>