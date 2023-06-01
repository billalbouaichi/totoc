<html>
<head>
	<meta charset="utf-8">
	<title>affichage des antécédents| Cabinet médical</title>
	<link rel="stylesheet" href="affiche_antecedent.css" />
</head>

<body>
	

	<div id="grande_boite">
		<h1>antécédents médicaux</h1>

		<form action="rechercher_usager.php" method="POST">
			<table id="recherche">
				<tr>
					<td><p><strong>Recherche rapide :</strong></p></td>
					<td><input type="search" placeholder="Élément à rechercher" name="Recherche"></td>
					<td><p>dans</p></td>
					<td>
						<select name="Colonne">
							<option value="">Choisir une colonne</option>
							<option value="Civilite_Usager">Civilité</option>
							<option value="Nom_Usager">Nom</option>
							<option value="Prenom_Usager">Prénom</option>
							<option value="Adresse_Usager">Adresse</option>
							<option value="Date_Naissance_Usager" >Date de Naissance</option>
							<option value="Lieu_Naissance_Usager">Lieu de naissance</option>
							<option value="Medecin_Usager">antécédents</option>
						</select>
					</td>
					<td><input type="submit"></td>					
				</tr>
			</table>		
		</form>

		<table id="tableau">
			<tr>
				<th scope="col">Civilité</th>
				<th scope="col">Nom</th>
				<th scope="col">Prénom</th>
				<th scope="col">Adresse</th>
				<th scope="col">Date de Naissance</th>
				<th scope="col">Lieu de naissance</th>
				<th scope="col">Medecin traitant</th>
				<th scope="col">Antécédents médicaux</th>
			</tr>
			
		</table>
		<table id="recherche">
			<tr>
				<td><button id="retour" onclick="window.location.href = 'antécédent.php';">Ajouter</button></td>
				<td><button id="retour" onclick="window.location.href = '#';">Retour</button></td>
			</tr>
		</table>		
	</div>
</body>
</html>