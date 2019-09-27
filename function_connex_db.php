<?php
try
{
	$db = new PDO('mysql:host=localhost;dbname=mcs_sbj;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
      $message = die('Erreur : ' . $e->getMessage());
      echo "$message";
}
// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table jeux_video
?>
