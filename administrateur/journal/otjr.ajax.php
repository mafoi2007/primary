<?php 
	session_start();
	require_once('../../inc/connect.inc.php');
	$config = new config($db);
	
	if(isset($_POST['enseignant'])){
		$enseignant = $_POST['enseignant'];
		if($enseignant=='null'){
			echo "<h3 class='alert'>Vous devez sélectionner un enseignant.</h3>";
		}else{ ?>
	<table border='1' width='100%'>	
		<tr>
			<th>N°</th>
			<th>Date de Connexion</th>
			<th>Adresse IP</th>
			<th>Navigateur</th>
			<th>Système Utilisé</th>
		</tr>
		<?php 
		$journal = $config->journalConnexion($enseignant);
		if(empty($journal)){
			echo "<tr>
				<th class='blink' colspan='6'>Cet enseignant ne s'est jamais connecté.</th>
			</tr>";
		}else{
			$a = 1;
			for($i=0;$i<count($journal);$i++){
				echo"<tr>
					<td align='center'>".$a."</td>
					<td>".$journal[$i]['periode_fr']."</td>
					<td>".$journal[$i]['adresse_ip']."</td>
					<td>".$journal[$i]['navigateur']."</td>
					<td>".$journal[$i]['os']."</td>
				</tr>";
				$a++;
			}
			echo "<caption>Journal de : ".$journal[0]['nom']." </caption>";
		}
		?>
	</table>
<?php 			
		}
	}
?>