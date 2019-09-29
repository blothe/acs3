<?php

// identification bdd
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mcs_sbj";
// connexion à la bdd + récupération des données
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->query("SELECT `ID`, `article_pic` AS `illustration`, `article_title` AS `titre`, `article_author` AS `auteur`, DATE_FORMAT(`article_datetime`, 'le %d/%m/%Y à %Hh%i') AS `publication` FROM `article` ORDER BY `ID` DESC LIMIT 10");
  while ($result = $stmt->fetch()) {

    ?>

    <li onclick="location.href='article_one_page.php?id=<?php echo $result['ID']; ?>';" style="width: 240.4px; float: left; display: block;">
      <img src="<?php echo $result['illustration'] ?>">
      <div class="caption-info">
        <div class="caption-info-head">
          <div class="caption-info-head-left">
            <h4><a href="#">Publié par <?php echo $result['auteur'] ?></a></h4>
            <span><?php echo $result['publication'] ?></span>
          </div>
          <div class="caption-info-head-right">
            <span> </span>
          </div>
          <div class="clear"> </div>
        </div>
      </div>
    </li>

    <?php

  }
}
catch(PDOException $e)
{
  echo "Oups ! Échec de la connexion à la base de données :/" . $e->getMessage();
}
$conn = null;

?>
