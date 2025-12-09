<?php 
	session_start();
	require_once('../../inc/connect.inc.php');
	$config = new config($db);
	if(isset($_POST['classe'])){
		$classe = $_POST['classe'];
		if($classe=='null'){ ?>
			<h3 class='alert'>Vous devez sélectionner une classe.</h3>
<?php 			
		}else{ ?>
            Trimestre : <select name='trimestre' id='trimestre'>
                <option value='null' selected>-Choisir le Trimestre-</option>
                <option value='1'>Trimestre 1</option>
                <option value='2'>Trimestre 2</option>
                <option value='3'>Trimestre 3</option>
            </select>
            <input type='submit' name='traitementTrimestriel' value='Traitement' />
<?php 
		}
	}