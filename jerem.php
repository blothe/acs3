<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
  echo "Connexion réussi";
}
catch (Exception $e)
{
      $message = die('Erreur : ' . $e->getMessage());
      echo "$message";
}
?>
