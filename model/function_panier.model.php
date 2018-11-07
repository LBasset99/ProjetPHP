<?php
// Création d'un panier
function creationPanier() {
  if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
    $_SESSION['panier']['idArticle'] = array();
    $_SESSION['panier']['qteArticle'] = array();
  }
  return true;
}

// Suppression d'un panier
function supprimerPanier() {
  if(isset($_SESSION['panier'])) {
    unset($_SESSION['panier']);
  }
}

// Ajout d'un article au panier
function ajouterArticle($idArticle, $qteProduit) {
  if(creationPanier()) {
    $position_produit = array_search($idArticle, $_SESSION['panier']['idArticle']);
    if ($position_produit !== false) {
      $_SESSION['panier']['qteArticle'][$position_produit] += $qteProduit;
    } else {
      array_push($_SESSION['panier']['idArticle'], $idArticle);
      array_push($_SESSION['panier']['qteArticle'], $qteProduit);
    }
  } else {
    echo 'Erreur, contactez un admin.';
  }
}

// Modifier la quantité d'un article dans le panier
function modifierQteArticle($idProduit, $qteProduit) {
  if (creationPanier()) {
    if ($qteProduit > 0) {
      $position_produit = array_search($_SESSION['panier']['idArticle'], $idArticle);
      if ($position_produit !== false) {
        $_SESSION['panier']['idArticle'][$position_produit] = $qteProduit;
      }
    } else {
      supprimerArticle($idArticle);
    }
  } else {
    echo 'Erreur, contactez un admin.';
  }
}

// Supprimer un article d'un panier
function supprimerArticle($idArticle) {
  if(creationPanier()) {
    $tmp = array();
    $tmp['idArticle'] = array();
    $tmp['qteArticle'] = array();

    for ($i = 0; $i < count($_SESSION['panier']['idArticle']); $i++) {
      if ($_SESSION['panier']['idArticle'][$i] !== $idArticle) {
        array_push($tmp['idArticle'], $_SESSION['panier']['idArticle'][$i]);
        array_push($tmp['qteArticle'], $_SESSION['panier']['qteArticle'][$i]);
      }
    }
    $_SESSION['panier'] = $tmp;
    unset($tmp);
  } else {
    echo 'Erreur, contactez un admin.';
  }
}

// Compter les articles d'un panier
function compterArticles() {
  if(isset($_SESSION['panier'])) {
    return count($_SESSION['panier']['idArticle']);
  } else {
    return 0;
  }
}


 ?>
