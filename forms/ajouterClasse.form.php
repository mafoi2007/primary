<h1 class='alert'>Ajouter une classe</h1>
<form method='post' action='../traitement.php' enctype='multipart/form-data'>

			<p>Niveau de la classe :
				<select name="niveau" id="niveau" onChange='addClasse()'>
					<?php
					$listeNiveau['code'] = array(0,1,2,3,4,5,6);
					$listeNiveau['libelle'] = array('-Choisir un niveau-',
													'Niveau 1',
													'Niveau 2',
													'Niveau 3',
													'Niveau 4',
													'Niveau 5',
													'Niveau 6');
					for($i=0;$i<count($listeNiveau['code']);$i++){
						echo "<option value=";
						echo $listeNiveau['code'][$i];
						if($listeNiveau['code'][$i]===0){echo ' selected ';}
						echo ">";
						echo $listeNiveau['libelle'][$i];
						echo "</option>\n";
					}
					?>
				</select></p>
			
			<div id='classe'>
				
			</div>
</form>