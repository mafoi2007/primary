<form method='post' action='../traitement.php'>
	<fieldset>
		<h4>Sous Systeme : 
			<input 
				type='text' 
				value='<?php echo $_POST['section'];?>' 
				disabled />
		Classe : 
			<input 
				type='text'
				size='30'				
				value='<?php echo $listeMatiere[0]['libelle_classe']; ?>' 
				disabled />
		Matière :
			<input 
				type='text' 
				size='40'
				value='<?php echo strtoupper($listeMatiere[0][$cleComp]); ?>' 
				disabled />
		</h4>
	</fieldset>
	<table border='1' width='75%' align='center'>
		<tr>
			<th>N°</th>
			<th>Sous - Compétence</th>
			<th>Anc. Pondération</th>
			<th>Nv. Pondération</th>
		</tr>
		<?php 
		$a = 1;
		for($i=0;$i<count($listeMatiere);$i++){ ?>
			<tr>
				<td><?php echo $a; ?></td>
				<td>
					<?php echo ucwords($listeMatiere[$i][$cleSousComp]); ?>
					<input 
						type='hidden' 
						name='sousCompetence[]' 
						value='<?php echo $listeMatiere[$i]['id']; ?>' />
				</td>
				<td><input 
					type='number'
					size = '3'					
					value='<?php echo $listeMatiere[$i]['nb_point']; ?>' 
					disabled /></td>
				<td>
					<input 
						type='number'
						name='nb_point[]'
						max=20
						min = 0
						value='<?php echo $listeMatiere[$i]['nb_point']; ?>' 
						 />
				</td>
			</tr>
<?php 
		$a++;}
		?>
		<tr>
			<td colspan='4' align='center'>
				<input 
					type='submit' 
					name='updatePonderation' 
					value='Modifier' />
			</td>
		</tr>
	</table>
</form>