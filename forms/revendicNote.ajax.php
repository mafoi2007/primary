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
			Elève : 
				<select name='eleve' id='eleve' onChange='revendicNote()'>
					<option value='null' selected>-Choisir un élève-</option>
					<?php 
                    $listeEleve = $config->listeEleve($_SESSION['user']['classeTenue']['id'], 'non_supprime', '');
					for($i=0;$i<count($listeEleve);$i++){
						echo "<option value='".$listeEleve[$i]['id']."'>".strtoupper(stripslashes($listeEleve[$i]['nom_complet']))."</option>";
					} ?>
				</select>
			
			<div id='note'>
			</div>

<?php 
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	if(isset($_POST['mois'])){
		$mois = $_POST['mois'];
		$_SESSION['mois'] = $mois;
		if($mois=='null'){
			
		}else{/* ?>
			<p>Matière : 
				<select name='subject' id='subject' onChange='addNote()'>
					<?php 
					$listeMatiere = $config->listeMatiereClasse($_SESSION['user']['classeTenue']['id']);
					for($i=0;$i<count($listeMatiere);$i++){
						if($_SESSION['user']['classeTenue']['section']=='fr'){
							$libComp = $listeMatiere[$i]['libelle_competence_fr'];
						}elseif($_SESSION['user']['classeTenue']['section']=='en'){
							$libComp = $listeMatiere[$i]['libelle_competence_en'];
						}
						echo "<option value='".$listeMatiere[$i]['id_competence']."'>".strtoupper($libComp)."</option>";
					}
					?>
					<option value='null' selected>-Choisir une matière-</option>
				</select>
			</p>
			<div id='note'>
			</div>
<?php 		*/
		}
	}
	
	
	
	
	
	
	
	
	
	$nbr = $config->getCode();
	$valeurMat = $nbr+1;
	if(strlen($valeurMat)==1){$lastNbr = '000'.$valeurMat;}
	elseif(strlen($valeurMat)==2){$lastNbr = '00'.$valeurMat;}
	elseif(strlen($valeurMat)==3){$lastNbr = '0'.$valeurMat;}
	elseif(strlen($valeurMat)>=3){$lastNbr = $valeurMat;}
	$var = "CP";
	$var .= DATE('Y');
	$var .= "-";
	$var .= $lastNbr;
	echo "<input type='hidden' name='numero' value='".$valeurMat."' />";
	
	if(isset($_POST['clas'])){
		$classe = $_POST['clas'];
		if($classe=='null'){
			echo "<h3 class='alert'>Vous devez sélectionner une classe.</h3>";
		}else{ ?>
	<table border='0' width='70%'>	
		<tr>
			<td>Matricule :</td>
			<td><input 
					type='text' 
					name="matricule" 
					id='matricule'  
					maxlength ='10' 
					readonly 
					value="<?php echo $var;?>" />
			</td>
		</tr>
		<tr>
			<td>Nom : </td>
			<td><input 
					type ='text' 
					name="nom" 
					id='nom' 
					required 
					value="<?php if(isset($_REQUEST['nom'])){
									echo $_REQUEST['nom'];}?>" />
			</td>
		</tr>
		<tr>
			<td>Prénom :</td>
			<td><input 
					type='text' 
					name="prenom" 
					id='prenom' 
					value="<?php if(isset($_REQUEST['prenom'])){
										echo $_REQUEST['prenom'];}?>" />
			</td>
		</tr>
		<tr>
			<td>Sexe : </td>
			<td><select name="sexe">
					<option value='NULL'>-Sexe-</option>
					<option value='M'>Masculin</option>
					<option value='F'>Féminin</option>
				</select>
			</td>
		</tr>
		
		<tr>
			<td>Statut : </td>
			<td><select name="statut">
					<option value='N'>Nouveau</option>
					<option value='R'>Rédoublant</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Date de Naissance :</td>
			<td>
			<input type='date' name='date_naissance' />
			</td>
		</tr>
		<tr>
			<td>Lieu de Naissance : </td>
			<td><input 
					type ='text' 
					name="lieu_naiss" 
					id='lieu_naiss' 
					required  
					value="<?php if(isset($_REQUEST['lieu_naiss'])){
											echo $_REQUEST['lieu_naiss'];}?>" />
			</td>
		</tr>
		<tr>
			<td>Nom du Père : </td>
			<td><input 
					type ='text' 
					name="nom_pere" 
					id='nom_pere'  
					value="<?php if(isset($_REQUEST['nom_pere'])){
											echo $_REQUEST['nom_pere'];}?>" />
			</td>
		</tr>
		<tr>
			<td>Nom de la Mère : </td>
			<td><input 
					type ='text' 
					name="nom_mere" 
					id='nom_mere' 
					required  
					value="<?php if(isset($_REQUEST['nom_mere'])){
											echo $_REQUEST['nom_mere'];}?>" />
			</td>
		</tr>
		<tr>
			<td>Adresse des Parents :</td>
			<td><input 
					type='text' 
					name="adresse" 
					id='adresse' 
					value="<?php if(isset($_REQUEST['adresse'])){
											echo $_REQUEST['adresse'];}?>" />
			</td>
		</tr>
		<tr>
			<td colspan='2' align='center'>
				<input 
					type="submit" 
					name="ajout_eleve" 
					value="Ajouter Elève" />
			</td>
		</tr>
	</table>
<?php 			
		}
	}
?>