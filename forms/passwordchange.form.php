<form method='post' action='traitement.php'>
	<h1>Changer mon mot de passe</h1>
	<table border='0' width='75%'>
		<tr>
			<th>Entrez votre mot de passe actuel:</th>
			<th>
				<input 
					type='password'
					name='mdp_ancien'
					id='mdp_ancien'
					size='40' />
			</th>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<tr>
			<th>Entrez votre <b class='alert'>nouveau</b> mot de passe:</th>
			<th>
				<input 
					required
					type='password'
					name='nouveau_mdp'
					id='nouveau_mdp'
					size='40' />
			</th>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<tr>
			<th><b class='alert'>Confirmez le nouveau</b> mot de passe:</th>
			<th>
				<input 
					required
					type='password'
					name='mdp_confirm'
					id='mdp_confirm'
					size='40' />
			</th>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<tr>
			<th colspan='2'>
				<input 
					type='submit'
					name='changer_mdp'
					value='Changer mot de passe' />
			</th>
		</tr>
	</table>
</form>