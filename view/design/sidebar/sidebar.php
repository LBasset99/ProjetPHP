<link href="view/design/sidebar/sidebar.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

<h2>&nbsp Filtrer</h2>

<div id="myBtnContainer" class="verticalbar">
  <input type="text" name="" value="">
  <input type="submit" name="" value="Rechercher">

  <div data-role="rangeslider">
    <label for="price-min">Prix :</label>
    <input type="range" name="price-min" id="price-min" value="0" min="0" max="50">
    <input type="range" name="price-max" id="price-max" value="50" min="0" max="50">
  </div>

  <a class="btn active" onclick="filterSelection('all')"> Tout afficher</button>
  <a class="btn" onclick="filterSelection('nature')"> T-Shirts</button>
  <a class="btn" onclick="filterSelection('cars')"> Sweat</button>
  <a class="btn" onclick="filterSelection('people')"> Sweat à capuche</button>
</div>
