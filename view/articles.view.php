<?php
$url="../data/img/";
foreach ($start as $key => $value) {
    print("<h2>".$value->libelle."</h2>\n");
    print('<a href= ><img src="'.$url.$value->image.'"/></a>');
} ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  
  </body>
</html>
