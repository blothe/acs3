<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=mcs_sbj;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  echo "Connexion";
}
catch (Exception $e)
{
      $message = die('Erreur : ' . $e->getMessage());
      echo "$message";
}

$reponse = $bdd->query('SELECT * FROM article');
$donnees = $reponse->fetch();

foreach ($donnees as $value) {
  if ($value == $_GET['id']) {
    ?>

    <div class="container justify-content-center">
      <div class="col-8">
        <h1><?php echo $donnees['article_title']; ?></h1>
        <p><?php echo $donnees['article_content']; ?></p>
        <p>Ecrit par <?php echo $donnees['article_author']; ?>. Le <?php echo $donnees['article_datetime']; ?></p>
      </div>

    </div>

    <?php
  }
}

 ?>
