<?php

// Informations de connexion à la base de données
$serveur = "localhost";
$utilisateurs = "root";
$mdp = "";
$bdd = "totoc";

// Récupération des données du formulaire
$utilisateur = $_POST['utilisateur'];
$motdepasse = $_POST['motdepasse'];

// Connexion à la base de données
$connexion = mysqli_connect($serveur, $utilisateurs, $mdp, $bdd);

// Vérification de la connexion
if (!$connexion) {
    die("La connexion a échoué: " . mysqli_connect_error());
}

// Requête SQL pour vérifier les informations de connexion
$sql = "SELECT * FROM user WHERE username='$utilisateur' AND password='$motdepasse'";
$resultat = mysqli_query($connexion, $sql);

// Vérification du résultat de la requête
if (mysqli_num_rows($resultat) == 1) {
    // L'utilisateur est connecté
    $row = mysqli_fetch_assoc($resultat);
    $id_utilisateur = $row['id'];
    $typeofuser = $row['type'];
    session_start();
    // Stockage de l'ID de l'utilisateur dans une session
    $_SESSION['id'] = $id_utilisateur;
if($typeofuser =='Medecin'){
    header("Location: ../menu_patient.php");
}else if($typeofuser =='Patient'){
    header("Location: ../pat.php");
}

    
    exit;
} else {
    // Les informations de connexion sont incorrectes
    echo "Nom d'utilisateur ou mot de passe incorrect";
}

// Fermeture de la connexion à la base de données
mysqli_close($connexion);
?>
