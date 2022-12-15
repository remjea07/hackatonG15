<head>
	<title>Recherche de films</title>
</head>
<?php require "db.php";
include "main.py";

try {
	$genre = $_POST['genre'];
	$test = shell_exec("python3 main.py Action Drama Party");
	echo $test;
}
//Affichage de l'erreur s'il y en a une
catch(PDOException $e) {
	$message = "Échec de la connexion : " . $e->getMessage();
	echo $message;
}
$bdd = null;
?>
