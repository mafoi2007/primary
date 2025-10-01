<h1 class='alert'>Ajouter un élève</h1>
<form method='post' action='../traitement.php'>

			<p>Classe :
				<select name="classe" id='classe' onChange='addEleve()'>
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