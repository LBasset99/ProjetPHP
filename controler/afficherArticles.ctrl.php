<?php
    // Partie principale

    // Inclusion du modèle
    include_once("../model/DAO.class.php");



    $start=$dao->getAllArt();

// Article suivant
//  $nextRef = $dao->next(end($articles)->ref);

// Les articles précédents
//$prev = $dao->prevN($articles[0]->ref,12);


  // Charge la vue
  require_once('../view/design/header/header.php');
  require_once('../view/design/sidebar/sidebar.php');
  require_once('../view/design/footer/footer.php');
 ?>
