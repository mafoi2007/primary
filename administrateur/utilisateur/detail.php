<div id = 'body2'>
	<?php 
	if(isset($_GET['id'])){
		$id = urldecode($_GET['id']); 
		$utilisateur = $config->getUser($id);
		// echo '<pre>'; print_r($utilisateur); echo '</pre>';
		?>
		<h1>Fiche Utilisateur de <font class='alert'><?php echo $utilisateur['nom']; ?></font></h1>
		<h3>Nom : <?php echo $utilisateur['nom']; ?></h3>
		<h3>Sexe : <?php echo $config->getTitre($utilisateur['sexe']); ?></h3>
		<h3>Type Utilisateur : <?php echo $utilisateur['type_utilisateur']; ?></h3>
		<h3>Login : <?php echo $utilisateur['login']; ?></h3>
		<h3>Photo : <img 
						src="../<?php echo $utilisateur['image']; ?>" 
						alt="photo de <?php echo $utilisateur['login'];?>"
						width='100'
						height ='100'/></h3>
		
<?php 	}else{
		echo "<h3 class='alert'>Vous devez choisir un utilisateur.</h3>";
	}
	
	// print_r($_GET);
	?>
</div>