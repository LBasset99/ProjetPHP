<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../view/panier.view.css">
    <title>Panier - Vlad Shop Unofficial</title>
  </head>
  <body>

    <form id="form" method="post">
      <div>
        <p class="titre">Votre panier</p>
      </div>

        <?php
        if(creationPanier()) {

          $nbProduits = count($_SESSION['panier']['idArticle']);
          if ($nbProduits <= 0) {
            print('<h4>Votre panier est vide...</h4>');
          } else {
            ?>
            <table>
              <tr>
                <td></td>
                <td>Libellé article</td>
                <td>Prix unitaire</td>
                <td>Quantité</br>(Rafraichir la page)</td>
                <td>Action</td>
              </tr>
              <?php 
            for($i = 0; $i < $nbProduits; $i++) {
        ?>
              <tr>
                <?php $url="../data/img/"; ?>
                <td><img class="img" src="<?php echo $url.$articles[$i]->image ?>" alt="article"></td>
                <td><?php echo $articles[$i]->libelle; ?></td>
                <td><?php echo $articles[$i]->prix; ?> €</td>
                <td><input class="qte" type="number" name="quantity[]" value="<?php echo $_SESSION['panier']['qteArticle'][$i]; ?>"/></td>
                <td><a class="suppr" href="panier.ctrl.php?action=suppression&amp;l=<?php echo rawurlencode($_SESSION['panier']['idArticle'][$i]); ?>">SUPPRIMER</i></a></td>
              </tr>
              <tr>
                <?php } ?>
                <td class="total" colspan="5"><br/>
                  <div class="subTotal">
                    <p>Total : <?php
                    $montant = 0;
                    foreach ($articles as $key => $value) {
                      $montant += $value->prix;
                      $montant = $montant * $_SESSION['panier']['qteArticle'][$key];
                    };

                    print($montant." €");
                    ?></p>
                </div>
                  <div class="commander">
                    <a class="com" href="../controler/commander.ctrl.php">COMMANDER</a>
                  </div>
                </td>
              </tr>
              <tr>
                <td colspan="4">
                  <input class="rafraichir" type="submit" value="Rafraichir le TOTAL"/>
                  <input type="hidden" name="action" value="refresh"/>
                  <a class="suppPanier" href="?deletePanier=true">Supprimer votre panier</a>
                </td>
              </tr>

      <?php
          }
        }
       ?>

      </table>
    </form>
  </body>
</html>
