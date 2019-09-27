<?php  ?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style_admin_article.css" type="text/css">
  </head>
<body>
<?php include('function_connex_db.php'); ?>





<?php



// if (isset($_REQUEST['auteur']) AND isset($_REQUEST['titre'])) {
//
//   $author_article = $_REQUEST['auteur'];
//   $title_article = $_REQUEST['titre'];
//   $sql = "INSERT INTO article (article_title, article_author)
//           VALUES ('$title_article', '$author_article')";
//      // use exec() because no results are returned
//   $db->exec($sql);
// }
$reponse = $db->query('SELECT * FROM article');

// $longueurDonnees = count($donnees);
// echo "$longueurDonnees";
?>
<!-- <div class="container row box-primary"> -->

<div class="navbar">
  <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Home</a>
  <a href="#"><i class="fa fa-fw fa-search"></i> Search</a>
  <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a>
  <a href="#"><i class="fa fa-fw fa-user"></i> Login</a>
</div>
  <div class="container col-8">
    <div class="row">
      <?php
      $count=0;
      while ($donnees = $reponse->fetch())
      {
        $count++
        ?>

        <div class="card">
          <img class="card-img-top" src="<?php echo $donnees['article_pic']; ?>" alt="">
          <div class="card-header">
            <h1 class="text-center titre"><?php echo $donnees['article_title']; ?></h1>
          </div>
          <div class="card-body collapse" id="resumer<?php echo $count ?>">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </div>
          <div class="card-footer">
            <p>Ecrit par <a href="jerem2.php"><?php echo $donnees['article_author']; ?></a>. Le <?php echo $donnees['article_datetime']; ?></p>
          </div>
          <div class="d-flex justify-content-between group-but">
            <button type="button" class="but"><a href="jerem2.php?id=<?php echo $donnees['ID']; ?>">Modifier</a></button>
            <a id="but-arrow" data-toggle="collapse" data-target="#resumer<?php echo $count ?>">🢗</a>
          </div>

        </div>

        <?php

      }
      ?>
    </div>
  </div>
</div>
</body>
<?php
$reponse->closeCursor(); // Termine le traitement de la requête

?>
<?php include('footer.php'); ?>
</html>
