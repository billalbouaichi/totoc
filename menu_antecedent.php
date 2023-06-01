<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Interface Medcin</title>
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
		<link rel="stylesheet" href="menu_antecedent.css" />
		<style>
  .antecedent-row {
    display: flex;
    align-items: center;
  }

  .antecedent-row input {
    margin-right: 5px;
    flex-basis: 90%;
  }
  .deletebtn{
	color : green;
	background-color : gray;
  }
</style>
</head>
<body>
<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if(!isset($_SESSION['id'])) {
  // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
  header('Location: login.php');
  exit;
}

// Récupérer l'id de l'utilisateur à partir de la session
$user_id = $_SESSION['id'];

// Se connecter à la base de données
$conn = new mysqli('localhost', 'root', '', 'totoc');

// Vérifier si la connexion a réussi
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Rechercher l'utilisateur dans la base de données
$sql = "SELECT * FROM user WHERE id = $user_id";
$result = $conn->query($sql);

// Vérifier si la requête a renvoyé un résultat
if ($result->num_rows > 0) {
    // Récupérer le nom d'utilisateur
    $row = $result->fetch_assoc();
    $username = $row['username'];
	$nom = $row['nom'];
	$prenom = $row['prenom'];
}


?>
	<div class="wrapper">
		<div class="wrapper_inner">
			<div class="vertical_wrap">
				<div class="backdrop"></div>
				<div class="vertical_bar">
					<div class="profile_info">
						<div class="img_holder">
							<img src="image/three.jpg" alt="profile_pic" class="three">
						</div>
						<p class="title"><?php echo $username; ?></p>
						<p class="sub_title"><?php echo $nom.' '.$prenom; ?> </p>
					</div>
					<ul class="menu">
						<li><a href="menu_acceuil.php">
							<span class="icon"><i class="fas fa-home"></i></span>
							<span class="text">Accueil</span>
						</a></li>
						<li><a href="menu_patient.php">
							<span class="icon"><i class="fas fa-user"></i></span>
							<span class="text">Mes Patients</span>
						</a></li>
						<li><a href="menu_antecedent.php" class="active">
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
		<h1>Ajout des antécédents médicaux</h1>
<?php
if(isset($_GET['id'])){ 
$idPatient = $_GET['id'];
$sql = "SELECT * FROM user WHERE id = $idPatient";
$result = $conn->query($sql);

// Vérifier si la requête a renvoyé un résultat
if ($result->num_rows > 0) {
    // Récupérer le nom d'utilisateur
    $row = $result->fetch_assoc();
    $civilite = $row['Civilite'];
    $nom = $row['nom'];
$prenom = $row['prenom'];
$adresse = $row['adresse'];
$dateNaissance = $row['date_naiss'];
$lieuNaissance = $row['lieu_naiss'];
}

// Fermer la connexion à la base de données
$conn->close();}else{ 
    $civilite = "";
    $nom =  "";
$prenom = "";
$adresse = "";
$dateNaissance =  "";
$lieuNaissance = "";$conn->close();}
?>
		<form action="ajoutAntecedant.php" method="POST">
		<input type="hidden" name="idPatient" value="<?php echo $idPatient; ?>">
			<table id="formulaire">
				<tr>
					<td><label><strong>Civilité</strong></label></td>
					<td>
						<select name="Civilite_Usager" required>
							<option value="">Choisir une civilité</option>
							<option value="Mr" <?php if ($civilite === 'Monsieur') echo 'selected'; ?>>Monsieur</option>
                    		<option value="MMe" <?php if ($civilite === 'Madame') echo 'selected'; ?>>Madame</option>
                    		<option value="NR" <?php if ($civilite === 'Non renseigné') echo 'selected'; ?>>Non renseigné</option>
               			</select>
					</td>
				</tr>
				<tr>
					<td><label><strong>Nom</strong></label></td>
					<td><input type="text" placeholder="Nom du patient" name="Nom_Usager" value="<?php echo $nom; ?>" required></td>
				</tr>
				<tr>
					<td><label><strong>Prénom</strong></label></td>
					<td><input type="text" placeholder="Prénom du patient" name="Prenom_Usager" value="<?php echo $prenom; ?>" required></td>
				</tr>
				<tr>
					<td><label><strong>Adresse</strong></label></td>
					<td><input type="text" placeholder="Adresse du patient" name="Adresse_Usager" value="<?php echo $adresse; ?>" required></td>
				</tr>
				
				<tr>
					<td><label><strong>Date de naissance</strong></label></td>
					<td><input type="date" name="Date_Naissance_Usager" value="<?php echo $dateNaissance; ?>" required
						>
					</td>
				</tr>
				<tr>
					<td><label><strong>Lieu de naissance</strong></label></td>
					<td><input type="text" placeholder="Lieu de naissance du patient" name="Lieu_Naissance_Usager" value="<?php echo $lieuNaissance; ?>" required></td>
				</tr>
				<!--!
				<tr>
					<td>
						<label>
							<strong>Les antécedents médicaux </strong></label>
						</td>
						<td>
							<textarea type="antécédent" name="antecedents" placeholder="saisisé l'ensemble des antécédents du patient concerné ici...." required>

							</textarea></td>
						</tr> -->
						<tr>
    <td>
      <label><strong>Les antécédents médicaux</strong></label>
    </td>
    <td>
      <div id="antecedents-container">
        <div class="antecedent-row">
          <input type="text" name="antecedents[]" placeholder="Saisissez les antécédents du patient concerné ici..." required>
          <button type="button" class="delete-button deletebtn" onclick="supprimerAntecedent(this)">
            <i class="fas fa-trash-alt"></i>
          </button>
        </div>
      </div>
      <button type="button" onclick="ajouterAntecedent()">Ajouter un antécédent</button>
    </td>
  </tr>



					</table>
					<button onclick="window.location.href = '#';">envoyer</button>
				</form>
				<button onclick="window.location.href = '#';">Retour</button>


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
		function ajouterAntecedent() {
    var container = document.getElementById('antecedents-container');
    var antecedentRow = document.createElement('div');
    antecedentRow.className = 'antecedent-row';
    
    var input = document.createElement('input');
    input.type = 'text';
    input.name = 'antecedents[]';
    input.placeholder = "Saisissez les antécédents du patient concerné ici...";
    input.required = true;
    
    var deleteButton = document.createElement('button');
    deleteButton.type = 'button';
    deleteButton.className = 'delete-button';
    deleteButton.innerHTML = '<i class="fas fa-trash-alt"></i> Supprimer';
    deleteButton.onclick = function() {
      container.removeChild(antecedentRow);
    };
    
    antecedentRow.appendChild(input);
    antecedentRow.appendChild(deleteButton);
    container.appendChild(antecedentRow);
  }
  
  function supprimerAntecedent(button) {
    var antecedentRow = button.parentNode;
    var container = antecedentRow.parentNode;
    container.removeChild(antecedentRow);
  }
	</script>
</body>
</html>