<?php
// Récupérer les données du formulaire
$idPatient = $_POST['idPatient'];
//$antecedents = $_POST['antecedents'];
$ordonnanceArray = $_POST['UsageMe'];
$Ordannance = implode(', ', $ordonnanceArray);
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "totoc";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Récupérer et concaténer les antécédents
$ordonnanceArray = $_POST['UsageMe'];
$Ordannance = implode(', ', $ordonnanceArray);

    // Insérer les antécédents dans la base de données
    //$stmt = $conn->prepare("INSERT INTO antecedent(iduser, antecedent) VALUES (:idPatient, :antecedents)");
    $stmt = $conn->prepare("INSERT INTO ordonnances (iduser, ordonnance, date_ajout) VALUES (:idPatient, :ordonnance, NOW())");
    $stmt->bindParam(':idPatient', $idPatient);
    $stmt->bindParam(':ordonnance', $Ordannance);
    $stmt->execute();
    header("Location: ./menu_patient.php");
    
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>