<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="../view/articles.view.css" type="text/css" rel="stylesheet" />

    <title></title>
  </head>
  <body class="corps">
    <?php
      include_once('../controler/afficherArticles.ctrl.php');
      $dao->afficherArt($catAffiche);
     ?>
  </body>
</html>
