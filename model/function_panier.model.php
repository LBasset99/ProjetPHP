<?php

// Création d'un panier
function creationPanier() {
  if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
    $_SESSION['panier']['idArticle'] = array();
    $_SESSION['panier']['qteArticle'] = array();
  }
}

// Suppression d'un panier
function supprimerPanier() {
  if(isset($_SESSION['panier'])) {
    unset($_SESSION['panier']);
  }
}

// Ajout d'un article au panier
function ajouterArticle($idProduit, $qteArticle) {
  if(creationPanier()) {
    $position_produit = array_search($idProduit, $_SESSION['panier']['idArticle']);
    if ($position_produit !== false) {
      $_SESSION['panier']['idArticle'][$position_produit] += $qteArticle;
    } else {
      array_push($_SESSION['panier']['idArticle'], $idArticle);
      array_push($_SESSION['panier']['qteArticle'], $qteArticle);
    }
  } else {
    echo 'Erreur, contactez un admin.';
  }
}

// Modifier la quantité d'un article dans le panier
function ModifierQteArticle($idProduit, $qteArticle) {
  if (creationPanier()) {
    if ($qteArticle > 0) {
      $position_produit = array_search($_SESSION['panier']['idArticle'], $idArticle);
      if ($position_produit !== false) {
        $_SESSION['panier']['idArticle'][$position_produit] = $qteArticle;
      }
    } else {
      supprimerArticle($idArticle);
    }
  } else {
    echo 'Erreur, contectez un admin.';
  }
}

// Supprimer un article d'un panier
function supprimerArticle($idArticle) {
  if(creationPanier()) {
    $tmp = array();
    $tmp['idArticle'] = array();
    $tmp['qteArticle'] = array();

    for ($i; $i < count($_SESSION['panier']['idArticle']); $i++) {
      if ($_SESSION['panier']['idArticle'][$i] !== $idProduit) {
        array_push($_SESSION['panier']['idArticle'], $_SESSION['panier']['idArticle'][$i]);
        array_push($_SESSION['panier']['qteArticle'], $_SESSION['panier']['qteArticle'][$i]);
      }
    }
    $_SESSION['panier'] = $tmp;
    unset($tmp);
  } else {
    echo 'Erreur, contectez un admin.';
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

// Calcul du montant global d'un panier
function montantGlobal() {
  $total = 0;
  for ($i; $i < count($_SESSION['panier']['idArticle']); $i++) {
    $select = $db->query("SELECT prix FROM article WHERE id = '{$_SESSION['panier']['idArticle']}'");
    $prix = $select->fetch(PDO::FETCH_OBJ);
    $total += $_SESSION['panier']['qteArticle'][$i] * $prix;
  }
  return $total;
}

 ?>
