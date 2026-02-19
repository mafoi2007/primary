<div id = 'body2'>
	<?php 
	if(isset($_GET['id'])){
		$eleve = $config->getEleve($_GET['id']); ?>
		
	<h1 class='alert'>Changement de Classe</h1>
	<h2>Elève à modifier : <font class='bien'><?php echo $eleve['nom_complet'];?></font></h2>
	<form method='post' action='../traitement.php'>
		<input type='hidden' name='idEleve' value="<?php echo $eleve['id'];?>" />
		<table border='0' width='100%'>
			<tr>
				<th>Libellé</th>
				<th>Anciennce Classe</th>
				<th>Nouvelle Classe</th>
			</tr>
			
			
			<tr>
				<td>Classe</td>
				<td align='center'>
					<select>
						<option disabled selected>
							<?php echo $eleve['libelle_classe'];?>
						</option>
					</select>
				</td>
				<td align='center'>
					<select name='classeEleve'>
						<?php $classeFr = $config->viewClasseSection('actif', 'fr'); ?>
						<optgroup label='Section Francophone'>
							<?php 
							for($i=0;$i<count($classeFr);$i++){
								echo "<option value='";
								echo $classeFr[$i]['id'];
								echo "'";
								if($eleve['classe']==$classeFr[$i]['id']){
									echo "selected";
								}
								echo ">";
								echo $classeFr[$i]['libelle_classe'];
								echo "</option>";
							} ?>
						</optgroup>
						<?php $classeEn = $config->viewClasseSection('actif', 'en'); ?>
						<optgroup label='Section Anglophone'>
							<?php 
							for($j=0;$j<count($classeEn);$j++){
								echo "<option value='";
								echo $classeEn[$j]['id'];
								echo "'";
								if($eleve['classe']==$classeEn[$j]['id']){
									echo "selected";
								}
								echo ">";
								echo $classeEn[$j]['libelle_classe'];
								echo "</option>";
							} ?>
						</optgroup>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan='5'>&nbsp;</td>
			</tr>
			
			
			<tr>
				<td colspan='5' align='center'>
					<input 
						type='submit' 
						name='updClasseEleve' 
						value='Mettre à Jour' />
				</td>
			</tr>
		</table>
		
	</form>


<?php 	}else{
	echo "<h3 class='alert'>Vous devez choisir un élève pour modifier ses informations.</h3>";
}
	?>
</div>