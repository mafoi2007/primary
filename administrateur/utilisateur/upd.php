<div id = 'body2'>
	<?php 
	if(isset($_GET['id'])){
		$id = urldecode($_GET['id']);
		$utilisateur = $config->getUser($id);
		// echo '<pre>'; print_r($utilisateur); echo '</pre>'; ?>
		<h1>Modification de <font class='alert'><?php echo $utilisateur['nom']; ?></font></h1>
		<form method='post' action='../traitement.php'>
			<table border='0' width='100%'>
				<tr>
					<th>Libelle</th>
					<th>Anciennes Valeurs</th>
					<th>Nouvelles Valeurs</th>
				</tr>
				<tr>
					<td colspan='5'>&nbsp;</td>
				</tr>
				<tr align='center'>
					<td>Nom : </td>
					<td><input 
							type='text' 
							value='<?php echo $utilisateur['nom'];?>'
							size='30'
							disabled
							/></td>
					<td><input 
							type='text' 
							name='nom_utilisateur'
							id='nom_utilisateur'
							value='<?php echo $utilisateur['nom'];?>' 
							required
							size='35'
							maxlength='100'
							/></td>
				</tr>
				<tr>
					<td colspan='5'>&nbsp;</td>
				</tr>
				<tr align='center'>
					<td>Sexe : </td>
					<td><select>
						<option disabled selected>
							<?php echo $utilisateur['valeurSexe'];?>
						</option>
					</select></td>
					<td><select name='sexe_utilisateur'>
					<?php 
					$listeSexe= $config->listeSexe();
					for($i=1;$i<count($listeSexe['libelle']);$i++){
						echo "<option value='";
						echo $listeSexe['code'][$i];
						echo "'";
						if($listeSexe['code'][$i]===$utilisateur['sexe']){
							echo "selected";
						}
						echo">".$listeSexe['libelle'][$i]."</option>";
					}
					?>
					</select></td>
				</tr>
				<tr>
					<td colspan='5'>&nbsp;</td>
				</tr>
				<tr align='center'>
					<td>Login : </td>
					<td><input 
							type='text' 
							value='<?php echo $utilisateur['login'];?>'
							size='30'
							disabled
							/></td>
					<td><input 
							type='text' 
							name='login_utilisateur'
							id='login_utilisateur'
							value='<?php echo $utilisateur['login'];?>' 
							required
							size='35'
							maxlength='100'
							/></td>
				</tr>
				<tr>
					<td colspan='5' align='center'>
						<input 
							type='hidden' 
							name='userId' 
							value='<?php echo $utilisateur['id']; ?>' />
						<input type='submit'
								name='upd_utilisateur'
								value='Mettre à jour' /></td>
				</tr>
			</table>
		</form>
		
		
		
<?php 	}else{
		echo "<h3 class='alert'>Vous devez choisir un utilisateur.</h3>";
	}
		?>
</div>