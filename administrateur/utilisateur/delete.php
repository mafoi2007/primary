<div id = 'body2'>
	<?php 
	if(isset($_GET['id'])){
		$utilisateur = $config->getUser($_GET['id']); ?>
		
	<h1 class='alert'>Suppression de l'utilisateur</h1>
	<form method='post' action='../traitement.php'>
		<h3>Voulez-vous vraiment supprimer l'utilisateur  : <font class='bien'>
		<?php echo $utilisateur['nom'];?></font> ?
		<input type='hidden' name='utilisateur' value="<?php echo $utilisateur['id'];?>" />
		<input type='submit' name='delUser' value='oui' /> &nbsp; 
		<input type='submit' name='delUser' value='non' /> &nbsp; 
		</h3>
		<p class='blink'>Attention !!! Action Irreversible !!!</p></blink>
	</form>


<?php 	}else{
	echo "<h3 class='alert'>Vous devez choisir un utilisateur à supprimer.</h3>";
}
	?>
</div>