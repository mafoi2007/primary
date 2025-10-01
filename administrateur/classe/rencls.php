<div id = 'body2'>
	<?php 
	if(isset($_GET['id'])){
		$id = urldecode($_GET['id']);
		$classe = $config->getClasse($id);
		// echo '<pre>'; print_r($classe); echo '</pre>';
		if($classe['section']=='en'){$section = 'Anglophone';}
		elseif($classe['section']=='fr'){$section = 'Francophone';}
		?>
		<h1>Modification de : <font class='alert'><?php echo $classe['libelle_classe']; ?></font></h1>
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
					<td>Section : </td>
					<td><input 
							type='text' 
							value='<?php echo $section;?>'
							size='30'
							disabled
							/></td>
					<td>
					<select name='section'>
						<option 
							value="en" 
							<?php if($classe['section']=='en'){echo " selected";} ?>>
							Anglophone
						</option>
						<option 
							value="fr" 
							<?php if($classe['section']=='fr'){echo " selected";} ?>>
							Francophone
						</option>
						
					</select>
					</td>
				</tr>
				
				<tr>
					<td colspan='5'>&nbsp;</td>
				</tr>
				
				<tr align='center'>
					<td>Nom de la classe: </td>
					<td><input 
							type='text' 
							value='<?php echo $classe['libelle_classe'];?>'
							size='30'
							disabled
							/></td>
					<td><input 
							type='text' 
							name='nom_classe'
							id='nom_classe'
							value='<?php echo $classe['libelle_classe'];?>' 
							required
							size='35'
							maxlength='100'
							/></td>
				</tr>
				
				<tr>
					<td colspan='5'>&nbsp;</td>
				</tr>
				
				<tr align='center'>
					<td>Code de la Classe : </td>
					<td><input 
							type='text' 
							value='<?php echo $classe['code_classe'];?>'
							size='30'
							disabled
							/></td>
					<td><input 
							type='text' 
							name='code_classe'
							id='code_classe'
							value='<?php echo $classe['code_classe'];?>' 
							required
							size='35'
							maxlength='100'
							/></td>
				</tr>
				<tr>
					<td colspan='5'>&nbsp;</td>
				</tr>
				<tr align='center'>
					<td>Niveau de la Classe : </td>
					<td><input 
							type='text' 
							value='<?php echo $classe['niveau_classe'];?>'
							size='30'
							disabled
							/></td>
					<td><input 
							type='number' 
							name='niveau_classe'
							id='niveau_classe'
							value='<?php echo $classe['niveau_classe'];?>' 
							max='6'	
							size='35'
							maxlength='100'
							/></td>
				</tr>
				<tr>
					<td colspan='5'>&nbsp;</td>
				</tr>
				
				<tr>
					<td colspan='5'>&nbsp;</td>
				</tr>
				
				<tr>
					<td colspan='5' align='center'>
						<input 
							type='hidden' 
							name='classId' 
							value='<?php echo $classe['id']; ?>' />
						<input type='submit'
								name='upd_classe'
								value='Mettre à jour' /></td>
				</tr>
			</table>
		</form>
		
		
		
<?php 	}else{
		echo "<h3 class='alert'>Vous devez choisir un utilisateur.</h3>";
	}
		?>
</div>