<?php
    // Controleur permettant d'afficher la liste des catégories

    // Inclusion du modèle
    include_once("../model/DAO.class.php");

    global $categories;
    $categories = $dao->getAllCat();
    include("../view/categories.view.php");
 ?>
