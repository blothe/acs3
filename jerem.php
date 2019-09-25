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

$sql = "INSERT INTO article (article_title, article_author)
        VALUES ('Article Test', 'John Doe')";
$bdd->exec($sql);
$reponse = $bdd->query('SELECT * FROM article');
while ($donnees = $reponse->fetch())
{
?>
    <div class="card">

      <img src="<?php echo$donnees['article_pic']; ?>" alt="">
      <h2><?php echo $donnees['article_title']; ?></h2>
      <p>Ecrit par <a href="#"><?php echo $donnees['article_author']; ?></a>. Le <?php echo $donnees['article_datetime']; ?></p>

    </div>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
?>
