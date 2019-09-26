<?php
session_start();
// pour la page de traitement login :
// 1)créer une session avec la fonction session_start().
// 2)je vérifie mes champs
// 3)penser à utiliser des cookies

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

try {
  $db = new PDO('mysql:host=localhost;dbname=mcs_sbj;charset=utf8', 'root', '');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $req = $db->prepare('SELECT*FROM users WHERE name = ?')
} catch (PDOException $e) {

}
