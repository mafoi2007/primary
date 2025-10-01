<h1 class='alert'>Ajouter des photos</h1>
<form method='post' action='../traitement.php' enctype='multipart/form-data' target='_blank'>

			<p>Classe :
				<select name="clas" id='clas' onChange='addPhoto()'>
					<?php
					$listeFr = $config->viewClasseSection('actif', 'fr');
					$listeEn = $config->viewClasseSection('actif', 'en');
					echo "<optgroup label='Section Francophone'></optgroup>";	
						for($nb = 0; $nb <count($listeFr);$nb++) {
							echo "<option value=";
							echo $listeFr[$nb]['id'];
							echo ">";
							echo strtoupper($listeFr[$nb]['libelle_classe']);
							echo "</option>\n";
						}
					
					echo "<optgroup label='Section Anglophone'></optgroup>";
						for($na = 0; $na <count($listeEn);$na++) {
							echo "<option value=";
							echo $listeEn[$na]['id'];
							echo ">";
							echo strtoupper($listeEn[$na]['libelle_classe']);
							echo "</option>\n";
						}
					
					?>
					<option value='null' selected>-Choisir une Classe-</option>
				</select></p>
			
			<div id='eleve'>
				
			</div>
</form>