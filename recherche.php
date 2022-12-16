<head>
	<title>Recherche de films</title>
</head>
<?php
$genre1 = $_POST['genre1'];
$genre2 = $_POST['genre2'];
$genre3 = $_POST['genre3'];
$tag = $_POST['film_titre'];


ob_start();

$url = 'http://localhost:5000/'.$genre1;
if ($genre2 != "") {
	$url .= ",".$genre2;
}
if ($genre3 != "") {
	$url .= ",".$genre3;
}
if ($tag != "") {
	$url .= "/".$tag;
}
else {
	$url .= "/null";
}

while (ob_get_status()) 
{
    ob_end_clean();
}

header( "Location: $url" );
?>
