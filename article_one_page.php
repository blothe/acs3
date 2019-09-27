<?php
include('header.php');
include('function_connex_db.php');

$reponse = $db->query('SELECT * FROM article');
echo $reponse->fetch();
$donneesId = $donnees['ID'];
$donnees;
foreach ($donneesId as $value) {
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
  //}
//}

include('footer.php');
 ?>
