<?php
	session_start();
	require_once('../../inc/connect.inc.php');
	$config = new config($db);
?>
	<h1 class='bien'>Resultats de la Recherche</h1>
	<table border='1' width='100%'>
		<tr>
			<th>N°</th>
			<th>Noms et Prénoms</th>
			<th>Option 1</th>
			<th>Option 2</th>
			<th>Option 3</th>
		</tr>
		<?php 
		// echo sha1('eleve');
		if(isset($_POST['eleve'])){
			$reponse = $config->findEleve($_POST['eleve']);
			$a = 1;
			if(empty($reponse)){
				$message = 'No Results found / Aucun Resultat';
				echo "<tr>
					<th colspan='4' align='center' class='alert'>".strtoupper($message)."</th>
				</tr>";
			}else{
				for($i=0;$i<count($reponse);$i++){
					$nomEleve = strtoupper($reponse[$i]['nom_complet']);
					$pageView = 'eleve.php?action=view&amp;id='.$reponse[$i]['id'];
					$pageUpd = 'eleve.php?action=upd&amp;id='.$reponse[$i]['id'];
					$pageDel = 'eleve.php?action=delete&amp;id='.$reponse[$i]['id'];
					$pageRest = 'eleve.php?action=restaure&amp;id='.$reponse[$i]['id'];
					echo "<tr>
						<td>".$a."</td>
						<td>".$nomEleve."</td>
						<td><a href='".$pageView."#body2'>Visualiser</a></td>
						<td><a href='".$pageUpd."#body2'>Modifier</a></td>";
						if($reponse[$i]['etat']==='non_supprime'){
							echo "<td><a href='".$pageDel."#body2'>Supprimer</a></td>";
						}elseif($reponse[$i]['etat']==='supprime'){
							echo "<td><a href='".$pageRest."#body2'>Restaurer</a></td>";
						}
					echo "</tr>";
				}
			}
		}
		?>
	</table>	