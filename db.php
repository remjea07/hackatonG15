<?php

const DB_HOST = "localhost";
const DB_PORT = "3306";
const DB_NAME = "tmbd_5000_movies";
const DB_USER = "root";
const DB_PWD = "";

static $bdd = null;

if ($bdd == null) {
  $dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';charset=utf8';
  $bdd = new PDO($dsn, DB_USER, DB_PWD);

  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
?>