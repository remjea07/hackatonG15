<?php
require('db.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>List genre</title>
</head>
<body>
<form action="recherche.php" method="post">
<label for="genre1">Quel est votre genre de film préféré ?</label>
<select name="genre1" id="genre1">
<?php
    $req = $bdd->prepare("SELECT * FROM genres ORDER BY nom_genre");
	$req->execute();
	while ($res_genre = $req->fetch(PDO::FETCH_ASSOC)) {
		echo "<option>" . $res_genre["nom_genre"] . "</option>";
	}
?>
</select>
<select name="genre2" id="genre2">
<option></option>
<?php
	$req->execute();
	while ($res_genre = $req->fetch(PDO::FETCH_ASSOC)) {
		echo "<option>" . $res_genre["nom_genre"] . "</option>";
	}
?>
</select>
<select name="genre3" id="genre3">
<option></option>
<?php
	$req->execute();
	while ($res_genre = $req->fetch(PDO::FETCH_ASSOC)) {
		echo "<option>" . $res_genre["nom_genre"] . "</option>";
	}
?>
</select>

<br><br>

<label for="name">Titre / Mot-clé :</label>
<input type="text" name="film_titre">

<br><br>

<button type="submit">Rechercher</button>
</form>
</body>
</html>
<?php
$req->closeCursor();
?>