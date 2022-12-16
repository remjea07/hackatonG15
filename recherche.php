<head>
	<title>Recherche de films</title>
</head>
<?php
$genres = $_POST['genre'];
ob_start();

$url = 'http://localhost:5000/'.$genres;

while (ob_get_status()) 
{
    ob_end_clean();
}

header( "Location: $url" );
?>
