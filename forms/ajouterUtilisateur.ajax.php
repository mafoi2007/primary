<?php 
	session_start();
	require_once('../inc/connect.inc.php');
	$config = new config($db);
	
	if(isset($_POST['type'])){
		$type = (int) $_POST['type'];
		if($type==0){
			echo "<h3 class='alert'>Vous devez choisir une valeur.</h3>";
		}elseif($type==1){
			echo "<h3 class='alert'>Il ne peut y avoir qu'un seul administrateur.</h3>";
		}else{ ?>
			<table border='0' width='70%'>
				<tr>
					<td>Nom de l'utilisateur</td>
					<td> : </td>
					<td><input 
							type='text' 
							id='nomUser'
							name='nomUser' 
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
					<td>Prénom de l'utilisateur</td>
					<td> : </td>
					<td><input 
							type='text' 
							id='prenomUser'
							name='prenomUser' 
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
					<td>Sexe de l'utilisateur</td>
					<td> : </td>
					<td><select name="sexeUser">
					<option value='NULL' selected>-Sexe-</option>
					<option value='M'>Masculin</option>
					<option value='F'>Féminin</option>
				</select>
					</td>
				</tr>
				<tr>
					<td colspan='3'>&nbsp;</td>
				</tr>
				<tr>
					<td>Login de l'utilisateur</td>
					<td> : </td>
					<td><input 
							type='text' 
							id='loginUser'
							name='loginUser' 
							size='25' 
							maxlength='15'
							required
							/></td>
				</tr>
				<tr>
					<td colspan='3'>&nbsp;</td>
				</tr>
				<tr>
					<td>Mot de Passe de l'utilisateur</td>
					<td> : </td>
					<td><input 
							type='password' 
							id='pwdUser'
							name='pwdUser' 
							size='25' 
							maxlength='15'
							title='Les espaces seront automatiquement supprimés'
							required
							/>
					</td>
				</tr>
				<tr>
					<td colspan='3'>&nbsp;</td>
				</tr>
				<tr>
					<td>Image de l'utilisateur</td>
					<td> : </td>
					<td><input 
							type='file' 
							name='photoUser' 
							/>
					</td>
				</tr>
				<tr>
					<td colspan='3'>&nbsp;</td>
				</tr>
				<tr>
					<td colspan='3'>
						<input 
							type="submit" 
							name="ajout_utilisateur" 
							value="Ajouter l'utilisateur" />
					</td>
				</tr>
			</table>
			
			
<?php 		}
	}