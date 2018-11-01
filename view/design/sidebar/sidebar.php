<link rel="stylesheet" href="../view/design/sidebar/sidebar.css">

<div class="tout">
  <div class="sidebar">

    <h2>&nbsp Filtrer :</h2>

    <ul class="menu">
      <a class="btn active" onclick="filterSelection('tout')"> Tout afficher</a>
      <a class="btn" onclick="filterSelection('tshirts')"> T-Shirts</a>
      <a class="btn" onclick="filterSelection('sweats')"> Tous les sweat</a>
      <ul class="submenu">
        <a class="btn" onclick="filterSelection('sweatssc')"> Sweat sans capuche</a>
        <a class="btn" onclick="filterSelection('sweatac')"> Sweat à capuche</a>
      </ul>
    </ul>
  </div>

  <div class="articles">
    <?php require_once("../view/articles.view.php"); ?>
  </div>
</div>
