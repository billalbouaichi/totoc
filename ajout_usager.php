<?php


// Récupérer les valeurs des champs du formulaire
$civilite = $_POST['Civilite_Usager'];
$nom = $_POST['Nom_Usager'];
$prenom = $_POST['Prenom_Usager'];
$adresse = $_POST['Adresse_Usager'];
$dateNaissance = $_POST['Date_Naissance_Usager'];
$lieuNaissance = $_POST['Lieu_Naissance_Usager'];

// Définir la valeur correspondante pour la civilité
if ($civilite == "Mr") {
    $civiliteComplete = "Monsieur";
} elseif ($civilite == "MMe") {
    $civiliteComplete = "Madame";
} else {
    $civiliteComplete = "Non renseigné"; // Gérer le cas où la civilité n'est pas sélectionnée ou inconnue
}
// Générer le nom d'utilisateur
$usernam = strtolower($nom) . strtolower($prenom);

// Générer le mot de passe
$passwor = strtolower($nom) . str_replace('-', '', $dateNaissance);

// Connexion à la base de données (assurez-vous d'utiliser les bonnes informations de connexion)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "totoc";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Insérer le nouvel utilisateur dans la table "user"
    $stmt = $conn->prepare("INSERT INTO user (Civilite, nom, prenom, adresse, date_naiss,lieu_naiss,username,password, type) VALUES (:civilite, :nom, :prenom, :adresse, :dateNaissance, :lieuNaissance,:username, :password, 'Patient')");
    $stmt->bindParam(':civilite', $civiliteComplete);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->bindParam(':dateNaissance', $dateNaissance);
    $stmt->bindParam(':lieuNaissance', $lieuNaissance);
    $stmt->bindParam(':username', $usernam);
    $stmt->bindParam(':password', $passwor);
    $stmt->execute();

    // Redirection vers une page de confirmation ou une autre action souhaitée
    header("Location: menu_patient.php");
    exit();
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>


