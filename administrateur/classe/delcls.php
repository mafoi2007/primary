<div id = 'body2'>
	<?php 
	if(isset($_GET['id'])){
		$utilisateur = $config->getClasse($_GET['id']); ?>
		
	<h1 class='alert'>Suppression de la classe</h1>
	<form method='post' action='../traitement.php'>
		<h3>Voulez-vous vraiment supprimer la classe  : <font class='bien'>
		<?php echo $utilisateur['libelle_classe'];?></font> ?
		<input type='hidden' name='classe' value="<?php echo $utilisateur['id'];?>" />
		<input type='submit' name='delClasse' value='oui' /> &nbsp; 
		<input type='submit' name='delClasse' value='non' /> &nbsp; 
		</h3>
		<p class='blink'>Attention !!! Action Irreversible !!!</p></blink>
	</form>


<?php 	}else{
	echo "<h3 class='alert'>Vous devez choisir un utilisateur à supprimer.</h3>";
}
	?>
</div>