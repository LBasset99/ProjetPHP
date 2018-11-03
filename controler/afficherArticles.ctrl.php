<?php
    // Partie principale

    // Inclusion du modèle
    include_once("../model/DAO.class.php");

    $start=$dao->getArticles();
    $debut=$dao->getAllCat();

    if (isset($_GET["catChoisie"])) {
      $selectCat = $_GET["catChoisie"];
    } else {
      $selectCat="tout";
    }

    if (isset($_GET["trie"])) {
      $tri = $_GET["trie"];
    } else {
      $tri = "prixDecroissant";
    }

    if($selectCat=="tout"){
      $affiches = $dao->getArticles($tri);
    } else{
      $affiches = $start->getFctCat($selectCat, $tri);
    }


  // Charge la vue
  require_once('../view/design/header/header.php');
  require_once('../view/design/sidebar/sidebar.php');
  require_once('../view/design/footer/footer.php');
 ?>
