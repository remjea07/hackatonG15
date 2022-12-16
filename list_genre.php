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
<label for="genre">Quel est votre genre de film préféré ?</label>
<br>
<select name="genre" id="genre" size="3" multiple>
<?php
    $req = $bdd->prepare("SELECT * FROM genres ORDER BY nom_genre");
	$req->execute();
	while ($res_genre = $req->fetch(PDO::FETCH_ASSOC)) {
		echo "<option>" . $res_genre["nom_genre"] . "</option>";
	}
?>
</select>

<br><br>

<label for="prod_c">Quel est votre maison de production favorite ?</label>
<select name="prod_c" id="prod_c">
<option>Tous</option>
<?php
    $req = $bdd->prepare("SELECT * FROM prod_compagnie");
	$req->execute();
	while ($res_prod_c = $req->fetch(PDO::FETCH_ASSOC)) {
		echo "<option>" . $res_prod_c["nom_prod_c"] . "</option>";
	}
?>
</select>

<br><br>

<label for="prod">Quel est votre producteur favori ?</label>
<select name="prod" id="prod">
<option>Tous</option>
<?php
    $req = $bdd->prepare("SELECT * FROM producteurs");
	$req->execute();
	while ($res_prod = $req->fetch(PDO::FETCH_ASSOC)) {
		echo "<option>" . $res_prod["nom_prod"] . "</option>";
	}
?>
</select>

<br><br>

<label for="name">Titre du film:</label>
<input type="text" name="film_titre">

<br><br>

<button type="submit">Rechercher</button>
</form>
</body>
</html>
<?php
$req->closeCursor();
?>