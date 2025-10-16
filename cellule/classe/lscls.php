<div id = 'body2'>
	<h1 class='alert'>Liste des Classes</h1>
	<form method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
		<table border='1' width='100%'>
			<tr>
				<th>Nom de la Classe</th>
				<th>Section de la Classe</th>
				<th>Option 1</th>
				<th>Option 2</th>
				<th>Option 3</th>
			</tr>
			<?php 
			$listeClasse = $config->listeClasse('actif');
			// echo '<pre>';print_r($listeClasse);
			for($i=0;$i<count($listeClasse);$i++){
				$id = $listeClasse[$i]['id'];
				$nomClasse = utf8_decode($listeClasse[$i]['libelle_classe']);
				$sectionClasse = utf8_decode($listeClasse[$i]['libelle_section']);
				echo "<tr>
					<td>".strtoupper($nomClasse)."</td>
					<td>".$sectionClasse."</td>
					<td><a href='?action=detail&amp;id=".$id."#body2'>Détail</a></td>
					<td><a href='?action=upd&amp;id=".$id."#body2'>Modifier</a></td>
					<td><a href='?action=delete&amp;id=".$id."#body2'>Supprimer</a></td>
				</tr>";
			}
			?>
		</table>
	</form>
</div>