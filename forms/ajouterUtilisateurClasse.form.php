<h1 class='alert'>Ajouter un utilisateur à la classe</h1>
<form method='post' action='../traitement.php' enctype='multipart/form-data'>

			<p>Classe :
				<select name="classe" id="classe" onChange='addUserClasse()'>
					
					<?php
					$classeFr = $config->viewClasseSection('actif','fr');
					echo "<optgroup label='Secton Francophone'></optgroup>";
					for($i=0;$i<count($classeFr);$i++){
						echo "<option value=";
						echo $classeFr[$i]['id'];
						echo ">";
						echo strtoupper($classeFr[$i]['libelle_classe']);
						echo "</option>\n";
					}
					$classeEn = $config->viewClasseSection('actif','en');
					echo "<optgroup label='Secton Anglophone'></optgroup>";
					for($j=0;$j<count($classeEn);$j++){
						echo "<option value=";
						echo $classeEn[$j]['id'];
						echo ">";
						echo strtoupper($classeEn[$j]['libelle_classe']);
						echo "</option>\n";
					}
					?>
					<option value='null' selected>-Choisir une classe-</option>
				</select></p>
			
			<div id='enseignant'>
				
			</div>
</form>