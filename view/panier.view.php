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
        if(creationPanier()) {

          $nbProduits = count($_SESSION['panier']['idArticle']);
          if ($nbProduits <= 0) {
            print('<h4>Votre panier est vide...</h4>');
          } else {
            for($i = 0; $i < $nbProduits; $i++) {
        ?>
              <tr>
                <td><?php echo $articles[$i]->libelle; ?></td>
                <td><?php echo $articles[$i]->prix; ?></td>
                <td><input name="quantite" value="<?php echo $_SESSION['panier']['qteArticle'][$i]; ?>" size="1" /></td>
                <td><a href="panier.ctrl.php?action=suppression&amp;l=<?php echo rawurlencode($_SESSION['panier']['idArticle'][$i]); ?>">X</a></td>
              </tr>
              <tr>
                <?php } ?>
                <td colspan="2"><br/>
                  <p>Total : <?php
                  $montant = 0;
                  foreach ($articles as $key => $value) {
                    $montant += $value->prix;
                    $montant = $montant * $_SESSION['panier']['qteArticle'][$key];
                  };

                  echo $montant;
                  ?></p>
                </td>
              </tr>
              <tr colspan="4">
                <td><input type="submit" name="" value="rafraichir"></td>
                <td><input type="hidden" name="action" value="refresh"></td>
                <td><a href="?deletePanier=true">Supprimer votre panier</a></td>
              </tr>

      <?php
          }
        }
       ?>

      </table>
    </form>
  </body>
</html>
