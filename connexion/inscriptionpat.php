<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Récupérer les valeurs du formulaire
	$civilite = $_POST["Civilite_Usager"];
	$nom = $_POST["Nom_Usager"];
	$prenom = $_POST["Prenom_Usager"];
	$adresse = $_POST["Adresse_Usager"];
	$dateNaissance = $_POST["Date_Naissance_Usager"];
	$lieuNaissance = $_POST["Lieu_Naissance_Usager"];
	$username = $_POST["Username"];
	$password = $_POST["Password"];
    if ($civilite == "Mr") {
        $civiliteComplete = "Monsieur";
    } elseif ($civilite == "MMe") {
        $civiliteComplete = "Madame";
    } else {
        $civiliteComplete = "Non renseigné"; // Gérer le cas où la civilité n'est pas sélectionnée ou inconnue
    }

	// Valider les données (vous pouvez ajouter des validations supplémentaires selon vos besoins)
	$isValid = true;

	// Vérifier si l'utilisateur a accepté les termes de l'accord
	

	// Vérifier si l'âge de l'utilisateur est supérieur ou égal à 18 ans
	$now = new DateTime();
	$dateNaissance = new DateTime($dateNaissance);
	$age = $now->diff($dateNaissance)->y;

	if ($age < 18) {
		$isValid = false;
		echo "L'inscription est réservée aux personnes majeures.";
	}

	// Si les données sont valides, faire le traitement de l'inscription
	if ($isValid) {
		// Appeler la fonction d'inscription et récupérer les erreurs
		$erreur = inscriptionUtilisateur($civiliteComplete, $nom, $prenom, $adresse, $dateNaissance, $lieuNaissance, $username, $password);

		if ($erreur === "") {
			// Réinitialiser les valeurs des champs du formulaire si nécessaire
			$civilite = "";
			$nom = "";
			$prenom = "";
			$adresse = "";
			$dateNaissance = "";
			$lieuNaissance = "";
			$username = "";
			$password = "";
            header("Location: ./conxInsPat.php");
		} else {
			echo $erreur;
		}
	}
}

function inscriptionUtilisateur($civilite, $nom, $prenom, $adresse, $dateNaissance, $lieuNaissance, $username, $password) {
	// Connexion à la base de données
	$servername = "localhost";
	$dbname = "totoc";
	$usernamee = "root";
	$passwordd = "";

	$conn = new mysqli($servername, $usernamee, $passwordd, $dbname);

	// Vérifier si la connexion a échoué
	if ($conn->connect_error) {
		return "Erreur de connexion à la base de données : " . $conn->connect_error;
	}

	// Préparer les données pour l'insertion
	$civilite = $conn->real_escape_string($civilite);
	$nom = $conn->real_escape_string($nom);
	$prenom = $conn->real_escape_string($prenom);
	$adresse = $conn->real_escape_string($adresse);
    $dateNaissanceFormatted = $dateNaissance->format('Y-m-d');
$dateNaissance = $conn->real_escape_string($dateNaissanceFormatted);

	$lieuNaissance = $conn->real_escape_string($lieuNaissance);
	$username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);
    // Préparer la requête d'insertion
$sql = "INSERT INTO user (Civilite, nom, prenom, adresse, date_naiss, lieu_naiss, username, password,type)
VALUES ('$civilite', '$nom', '$prenom', '$adresse', '$dateNaissance', '$lieuNaissance', '$username', '$password','Patient')";

// Exécuter la requête d'insertion
if ($conn->query($sql) === TRUE) {
// Fermer la connexion à la base de données
$conn->close();
return ""; // Retourner une chaîne vide si l'inscription est réussie
} else {
$erreur = "Erreur lors de l'inscription : " . $conn->error;
// Fermer la connexion à la base de données
$conn->close();
return $erreur; // Retourner l'erreur si l'inscription a échoué
}
}
?>