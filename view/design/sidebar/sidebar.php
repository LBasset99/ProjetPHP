<link rel="stylesheet" href="../view/design/sidebar/sidebar.css">
<?php include_once('../controler/afficherArticles.ctrl.php');
  global $catAffiche;
?>
<div class="tout">
  <div class="sidebar">

    <h2>&nbsp Filtrer :</h2>


    <form action="../controler/afficherArticles.ctrl.php">
          <p class="cat">Categorie :</p>
        <select name="catChoisie" size="1">
          <option value="tout"
          <?php if (!isset($_GET["catChoisie"]) || $_GET["catChoisie"]=="tout") {
            echo "selected";
          } ?>>Toutes

          <?php
            foreach ($debut as $key => $value) {
              if ((isset($_GET["catChoisie"])) && ($_GET["catChoisie"] == $value[0])) {
                echo '<option value="'.$value[0].'" selected>'.$value[0];
              } else {
                echo '<option value="'.$value[0].'">'.$value[0];
              }
            }
            ?>

        </select>
        <p class="cat">Trier par :</p>
        <select name="trie" size="1">
          <option value="prixDecroissant"
            <?php if (!isset($_GET["trie"]) || $_GET["trie"]=="prixDecroissant") {
              echo "selected";
            } ?>>Prix Décroissant
          <option value="prixCroissant"
            <?php if (isset($_GET["trie"]) && $_GET["trie"]=="prixCroissant") {
              echo "selected";
            } ?>
          >Prix croissant
        </select>
        <br>
        <br>
        <button type="submit" class="button">Rechercher</button>
      </form>

  </div>


  <div class="articles">
    <?php
    $url="../data/img/";
    print('<div class="contenant">');
    foreach ($start as $key => $value) {

      print('<div class="content">');
      print('<img src="'.$url.$value->image.'" alt="article">');
      print('<h4>'.$value->libelle.'</h4>');
      print('<h6>&nbsp &nbsp &nbsp'.$value->prix.'€</h6>');
      print('<button class="ajouter" type="button" name="button">AJOUTER AU PANIER</button>');
      print('</div>');
    }
    print('</div>');?>
  </div>
</div>
