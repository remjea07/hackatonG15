<?php
require('config/db.php');

$sql = "SELECT * FROM genres";
$req = $bdd->prepare($sql);
$req->execute(array($code));
if($req) {
    while ($row = $req->fetch()):
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>List genre</title>
</head>
<body>

<label for="genre">Quel est votre genre de film préféré?</label>
<select name="genre" id="genre">
<?php
    $liste_genres = $bdd->prepare("SELECT * FROM genres");
	$liste_genres->execute();
	while ($res = $liste_genres->fetch(PDO::FETCH_ASSOC)) {
		echo "<option>" . $res["nom_genre"] . "</option>";
	}
?>
</select>

<br><br>

<label for="name">Titre du film:</label>
<input type="text" name="film_titre">

<br><br>

<button type="button">Rechercher</button>

</body>
</html>
<?php
$req->closeCursor();
}
?>