<?php
session_start();
include('header.php');
include('function_connex_db.php');

$req = $db->prepare('SELECT * FROM article WHERE ID = ?');
$req->execute(array($_GET['id']));
$donnees = $req->fetch();
    ?>

    <div class="container justify-content-center">
      <div class="col-10">
        <h1 class = "jumbotron text-center" style = "font-size: 3rem;"><?php echo $donnees['article_title']; ?></h1>
        <p class = "jumbotron" style = "font-size: 1rem;"><?php echo $donnees['article_content']; ?></p>
        <p class = "jumbotron"><em>Ecrit par:</em> <?php echo $donnees['article_author']; ?><br><em>Le</em> <?php echo $donnees['article_datetime']; ?></p>
      </div>

    </div>

    <?php
  //}
//}

include('footer.php');
 ?>
