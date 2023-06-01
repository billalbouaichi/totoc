<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Interface Medcin</title>
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="addpatient.css" />

</head>
<body>
	<div class="wrapper">
		<div class="wrapper_inner">
			<div class="vertical_wrap">
				<div class="backdrop"></div>
				<div class="vertical_bar">
					<div class="profile_info">
						<div class="img_holder">
							<img src="image/three.jpg" alt="profile_pic" class="three">
						</div>
						<p class="title">Dr Selnissa</p>
						<p class="sub_title">Selnissa@gmail.com</p>
					</div>
					<ul class="menu">
						<li><a href="menu_acceuil.php">
							<span class="icon"><i class="fas fa-home"></i></span>
							<span class="text">Accueil</span>
						</a></li>
						<li><a href="menu_patient.php" class="active">
							<span class="icon"><i class="fas fa-user"></i></span>
							<span class="text">Mes Patients</span>
						</a></li>
						<li><a href="menu_antecedent.php" >
							<span class="icon"><i class="fas fa-file-alt"></i></span>
							<span class="text">Antécédents</span>
						</a></li>
						<li><a href="menu_ordonnace.php">
							<span class="icon"><i class="fas fa-heart"></i></span>
							<span class="text">Ordonnances </span>
						</a></li>

						<li><a href="./deconnexion.php">
							<span class="icon"><i class="fa fa-power-off"></i></span>
							<span class="text">Déconnexion</span>
						</a></li>
					</ul>

					<ul class="social">
						<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#"><i class="fab fa-instagram"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="main_container" >
				<div id="petite_boite">
		<h1>Ajouter un patient</h1>

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
				


					</table>
					<button onclick="window.location.href = '#';">Ajouter</button>
				</form>
				<button onclick="window.location.href = 'menu_patient.php';">Retour</button>


			</div>

			</div>


		</div>

	</div >
	

	

	<script>
		var hamburger = document.querySelector(".hamburger");
		var wrapper  = document.querySelector(".wrapper");
		var backdrop = document.querySelector(".backdrop");
		const container = document.createElement('div');
		container.classList.add('container');

		hamburger.addEventListener("click", function(){
			wrapper.classList.add("active");
		})

		backdrop.addEventListener("click", function(){
			wrapper.classList.remove("active");
		})
	</script>
</body>
</html>