<?php 
	session_start();
	require_once('../inc/connect.inc.php');
	$config = new config($db);
	if(isset($_POST['mois'])){
		$mois = $_POST['mois'];
		$_SESSION['mois'] = $mois;
		if($mois=='null'){
			echo "<h3 class='alert'>Vous devez choisir un mois.</h3>";
		}else{ ?>
			<p>Matière : 
				<select name='subject' id='subject' onChange='delNote()'>
					<option value='null' selected>-Choisir une matière-</option>
					<?php 
					$listeMatiere = $config->getNoteSaisieMois($_SESSION['user']['classeTenue']['id'],
															$mois);
					for($i=0;$i<count($listeMatiere);$i++){
						if($_SESSION['user']['classeTenue']['section']=='fr'){
							$libMatiere = $listeMatiere[$i]['libelle_competence_fr'];
						}
						elseif($_SESSION['user']['classeTenue']['section']=='en'){
							$libMatiere = $listeMatiere[$i]['libelle_competence_en'];
						}
						echo "<option value='".$listeMatiere[$i]['matiere']."'>".strtoupper($libMatiere)."</option>";
					} ?>
				</select>
			</p>
			<div id='note'>
			</div>

<?php 
		}
	}