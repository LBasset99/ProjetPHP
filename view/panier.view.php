<?php
require_once('../model/function_panier.model.php');
// autres require header / sidebar

 ?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="panier.view.css">
    <title>Panier - Vlad Shop Unofficial</title>
  </head>
  <body>
    <header>
      <p>Panier</p>
      <img src="design/vladshop.png" width="" alt="vlad logo">
    </header>

    <form class="" action="" method="post">
      <table>
        <tr>
          <td colspan="4">Votre panier</td>
        </tr>
        <tr>
          <td>Libellé article</td>
          <td>Prix unitaire</td>
          <td>Quantité</td>
          <td>Action</td>
        </tr>
        <?php
        $nbProduits = count($_SESSION['panier']['idArticle']);
        if ($nbProduits < 0) {
          echo 'Votre panier est vide...'
        } else {
          
        }



         ?>
      </table>
    </form>
  </body>
</html>
