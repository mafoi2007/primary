<?php 
	session_start();
	require_once('../../inc/connect.inc.php');
	$config = new config($db);
	
	$as = $config->getCurrentYear();
	
	if(isset($_POST['clas'])){
		$classe = $_POST['clas'];
		if($classe=='null'){
			echo "<h3 class='alert'>Vous devez sélectionner une classe.</h3>";
		}else{ ?>
	<table border='1' width='100%'>	
		<tr>
			<th>N°</th>
			<th>Matricule</th>
			<th>Nom et Prénom</th>
			<th>Sexe</th>
			<th>Statut</th>
			<th>Date et Lieu de Naissance</th>
		</tr>
		<?php 
		$liste = $config->listeEleve($classe, 'non_supprime', $as );
		if(count($liste)==0){
			echo "<tr>
				<th colspan='7'>Aucun élève dans la classe pour le moment.</th>
			</tr>";
		}else{
			$a=1;
			for($i=0;$i<count($liste);$i++){
				echo "<tr>
					<td>".$a."</td>
					<td>".$liste[$i]['matricule']."</td>
					<td>".$liste[$i]['nom_complet']."</td>
					<td>".$liste[$i]['sexe']."</td>
					<td>".$liste[$i]['statut']."</td>
					<td>".$liste[$i]['date_fr']." à ".$liste[$i]['lieu_naissance']."</td>
				</tr>";
			}
		}
		?>
		
	</table>
<?php 			
		}
	}
?>