<h1 class='alert'>Insérer des Notes</h1>
<form method='post' action='../traitement.php'>
	<p>Mois : 
		<select name='mois' id='mois' onChange='showMatiere()'>
			<?php 
				$listeMois = $config->getMoisAll();
				for($i=0;$i<count($listeMois);$i++){
					echo "<option value='".$listeMois[$i]['id']."'>Mois ".$listeMois[$i]['id']."</option>\n";
				}
			?>
			<option value='null' selected>-Choisir un Mois-</option>
		</select>
	</p>
	<div id='matiere'>
	</div>	
	
</form>