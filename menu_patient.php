php<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Interface Medcin</title>
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="menu_patient.css" />

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

// Fermer la connexion à la base de données
$conn->close();
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
						<li><a href="menu_acceuil.php" class="active">
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
				<div id="grande_boite">
					<h1>Liste des patients</h1>

					<form action="rechercher_usager.php" method="POST">
						<table id="recherche">
							<tr >
								<td ><p><strong>Recherche rapide :</strong></p></td>
								<td><input type="search" placeholder="Élément à rechercher" name="Recherche"></td>
								<td><p><strong>dans</strong></p></td>
								<td>
									<select name="Colonne">
										<option value="">Choisir une colonne</option>
										<option value="Civilite_Usager">Civilité</option>
										<option value="Nom_Usager">Nom</option>
										<option value="Prenom_Usager">Prénom</option>
										<option value="Adresse_Usager">Adresse</option>
										<option value="Date_Naissance_Usager" >Date de Naissance</option>
										<option value="Lieu_Naissance_Usager">Lieu de naissance</option>

									</select>
								</td>
							</tr>
						</table>		
					</form>
				

					<table id="tableau" >
						<tr>
							<th scope="col">Civilité</th>
							<th scope="col">Nom</th>
							<th scope="col">Prénom</th>
							<th scope="col">Adresse</th>
							<th scope="col">Date de Naissance</th>
							<th scope="col">Lieu de naissance</th>
							<th scope="col">Antecedant</th>
							<th scope="col">Ordonnance</th>
				<!--<th scope="col">Medecin traitant</th>
					<th scope="col">Antécédents médicaux</th>-->
				</tr>
				<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "totoc";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

$sql = "SELECT * FROM user WHERE type = 'patient'";
$stmt = $conn->query($sql);
$patients = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($patients as $patient) {
    echo "<tr>";
    echo "<td>" . $patient['Civilite'] . "</td>";
    echo "<td>" . $patient['nom'] . "</td>";
    echo "<td>" . $patient['prenom'] . "</td>";
    echo "<td>" . $patient['adresse'] . "</td>";
    echo "<td>" . $patient['date_naiss'] . "</td>";
    echo "<td>" . $patient['lieu_naiss'] . "</td>";
	echo "<td><a href=\"menu_antecedent.php?id=" . $patient['id'] . "\"><button style=\"background: #0049f2;padding: 0.2em 0.5em; font-size: 1em; color:white;border-radius: 30px;\" >Ajouter Antecedent</button></a>
	<a href=\"afficheantecedentmed.php?id=" . $patient['id'] . "\"><button style=\"margin-top:7px; background: #6fcca4;padding: 0.2em 0.5em; font-size: 1em; color:white;border-radius: 30px;\" >Afficher Antecedent</button></a></td>";
	echo "<td><a href=\"menu_ordonnace.php?id=" . $patient['id'] . "\"><button style=\"background: #0049f2; padding: 0.2em 0.5em; font-size: 1em;border-radius: 30px;\">Prescrire Ordonnance</button></a>
	<a href=\"afficheordenancemed.php?id=" . $patient['id'] . "\"><button style=\"margin-top:7px;padding: 0.2em 0.5em; font-size: 1em; background: #6fcca4; border-radius: 30px; color:white;\" >Afficher Ordennance</button></a></td>";

    echo "</tr>";
}



?>

			</table>
			<table id="recherche">
				<tr>
					<td><button id="chercher" onclick="window.location.href = '#';">Chercher</button></td>
					<td><button id="ajouter" onclick="window.location.href = 'addpatient.php';">Ajouter</button></td>
				</tr>
			</table>		
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