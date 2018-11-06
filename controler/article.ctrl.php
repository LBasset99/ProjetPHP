<?php
include_once('../model/DAO.class.php');

if (isset($_GET["art"])) {
  $unArt = $dao->getUnArt($_GET["art"]);
} else {
  print('ERREUR : Contactez un administrateur');
}

require_once('../view/design/header/header.php');
require_once('../view/articles.view.php');
require_once('../view/design/footer/footer.php');
 ?>
