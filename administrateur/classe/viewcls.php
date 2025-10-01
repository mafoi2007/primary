<div id = 'body2'>
	<?php 
	if(isset($_GET['id'])){
		$id = urldecode($_GET['id']); 
		$classe = $config->getClasse($id);
		// echo '<pre>'; print_r($classe); echo '</pre>';
		if($classe['section']=='en'){$section = 'Anglophone';}
		elseif($classe['section']=='fr'){$section = 'Francophone';}
		?>
		<h1>Détail de la classe : <font class='alert'><?php echo $classe['libelle_classe']; ?></font></h1>
		<h3>Section : <font class='alert'><?php echo $section; ?></font></h3>
		<h3>Niveau : <font class='alert'><?php echo $classe['niveau_classe']; ?></font></h3>
		<h3>Nom Classe : <font class='alert'><?php echo $classe['libelle_classe']; ?></font></h3>
		<h3>Code Classe : <font class='alert'><?php echo $classe['code_classe']; ?></font></h3>
		
<?php 	}else{
		echo "<h3 class='alert'>Vous devez choisir une classe.</h3>";
	}
	
	// print_r($_GET);
	?>
</div>