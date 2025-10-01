<?php 
	session_start();
	require_once('../inc/connect.inc.php');
	$config = new config($db);
	if(isset($_POST['niveau'])){
		$niveau = (int) $_POST['niveau'];
		if($niveau==0){
			echo "<h3 class='alert'>Vous devez choisir un niveau.</h3>";
		}else{ ?>
			<table border='0' width='70%'>
				<tr>
					<td>Section </td>
					<td> : </td>
					<td>
					<select name='section' id='section'>
						<option value='fr'>Section Francophone</option>
						<option value='en'>Section Anglophone</option>
					</select>
					</td>
				</tr>
				<tr>
					<td colspan='3'>&nbsp;</td>
				</tr>
				<tr>
					<td>Nom de la Classe</td>
					<td> : </td>
					<td><input 
							type='text' 
							id='nomClasse'
							name='nomClasse' 
							size='25' 
							maxlength='22'
							required
							/>
					</td>
				</tr>
				<tr>
					<td colspan='3'>&nbsp;</td>
				</tr>
				<tr>
					<td>Code de la Classe</td>
					<td> : </td>
					<td><input 
							type='text' 
							id='codeClasse'
							name='codeClasse' 
							size='25' 
							maxlength='15'
							required
							/></td>
				</tr>
				<tr>
					<td colspan='3'>&nbsp;</td>
				</tr>
				
				<tr>
					<td colspan='3' align='center'>
						<input 
							type="submit" 
							name="ajout_classe" 
							value="Ajouter la classe" />
					</td>
				</tr>
			</table>
			
			
<?php 		}
	}