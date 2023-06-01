<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter un antécédent | tictic-linic</title>
	<link rel="stylesheet" href="antecedent.css" />
</head>

<body>
	<ul class="Menu">
		
	</ul>

	<div id="petite_boite">
		<h1>Ajout des antécédents médicaux</h1>

		<form action="ajout_usager.php" method="POST">
			<table id="formulaire">
				<tr>
					<td><label><strong>Civilité</strong></label></td>
					<td>
						<select name="Civilite_Usager" required>
							<option value="">Choisir une civilité</option>
							<option value="Mr">Monsieur</option>
							<option value="MMe">Madame</option>
							<option value="NR">Non renseigné</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><label><strong>Nom</strong></label></td>
					<td><input type="text" placeholder="Nom du patient" name="Nom_Usager" required></td>
				</tr>
				<tr>
					<td><label><strong>Prénom</strong></label></td>
					<td><input type="text" placeholder="Prénom du patient" name="Prenom_Usager" required></td>
				</tr>
				<tr>
					<td><label><strong>Adresse</strong></label></td>
					<td><input type="text" placeholder="Adresse de l'usager" name="Adresse_Usager" required></td>
				</tr>
				
				<tr>
					<td><label><strong>Date de naissance</strong></label></td>
					<td><input type="date" name="Date_Naissance_Usager" required
						<?php
							$date_A = date('Y-m-d'); 
							$annee_min = intval(date('Y')) - 150 ;

							echo (' min= "'.$annee_min . '-' . date('m') . '-' . date('d').'" ');
							echo(' max = "'.date('Y-m-d').'" ');
						?>
					</td>
				</tr>
				<tr>
					<td><label><strong>Lieu de naissance</strong></label></td>
					<td><input type="text" placeholder="Lieu de naissance du patient" name="Lieu_Naissance_Usager" required></td>
				</tr>
				<tr>
					<td>
						<label>
							<strong>Les antécedents médicaux </strong></label>
						</td>
						<td>
							<textarea type="antécédent" placeholder="saisisé l'ensemble des antécédents du patient concerné ici...." required>

							</textarea></td>
						</tr>



					</table>
					<button onclick="window.location.href = '#';">envoyer</button>
				</form>
				<button onclick="window.location.href = '#';">Retour</button>


			</div>
		</body>
		</html>
