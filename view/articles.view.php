<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $url="../data/img/";
    foreach ($start as $key => $value) {
      print('<div class="row">');

      if ($value->categorie == "T-shirts") {
        print('<div class="column tshirts">');
        print('<div class="content">');
        print('img src="'.$url.$value->image.'" alt="article" style="width:100%"');
        print('<h4>'.$value->libelle.'</h4>');
        print('</div></div>');
      }
    } ?>
  </body>
</html>
