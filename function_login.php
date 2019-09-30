<?php
session_start();
// pour la page de traitement login :
// 1)créer une session avec la fonction session_start().
// 2)je vérifie mes champs
// 3)penser à utiliser des cookies
if ($_POST['username'] == 'admin' AND $_POST['password'] == 'admin')
{
  $usernameAdmin = htmlspecialchars($_POST['username']);
  $passwordAdmin = htmlspecialchars($_POST['password']);
}
else
{
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
}


include('function_connex_db.php');

if (!empty($usernameAdmin) AND !empty($passwordAdmin))
{
  header('location: admin_article.php');
  exit();
}
else
{
  // je prépare ma demande sql et je passe a WHERE les ? car je dois mettre des variables php.
  $req = $db->prepare('SELECT*FROM users WHERE name = ? AND password = ?');
  // j'execute ma requète en plaçant mes variable a inserer dans l'ordre a la place des ? dans un array.
  $req->execute(array($username, $password));
  // je vais enregistré dans une variable le resultat de la requète
  $userreq = $req->rowcount();
}


if ($userreq == 1) {
  header("location: index.php");
}
else
{
  echo '<h1 style="color: red;">Vous n\'avez pas de compte !</h1>';
}
