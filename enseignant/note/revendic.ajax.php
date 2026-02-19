<?php 
    session_start();
	require_once('../../inc/connect.inc.php');
	$config = new config($db);
	// echo '<pre>'; print_r($_POST); echo '</pre>';
	if(isset($_POST['eleve'])){
        $eleve = $_POST['eleve'];
        if($eleve=='null'){
            echo "<h3 class='alert'>Vous devez choisir un élève.</h3>";
        }else{
            $nomEleve = $config->getEleve($eleve);
            echo "<h3 class='bien'> Elève : ".$nomEleve['nom_complet']."</h3>";
            echo "<h3 class='alert'>Mois Concerné : ".$_SESSION['mois']."</h3>";
            $listeNote = $config->noteEleveRevendic($_POST['eleve'], $_SESSION['mois']);
            require_once('revendicEleve.php');
         }
    }