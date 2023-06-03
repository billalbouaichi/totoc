<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="conxInsPat.css" />
		<title>Connexion du patient</title>
	</head>
	<body>
		<div class="container">
			<nav>
		
			</nav>

			<section>
				<div class="sec-container">
					<div class="formWrapper">
						<div class="card">
							<div class="card-header">
								<div id="forLogin" class="form-header active">Se connecter</div>
								<div id="forRegister" class="form-header">S'inscrire</div>
							</div>
							<div class="card-body" id="formContainer">
								<form action="traitement.php" method="post" id="loginForm">
									<input type="text" class="form-control" name="utilisateur" placeholder="Nom d'utilisateur" />
									<input type="password" class="form-control" name="motdepasse"  placeholder="Mot de passe" />
									<label for="remember">
										<input type="checkbox" class="form-check" id="remember" />
										Se Souvenir de moi
									</label>
									<button class="formButton">Connexion</button>
								</form>

								<form action="inscriptionpat.php" id="registerForm" method="post" class="toggleForm">
									
								<select class="form-control" name="Civilite_Usager" style="color:black; font-weight: bold;" required>
										<option value="">Choisir une civilité</option>
										<option value="Mr">Monsieur</option>
										<option value="MMe">Madame</option>
										<option value="NR">Non renseigné</option>
									</select>

									<input type="text" class="form-control" placeholder="Nom" name="Nom_Usager" required>
									<input type="text" class="form-control" placeholder="Prénom du patient" name="Prenom_Usager" required>
									<input type="text" class="form-control" placeholder="Adresse de l'usager" name="Adresse_Usager" required>
									<input type="date" class="form-control" name="Date_Naissance_Usager" required>
									<input type="text" class="form-control" placeholder="Lieu de naissance du patient" name="Lieu_Naissance_Usager" required>

									<input type="text" class="form-control" placeholder="Nom d'utilisateur..." name="Username" required>
									<input type="password" class="form-control" placeholder="Mot de passe..." name="Password" required>

									<label for="privacy">
										<input type="checkbox" class="form-check" name="privacy" id="privacy" required>
										J'accepte les termes de l'accord
									</label>

									<button type="submit" class="formButton">Inscription</button>
								</form>


							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

		<script type="text/javascript">
			function _(e) {
				return document.getElementById(e);
			}
			let displayform = _('displayForm');
			let forlogin = _('forLogin');
			let loginForm = _('loginForm');
			let forRegister = _('forRegister');
			let registerForm = _('registerForm');
			let formContainer = _('formContainer');
			
			showForm();

			forlogin.addEventListener('click', (e) => {
				e.preventDefault;
				forRegister.classList.remove('active');
				forlogin.classList.add('active');
				if (loginForm.classList.contains('toggleForm')) {
					formContainer.style.transform = 'translate(0%)';
					formContainer.style.transition = 'transform .5s';
					loginForm.classList.remove('toggleForm');
					registerForm.classList.add('toggleForm');
				}
			});

			forRegister.addEventListener('click', (e) => {
				e.preventDefault;
				forlogin.classList.remove('active');
				forRegister.classList.add('active');
				if (registerForm.classList.contains('toggleForm')) {
					formContainer.style.transform = 'translate(-100%)';
					formContainer.style.transition = 'transform .5s';
					registerForm.classList.remove('toggleForm');
					loginForm.classList.add('toggleForm');
				}
			});

			function showForm() {
				document.querySelector('.formWrapper .card').classList.toggle('show');
			}
		</script>
	</body>
</html>