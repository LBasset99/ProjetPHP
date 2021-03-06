<?php
    require_once("../model/Categorie.class.php");
    require_once("../model/Article.class.php");

    // Creation de l'unique objet DAO
    $dao = new DAO();

    // Le Data Access Object
    // Il représente la base de donnée
    class DAO {
        // L'objet local PDO de la base de donnée
        private $db;
        // Le type, le chemin et le nom de la base de donnée
        private $database = 'sqlite:../data/vlad.db';

        // Constructeur chargé d'ouvrir la BD
        function __construct() {
            try {
              $this->db = new PDO($this->database);
            } catch(PDOException $e) {
              echo 'Connexion échouée : '.$e->getMessage();
            }

        }


        // Accès à toutes les catégories
        // Retourne une table d'objets de type Categorie
        function getAllCat() : array {
          $req = "SELECT nom FROM categorie";
          $cat = $this->db->query($req);
          $categorie = $cat->fetchAll();

          return $categorie;
        }

        // Acces a un articles à partir de son id
        function getUnArt($unArt) : Article {
          $req = 'SELECT * FROM Article WHERE ref="'.$unArt.'";';
          $art = $this->db->query($req);
          $article = $art->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Article');

          return $article[0];
        }

        function getAllArt() : array {
            $req = "SELECT * FROM article order by prix;";

            $art = $this->db->query($req);
            $article = $art->fetchall();

            return $article;
        }

        function getArticles($tri) : array {
          if ($tri == "prixDecroissant") {
            $req = "SELECT * FROM article order by prix desc;";
          }
          else if ($tri == "prixCroissant") {
            $req = "SELECT * FROM article order by prix;";
          }
            $art = $this->db->query($req);
            $article = $art->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Article');

            return $article;
        }

        function getFctCat(string $cat, string $tri) : array {
          switch ($cat) {
            case "T-shirts":
              $cas = 1;
              break;

            case 'Sweat - Pulls':
              $cas = 2;
              break;

            case 'Sweat Capuche':
              $cas = 3;
              break;
          }
            if ($tri == "prixDecroissant") {
              $req='SELECT * FROM article WHERE categorie="'.$cas.'" order by prix desc';
            } else if ($tri == "prixCroissant") {
              $req='SELECT * FROM article WHERE categorie="'.$cas.'" order by prix';
            }

           $art = $this->db->query($req);
           $result = $art->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Article');

           return $result;
         }


        // Accès aux n premiers articles
        // Cette méthode retourne un tableau contenant les n permier articles de
        // la base sous la forme d'objets de la classe Article.
        function firstN(int $n) : array {
            $req = "SELECT * FROM article LIMIT $n;";
            $art = $this->db->query($req);
            $article = $art->fetchall(PDO::FETCH_CLASS, 'Article');

            return $article;
        }

        // Acces au n articles à partir de la reférence $ref
        // Cette méthode retourne un tableau contenant n  articles de
        // la base sous la forme d'objets de la classe Article.
        function getN(int $ref,int $n) : array {
            $req = "SELECT * FROM article WHERE ref >= $ref LIMIT $n;";
            $art = $this->db->query($req);
            $article = $art->fetchall(PDO::FETCH_CLASS, 'Article');

            return $article;
        }

        // Cette méthode retourne un tableau contenant n  articles de la couleur choisie
        // la base sous la forme d'objets de la classe Article.
          function getCouleur($couleur) : array {
            $req = "SELECT * FROM article WHERE  $couleur=couleur;";
            $art = $this->db->query($req);
            $article = $art->fetchall(PDO::FETCH_CLASS, 'Article');

            return $article;
        }

        // Cette méthode retourne un tableau contenant n  articles de la catégorie choisie
        // la base sous la forme d'objets de la classe Article.
          function getCategorie($categorie) : array {
            $req = "SELECT * FROM article WHERE  $categorie=categorie;";
            $art = $this->db->query($req);
            $article = $art->fetchall(PDO::FETCH_CLASS, 'Article');

            return $article;
        }


        // Acces à la référence qui suit la référence $ref dans l'ordre des références
        function next(int $ref) : int {
            $req = "SELECT ref FROM article WHERE ref > $ref LIMIT 1;";
            $art = $this->db->query($req);
            $article = $art->fetch(PDO::FETCH_OBJ);

            return $article->ref;
        }

        // Acces aux n articles qui précèdent de $n la référence $ref dans l'ordre des références
        function prevN(int $ref,int $n): array {
            $req = "SELECT * FROM article WHERE ref in(
            SELECT ref FROM article WHERE ref < $ref ORDER BY ref desc LIMIT $n)";
            $art = $this->db->query($req);
            $article = $art->fetchall(PDO::FETCH_CLASS, 'Article');

            return $article;
        }



        // Acces à une catégorie
        // Retourne un objet de la classe Categorie connaissant son identifiant
        function getCat(int $id): Categorie {
            ///////////////////////////////////////////////////////
            //  A COMPLETER
            ///////////////////////////////////////////////////////

            return new Categorie();
        }


        // Acces au n articles à partir de la reférence $ref
        // Retourne une table d'objets de la classe Article
        function getNCateg(int $ref,int $n,string $categorie) : array {
            ///////////////////////////////////////////////////////
            //  A COMPLETER
            ///////////////////////////////////////////////////////
            return array();
        }

    }

    ?>
