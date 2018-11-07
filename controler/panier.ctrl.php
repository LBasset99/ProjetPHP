<?php
include_once('../model/function_panier.model.php');
include_once('../model/DAO.class.php');

include_once('../view/design/header/header.php');
include_once('../view/panier.view.php');
include_once('../view/design/footer/footer.php');
///////// VOIR POUR LES MVC CA MARCHE AP ON VERRA GROS



$cree = creationPanier();

if (isset($_GET['deletePanier']) && $GET['deletePanier'] == true) {
  supprimerPanier();
}

$action = (isset);
switch ($action) {
  case 'ajouter':
    ajouterArticle($l,$q,$p);
    break;

  case 'suppression':
    supprimerArticle($l);
    break;

  case 'refresh':
    for ($i=0; $i < count($qteArticle); $i++) {
      ModifierQteArticle($_SESSION['panier']['libelleProduit'][$i], $qteArticle)
    }
    break;

  case 'ajouter':
    // code...
    break;
}

 ?>
