<h1 class='alert'>Ajouter un utilisateur</h1>
<form method='post' action='../traitement.php' enctype='multipart/form-data'>

			<p>Type d'utilisateur :
				<select name="type" id="type" onChange='addUser()'>
					<?php
					$listeType = $config->userType();
					for($i=0;$i<count($listeType);$i++){
						echo "<option value=";
						echo $listeType[$i]['id'];
						echo ">";
						echo $listeType[$i]['libelle_poste'];
						echo "</option>\n";
					}
					?>
					<option value='null' selected>-Choisir un type-</option>
				</select></p>
			
			<div id='enseignant'>
				
			</div>
</form>