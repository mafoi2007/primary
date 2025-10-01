<?php 
	session_start();
	require_once('../../inc/connect.inc.php');
	$config = new config($db);
	
	$as = $config->getCurrentYear();
	
	if(isset($_POST['classe'])){
		$classe = $_POST['classe'];
		if($classe=='null'){
			echo "<h3 class='alert'>Vous devez sélectionner une classe.</h3>";
		}else{ 
			$section =$config->getSection($classe);
		?>
	<input type='hidden' name='section' value='<?php echo $section; ?>' />
	<input type='hidden' name='to_print' value='listeEleve' />
	<input type='submit' name='print' value='Imprimer' />
	
<?php 			
		}
	}
?>