<div id = 'body2'>
	<h1>Liste des Classes</h1>
	<table border='1' width='100%'>
		<tr>
			<th>N°</th>
			<th>Nom de la classe</th>
			<th>Code</th>
			<th>Option 1</th>
			<th>Option 2</th>
			<th>Option 3</th>
		</tr>
		<tr>
			<th colspan='6' class='bien'>Section Anglophone</th>
		</tr>
		<?php 
		$classeEn = $config->viewClasseSection('actif', 'en');
		$a = 1;
		// echo '<pre>';print_r($classeEn); echo '</pre>';
		for($i=0;$i<count($classeEn);$i++){
			echo "<tr>
				<td align='center'>".$a."</td>
				<td>".strtoupper($classeEn[$i]['libelle_classe'])."</td>
				<td>".$classeEn[$i]['code_classe']."</td>
				<td><a href='?action=detail&amp;id=".$classeEn[$i]['id']."#body2'>Visualiser</a></td>
				<td><a href='?action=update&amp;id=".$classeEn[$i]['id']."#body2'>Modifier</a></td>
				<td><a href='?action=delete&amp;id=".$classeEn[$i]['id']."#body2'>Supprimer</a></td>
			</tr>";
			$a++;
		}
		
		?>
		<tr>
			<th colspan='6' class='bien'>Section Francophone</th>
		</tr>
		<?php 
		$classeFr = $config->viewClasseSection('actif', 'fr');
		$a = 1;
		// echo '<pre>';print_r($classeFr); echo '</pre>';
		for($i=0;$i<count($classeFr);$i++){
			echo "<tr>
				<td align='center'>".$a."</td>
				<td>".strtoupper($classeFr[$i]['libelle_classe'])."</td>
				<td>".$classeFr[$i]['code_classe']."</td>
				<td><a href='?action=detail&amp;id=".$classeFr[$i]['id']."#body2'>Visualiser</a></td>
				<td><a href='?action=update&amp;id=".$classeFr[$i]['id']."#body2'>Modifier</a></td>
				<td><a href='?action=delete&amp;id=".$classeFr[$i]['id']."#body2'>Supprimer</a></td>
			</tr>";
			$a++;
		}
		
		?>
	</table>
</div>