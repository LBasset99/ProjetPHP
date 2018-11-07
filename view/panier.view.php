<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="panier.view.css">
    <title>Panier - Vlad Shop Unofficial</title>
  </head>
  <body>


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

        if($cree) {

          $nbProduits = count($_SESSION['panier']['idArticle']);
          if ($nbProduits <= 0) {
            print('<h4>Votre panier est vide...</h4>');
          } else {
            // 5:38 #14-1 YOUTUBE APPRENDRE LE PHP PSK C IMPORTANT
            for($i = 0; $i < $nbProduits; $i++) {
              ?>
              <tr>
                <td><?php echo $_SESSION['panier']['idProduit'][$i]; ?></td>
                <td><input name="quantite" value="<?php echo $_SESSION['panier']['qteArticle'][$i]; ?>" size="5" /></td>
                <td><?php getUnArt($_SESSION['panier']['idProduit'][$i])->prix; ?></td>
                <td><a href="panier.php?action=suppression&amp;1=<?php echo rawurlencode($_SESSION['panier']['idArticle'][$i]); ?>">X</a></td>
              </tr>
              <tr>

                <td colspan="2"><br/>
                  <p>Total : <?php echo montantGlobal(); ?></p>
                </td>
              </tr>
              <tr colspan="4">
                <input type="submit" name="" value="rafraichir">
                <input type="hidden" name="action" value="refresh">
                <a href="?deletePanier=true">Supprimer votre panier</a>
              </tr>

              <?php
            }
          }
        }


         ?>
      </table>
    </form>
  </body>
</html>
