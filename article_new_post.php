<?php // ouverture de session (pour mémoriser le pseudo *)
session_start();
?>

<?php include("header.php"); ?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Admin</title>
</head>
<body>
  <h1>Nouvel article :</h1>
  <form method="post" action="article_new_save.php" enctype="multipart/form-data">
    <!-- auteur -->
    <label for="auteur"><p><strong>Auteur :</strong></p></label>
    <p><input type="text" name="auteur" id="auteur" value="<?php echo isset($_SESSION['auteur']) ? htmlspecialchars($_SESSION['auteur']) : '' ?>"></p><!-- pré-remplissage du pseudo déjà saisi (le cas échéant) ici à l'aide d'une structure ternaire -->
    <!-- titre -->
    <label for="titre"><p><strong>Titre :</strong></p></label>
    <p><input type="text" name="titre" id="titre"></p>
    <!-- illustration -->
    <label for="illustration"><p><strong>Illustration :</strong></p></label>
    <input type="hidden" name="MAX_FILE_SIZE" value="100000000" /><!-- taille fichier max -->
    <p><input type="file" name="illustration" id="illustration"></p>
    <!-- contenu -->
    <label for="texte"><p><strong>Texte :</strong></p></label>
    <p><textarea name="texte" id="texte" rows="10" cols="100"></textarea></p>
    <!-- publication -->
    <p><input type="submit" name="submit" value="Publier" onclick="location.href='index.php'"></p>
  </form>
</body>
</html>

<?php include("footer.php"); ?>
