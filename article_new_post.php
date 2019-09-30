<?php // ouverture de session (pour mémoriser le pseudo *)
session_start();
?>

<?php include("header.php"); ?>

<section class="admin_article_new">
  <h1>RÉDACTION D'UN NOUVEL ARTICLE</h1>
  <form method="post" action="article_new_save.php" enctype="multipart/form-data">
    <div id="meta">
      <div id="auteur">
        <label for="auteur"><p><strong>Auteur :</strong></p></label>
        <p><input type="text" name="auteur" value="<?php echo isset($_SESSION['auteur']) ? htmlspecialchars($_SESSION['auteur']) : '' ?>"></p><!-- pré-remplissage du pseudo déjà saisi (le cas échéant) ici à l'aide d'une structure ternaire -->
      </div>
      <div id="titre">
        <label for="titre"><p><strong>Titre :</strong></p></label>
        <p><input type="text" name="titre"></p>
      </div>
      <div id="illustration">
        <label for="illustration"><p><strong>Illustration :</strong></p></label>
        <input type="hidden" name="MAX_FILE_SIZE" value="100000000" /><!-- taille fichier max -->
        <p><input type="file" name="illustration"></p>
      </div>
    </div>
    <div id="main">
      <div id="texte">
        <label for="texte"><p><strong>Texte :</strong></p></label>
        <p><textarea name="texte" rows="10" cols="100"></textarea></p>
      </div>
      <div id="publication">
        <p><input type="submit" name="submit" value="Publier" onclick="location.href='index.php'"></p>
      </div>
    </div>
  </form>
</section>

<?php include("footer.php"); ?>
