<?php // ouverture de session (pour mémoriser le pseudo *)
session_start();
?>

<?php include("header.php"); ?>

<section class="admin_article_new">
  <?php
  // suite soumission du formulaire
  if (isset($_POST['submit']))
  {
    // vérification du nom de l'auteur (OK si renseigné et non nul)
    if (!isset($_POST['auteur']) OR $_POST['auteur'] == "")
    {
      exit("<h1>OUPS !</h1>
      <div id=\"erreur\">
      <p>Erreur : veuillez renseigner le nom de l'auteur.</p>
      <a href=\"article_new_post.php\"><p>Recommencer ?</p></a>
      </div>
      </section>");
    }
    // vérification titre de l'article (OK si renseigné et non nul)
    if (!isset($_POST['titre']) OR $_POST['titre'] == "")
    {
      exit("<h1>OUPS !</h1>
      <div id=\"erreur\">
      <p>Erreur : veuillez renseigner le titre de l'article.</p>
      <a href=\"article_new_post.php\"><p>Recommencer ?</p></a>
      </div>
      </section>");
    }
    // vérification texte de l'article (OK si renseigné et non nul)
    if (!isset($_POST['texte']) OR $_POST['texte'] == "")
    {
      exit("<h1>OUPS !</h1>
      <div id=\"erreur\">
      <p>Erreur : veuillez renseigner le texte de l'article.</p>
      <a href=\"article_new_post.php\"><p>Recommencer ?</p></a>
      </div>
      </section>");
    }
    // vérification de l'image d'illustration : plusieurs étapes...
    $content_dir = 'uploads/'; // ... dossier pour l'enregistrement
    /* ... vérification de l'upload
    >> OK si fichier temporaire a bien été transmis */
    $tmp_file = $_FILES['illustration']['tmp_name'];
    if (!is_uploaded_file($tmp_file))
    {
      exit("<h1>OUPS !</h1>
      <div id=\"erreur\">
      <p>Erreur : illustration requise.</p>
      <a href=\"article_new_post.php\"><p>Recommencer ?</p></a>
      </div>
      </section>");
    }
    /* ... vérification de l'extension
    >> OK si fichier est bien de type image reconnu */
    $type_file = $_FILES['illustration']['type'];
    if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') && !strstr($type_file, 'png') )
    {
      exit("<h1>OUPS !</h1>
      <div id=\"erreur\">
      <p>Erreur : le fichier chargé doit être une image (formats acceptés : JPG, JPEG, BMP, GIF, PNG).</p>
      <a href=\"article_new_post.php\"><p>Recommencer ?</p></a>
      </div>
      </section>");
    }
    /* ... vérification de l'enregistrement
    >> OK si fichier déplacé >> dossier destination */
    $name_file = $_FILES['illustration']['name'];
    if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
    {
      exit("<h1>OUPS !</h1>
      <div id=\"erreur\">
      <p>Erreur : impossible de copier le fichier dans $content_dir</p>
      <a href=\"article_new_post.php\"><p>Recommencer ?</p></a>
      </div>
      </section>");
    }
    // si tous les tests sont OK >> validation données
    $article_author = htmlspecialchars($_POST['auteur']);
    $article_title = htmlspecialchars($_POST['titre']);
    $article_pic = htmlspecialchars($content_dir . $name_file);
    $article_content = htmlspecialchars($_POST['texte']);
    // identification bdd
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mcs_sbj";
    // connexion à la bdd + enregistrement des données
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = "INSERT INTO article (article_author, article_title, article_datetime, article_pic, article_content)
      VALUES (\"$article_author\", \"$article_title\", NOW(), \"$article_pic\", \"$article_content\")";
      $conn->exec($stmt);
      echo "<h1>ARTICLE ENREGISTRÉ</h1>
      <div id=\"enregistrement\">
      <p>Vous pouvez à présent consulter votre publication.</p>
      <a href=\"index.php\"><p>Retour au menu principal ?</p></a>
      </div>";
    }
    catch(PDOException $e)
    {
      echo $stmt . "<br>" . $e->getMessage();
    }
    $conn = null;
  }
  ?>
</section>

<?php include("footer.php"); ?>
