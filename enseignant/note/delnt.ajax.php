<?php 
    session_start();
	require_once('../../inc/connect.inc.php');
	$config = new config($db);
	// echo '<pre>'; print_r($_SESSION);
	if(isset($_POST['subject'])){
        $matiere = $_POST['subject'];
        if($matiere=='null'){
            echo "<h3 class='alert'>Vous devez choisir une matière.</h3>";
        }else{ 
			$listeSousMatiere = $config->listeSousMatiereClasse($_SESSION['user']['classeTenue']['id'],
                                                                    $matiere);
			$cle = 'libelle_competence_'.$_SESSION['user']['classeTenue']['section'];
			$nomMatiere = $listeSousMatiere[0][$cle];
		?>
			<h3>Voulez - vous vraiment supprimer les notes de la Matière 
			<font class='alert'><?php echo strtoupper($nomMatiere); ?></font>
			pour la période du 
			<font class='alert'>Mois <?php echo $_SESSION['mois']; ?></font> ?
			<input 	
				type='hidden' 
				name='classe' 
				value='<?php echo $_SESSION['user']['classeTenue']['id']; ?>' />
			<input 
				type='submit' 
				name='deleteNote' 
				value='Oui' /> |
			<input 
				type='submit' 
				name='deleteNote' 
				value='Non' />
			</h3>
			<table border='1' width='100%'>
				
				<?php 
         }
    }