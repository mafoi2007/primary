<?php
	
	define("serveur", 'localhost');
	define("utilisateur", 'root');
	define("pass", '');
	define("database", 'primary');
	define("appName", "Noteplus"); 
	define("appVersion", "2.1");
	define("appContact", 675400828);
	define("database2", 'archive');
	
	
	function chargerClasse($classe) {
		require($classe.".class.php"); 
		/* J'inclue la classe correspondant au paramètre passé.
	 En fait cette fonction a pour but le chargement automatique de 
	 toutes les classes que je déclare. */
	}
	
	spl_autoload_register('chargerClasse');
	
	
	$db = new PDO('mysql:host='.serveur.';dbname='.database.'', 
				utilisateur, pass);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
	
	// $bd = new PDO('mysql:host='.serveur.';dbname='.database.'', 
				// utilisateur, pass);
	// $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	
	$serveur = "http://".$_SERVER['SERVER_NAME'];
	$serveur .= ":".$_SERVER['SERVER_PORT']."/primary/";
 ?>
 
		<script>
			function getXhr(){
				var xhr = null;
				if(window.XMLHttpRequest){
					xhr = new XMLHttpRequest();
				}else{
					alert('Votre Navigateur ne supportera pas le JavaScript utilisé.');
					xhr = false;
				}
				return xhr 
			}
		</script>