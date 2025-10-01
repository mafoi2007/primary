<div id = 'body2'>
	<h1>Liste des Enseignants</h1>
	<form method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
		<table border='1' width='100%'>
			<tr>
				<th>N°</th>
				<th>Noms et Prénoms</th>
				<th>Classe</th>
			</tr>
			<tr>
				<th colspan='5' class='bien'>Section Anglophone</th>
			</tr>
			<?php 
			$enseignantEn = $config->viewEnseignantClasse('actif','en');
			// echo '<pre>';print_r($enseignantEn);
			$a = 1;
			for($i=0;$i<count($enseignantEn);$i++){
				echo "<tr>
					<td>".$a."</td>
					<td>".$enseignantEn[$i]['nom']."</td>
					<td>".strtoupper($enseignantEn[$i]['libelle_classe'])."</td>
				</tr>";
				$a++;
			}
			?>
			<tr>
				<th colspan='5' class='bien'>Section Francophone</th>
			</tr>
			<?php 
			$enseignantEn = $config->viewEnseignantClasse('actif','fr');
			// echo '<pre>';print_r($enseignantEn);
			$a = 1;
			for($i=0;$i<count($enseignantEn);$i++){
				echo "<tr>
					<td>".$a."</td>
					<td>".$enseignantEn[$i]['nom']."</td>
					<td>".strtoupper($enseignantEn[$i]['libelle_classe'])."</td>
				</tr>";
				$a++;
			}
			?>
		</table>
	</form>
</div>