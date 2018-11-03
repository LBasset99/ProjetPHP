<?php
    // Partie principale

    // Inclusion du modèle
    include_once("../model/DAO.class.php");

    global $start;
    $start=$dao->getArticles();
    global $debut;
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
      $startCat = $dao->getAllArt($tri);
    } else{
      $startCat = $start->getFctCat($selectCat, $tri);
    }

// Article suivant
//  $nextRef = $dao->next(end($articles)->ref);

// Les articles précédents
//$prev = $dao->prevN($articles[0]->ref,12);


  // Charge la vue
  require_once('../view/design/header/header.php');
  require_once('../view/design/sidebar/sidebar.php');
  require_once('../view/design/footer/footer.php');
 ?>
