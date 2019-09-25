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
// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table jeux_video
?>
<form method="post">
  <h2>Créer un nouvel Article test</h2>
  <p>Titre Article: <input type="text" name="titre" value="titre" /></p>
  <p>Auteur: <input type="text" name="auteur" value="auteur" /></p>
  <button type="submit">Submit</button>
</form>
<?php


if (isset($_REQUEST['auteur']) AND isset($_REQUEST['titre'])) {

  $author_article = $_REQUEST['auteur'];
  $title_article = $_REQUEST['titre'];
  $sql = "INSERT INTO article (article_title, article_author)
          VALUES ('$title_article', '$author_article')";
     // use exec() because no results are returned
  $bdd->exec($sql);
}
$reponse = $bdd->query('SELECT * FROM article');

// $longueurDonnees = count($donnees);
// echo "$longueurDonnees";

while ($donnees = $reponse->fetch())
{
?>
<div class="container">
  <div class="row">
    <div class="card">

      <img src="<?php echo$donnees['article_pic']; ?>" alt="">
      <h2><?php echo $donnees['article_title']; ?></h2>
      <p>Ecrit par <a href="jerem2.php?id=<?php echo $donnees['ID'] ?>&amp;title=<?php echo $donnees['article_title'] ?>"><?php echo $donnees['article_author']; ?></a>. Le <?php echo $donnees['article_datetime']; ?></p>

    </div>
  </div>
</div>
<?php

}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
