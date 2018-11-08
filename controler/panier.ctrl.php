<?php
include_once('../model/DAO.class.php');
include_once('../model/function_panier.model.php');
session_start();
creationPanier();

if (isset($_GET['deletePanier']) && $_GET['deletePanier'] == true) {
  supprimerPanier();
}

$action = (isset($_POST['action']) ? $_POST['action'] : (isset($_GET['action']) ? $_GET['action'] : null));

if($action !== null) {
    $l = (isset($_POST['l']) ? $_POST['l'] : (isset($_GET['l']) ? $_GET['l'] : null)); // id
    $q = (isset($_POST['q']) ? $_POST['q'] : (isset($_GET['q']) ? $_GET['q'] : null)); // quantité
    $qte = (isset($_POST['quantity']) ? $_POST['quantity'] : (isset($_GET['quantity']) ? $_GET['quantity'] : null)); // quantité

    // Quantité d'articles
    if (is_array($qte)) {
      $qteArticle = array();
      $i = 0;
      foreach ($qte as $value) {
        $qteArticle[$i++] = $value;
      }
    }
}

switch ($action) {
  case 'ajout':
    ajouterArticle($l,$q);
    break;

  case 'suppression':
    supprimerArticle($l);
    break;

  case 'refresh':
    for ($i = 0; $i < count($qteArticle); $i++) {
      modifierQteArticle($_SESSION['panier']['idArticle'][$i], $qteArticle[$i]);
    }
    break;
}

// vecteur d'objets de la classe Article
$articles = array();
if (isset($_SESSION['panier']['idArticle'])) {
  for ($i = 0; $i < count($_SESSION['panier']['idArticle']); $i++) {
    array_push($articles, $dao->getUnArt($_SESSION['panier']['idArticle'][$i]));
  }
}


include_once('../view/design/header/header.php');
include_once('../view/panier.view.php');
include_once('../view/design/footer/footer.php');
 ?>
