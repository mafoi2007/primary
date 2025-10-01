<?php 
	session_start();
	require_once('../inc/connect.inc.php');
	$config = new Config($db);
	if(isset($_POST['region'])){
		if($_POST['region']=='null'){
			echo "<h4 class='alert'>Vous devez choisir une region valide</h4>";
		}else{
			$departement = $config->getDepartement($_POST['region']);
?>
<h4>Département : 
	<select name='departement' id='departement'>
		<?php for($a=0;$a<count($departement);$a++){
			echo "<option value='";
			echo $departement[$a]['id']."'>";
			echo $departement[$a]['nom_court_fr']."</option>";
		}?>
	</select>
</h4>
<h4>Arrondissement : 
				<input
					type='text'
					name='arrondissement'
					size='55'
					placeholder='Ex: Douala'
				/>
</h4>
<h4>Type d'établissement : 
	<select name='typeEts'>
		<option value='fr'>Francophone</option>
		<option value='en'>Anglophone</option>
		<option value='bil' selected>Bilingue</option>
	</select>
</h4>
<h4>Libellé Etablissement (Français): 
				<input
					type='text'
					name='etablissementFr'
					size='55'
					placeholder='Nom Ecole en Français'
				/>
			</h4>
<h4>Libellé Etablissement (Anglais):
				<input
					type='text'
					name='etablissementEn'
					size='55'
					placeholder='Nom Ecole en Anglais'
				/>
			</h4>
<h4>Lieu du Fait à : 
				<input
					type='text'
					name='ville'
					size='55'
					placeholder='Ex: Makepe'
				/>
</h4>

<h4>Contact Etablissement :
			<input
					type='text'
					name='contact'
					size='12'
					maxlength='9'
					placeholder='Ex:677889900'
				/>
</h4>

<h4>Email Etablissement : 
			<input
					type='email'
					name='email'
					size='25'
					placeholder='example@serveur.com'
				/>
</h4>

<h4>Boite Postale Etablissement :
			<input
					type='text'
					name='boitePostale'
					size='15'
					placeholder='Ex: 210 Yaoundé'
				/>
</h4>

<h4>Directeur de l'ecole : 
			<select name='sexe'>
				<option value='M'>Monsieur</option>
				<option value='F'>Mademoiselle/Madame</option>
			</select>
			<input
					type='text'
					name='chef'
					size='55'
					placeholder='Nom et Prénom'
				/>
</h4>

<h4>Année Scolaire :  
	<select name='debut' id='debut' onChange='getAs()'>
		<?php 
			$annee = DATE('Y');
			for($b=$annee-2;$b<$annee+2;$b++){
				echo "<option value='".$b."'>".$b."</option>";
			}
			?>
	</select>
	<div id='fin' style = 'display:inline'>
				
	</div>
</h4>
<?php 
	}}else{
		$departement = array('');
	}