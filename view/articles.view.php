<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="../view/articles.view.css">
    <meta charset="utf-8">
    <title>Vlad Shop</title>
  </head>

      <?php
    $url="../data/img/";

    print('<div class="content">');
    print('<img src="'.$url.$unArt->image.'" alt="article">');
    print('<h4>'.$unArt->libelle.'</h4>');
    print('<h6>&nbsp &nbsp &nbsp'.$unArt->prix.'€</h6>');
    print('<a href="../controler/panier.ctrl.php?action=ajout&amp;l='.$unArt->ref.'&amp;q=1" class="ajouter">AJOUTER AU PANIER</a>');
    print('</div>');
    print('</a>');
    ?>
</html>
