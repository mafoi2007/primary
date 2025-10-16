<div id = 'body2'>
	<?php 
	if(isset($_GET['id'])){
		$id = urldecode($_GET['id']); 
		$classe = $config->getClasse($id);
        $cleNiveau = 'libelle_niveau_'.$classe['section'];
		// echo '<pre>'; print_r($classe); echo '</pre>';
		?>
		<h1>Détail de la classe <font class='alert'><?php echo $classe['libelle_classe']; ?></font></h1>
		<h3>Nom de la Classe: <font class='alert'><?php echo $classe['libelle_classe']; ?></font></h3>
		<h3>Code de la Classe : <font class='alert'><?php echo $classe['code_classe']; ?></font></h3>
		<h3>Niveau de la Classe : <font class='alert'><?php echo $classe[$cleNiveau]; ?></font></h3>
		<h3>Section : <font class='alert'><?php echo $classe['libelle_section']; ?></font></h3>
		
<?php 	}else{
		echo "<h3 class='alert'>Vous devez choisir un utilisateur.</h3>";
	}
	
	// print_r($_GET);
	?>
</div>