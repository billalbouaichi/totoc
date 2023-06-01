<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Interface Medcin</title>
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="menu_acceuil.css" />

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
						<li><a href="menu_acceuil.php" class="active">
							<span class="icon"><i class="fas fa-home"></i></span>
							<span class="text">Accueil</span>
						</a></li>
						<li><a href="menu_patient.php">
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
			<div class="main_container">

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