<?php
// Récupérer les données du formulaire
$idPatient = $_POST['idPatient'];
//$antecedents = $_POST['antecedents'];
$antecedentsArray = $_POST['antecedents'];
$antecedents = implode(', ', $antecedentsArray);
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "totoc";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Récupérer et concaténer les antécédents
$antecedentsArray = $_POST['antecedents'];
$antecedents = implode(', ', $antecedentsArray);

    // Insérer les antécédents dans la base de données
    //$stmt = $conn->prepare("INSERT INTO antecedent(iduser, antecedent) VALUES (:idPatient, :antecedents)");
    $stmt = $conn->prepare("INSERT INTO antecedent (iduser, antecedent, date_ajout) VALUES (:idPatient, :antecedents, NOW())");
    $stmt->bindParam(':idPatient', $idPatient);
    $stmt->bindParam(':antecedents', $antecedents);
    $stmt->execute();
    header("Location: ./menu_patient.php");
    
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
