<div id = 'body2'>
	<h1>Liste des Utilisateurs</h1>
	<form method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
		<table border='1' width='100%'>
			<tr>
				<th>Noms et Prénoms</th>
				<th>Type Utilisateur</th>
				<th>Option 1</th>
				<th>Option 2</th>
				<th>Option 3</th>
			</tr>
			<?php 
			$typeUtilisateur = $config->userType();
			// echo '<pre>';print_r($typeUtilisateur);
			for($i=0;$i<count($typeUtilisateur);$i++){
				$userType = $typeUtilisateur[$i]['code_poste'];
				$utilisateur = $config->getUtilisateurType($userType);
				for($j=0;$j<count($utilisateur);$j++){
					$id = $utilisateur[$j]['idEnseignant'];
					echo "<tr>
						<td>".$utilisateur[$j]['nom']."</td>
						<td>".$utilisateur[$j]['libelle_poste']."</td>
						<td><a href='?action=detail&amp;id=".$id."#body2'>Détail</a></td>
						<td><a href='?action=upd&amp;id=".$id."#body2'>Modifier</a></td>
						<td><a href='?action=delete&amp;id=".$id."#body2'>Supprimer</a></td>
					</tr>";
				}
			}
			?>
		</table>
	</form>
</div>