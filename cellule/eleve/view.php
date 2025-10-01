<div id = 'body2'>
	<?php 
	if(isset($_GET['id'])){
		$eleve = $config->getEleve($_GET['id']); ?>
		
	<h1 class='alert'>Fiche de l'élève</h1>
	<form method='post' action='../traitement.php' target='_blank'>
		<h3>Générer la fiche de l'élève  : <font class='bien'>
		<?php echo $eleve['nom_complet'];?></font> ?
		<input type='hidden' name='eleve' value="<?php echo $eleve['id'];?>" />
		<input type='hidden' name='print' value="imprimer" />
		<input type='hidden' name='to_print' value="ficheEleve" />
		<input type='submit' name='fEleve' value='oui' /> &nbsp; 
		<input type='submit' name='fEleve' value='non' /> &nbsp; 
		</h3>
	</form>


<?php 	}else{
	echo "<h3 class='alert'>Vous devez choisir un élève pour générer sa fiche.</h3>";
}
	?>
</div>