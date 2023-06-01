<?php 
try {
	$toc=new PDO("mysql:host=localhost;dbname=toctoc;charset=utf8;","root","");
	echo "Connexion a la base de donnee faite avec succes";

	
} catch (Exception $e) {
	// pour savoir ou est l'erreur on concatene avec .$e->getMessage());
	die("Echec de connexion a la base de donnee".$e->getMessage());

	
}
?>