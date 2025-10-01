<?php $userId = $_SESSION['user']['id']; $journal = $config->journalConnexion($userId); ?>
<div id = 'body2'>
	<h1 class='alert'>Mon Journal des Connexions</h1>
	<?php 
	// echo '<pre>';print_r($journal); echo '</pre>';
	// echo '<pre>';var_dump($journal); echo '</pre>';
	?>
	<table border='1' width='100%'>
		<tr>
			<th>N°</th>
			<th>Date de Connexion</th>
			<th>Adresse IP</th>
			<th>Navigateur</th>
			<th>Système Utilisé</th>
		</tr>
		<?php 
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
		?>
	</table>
</div>