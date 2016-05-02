<?php

namespace POO_2;

class Blog {

    static $HOST = 'mysql:host=127.0.0.1;port=8889;dbname=poo;charset=utf8';
    static $USER = 'root';
    static $PASS = 'root';
    //static $SOCKET = 'mysql:unix_socket=/tmp/mysql.sock' ;
    
    

    private function connexionDB() {
        try {
            $connexion = new \PDO(self::$HOST, self::$USER, self::$PASS );
            $connexion->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $connexion;
            
        } catch (Exception $errorConnexion) {
            die('Erreur de connexion : ' . $errorConnexion->getMessage());
        }
    }

    public function selectAll() {
        $connexion = $this->connexionDB();
        $result = $connexion->query('SELECT * FROM crud ORDER BY id DESC');
        return $result;
    }

    public function selectOne($id) {
        $connexion = $this->connexionDB();
        $result = $connexion->prepare('SELECT * FROM crud WHERE id=?');
        $result->execute([
            $id
        ]);
        return $result;
    }

    public function insert() {
        if (isset($_POST['titre']) && !empty($_POST['titre']) && isset($_POST['contenu']) && !empty($_POST['contenu']) && isset($_POST['auteur']) && !empty($_POST['auteur'])) {
            $connexion = $this->connexionDB();
            $insert = $connexion->prepare('INSERT INTO crud (titre,date,contenu,auteur) VALUES(?,NOW(),?,?)');

            $insert->execute([
                $_POST['titre'],
                $_POST['contenu'],
                $_POST['auteur']
            ]);

            return $connexion->lastInsertId();
        } elseif (isset($_POST['titre']) && empty($_POST['titre'])) {
            throw new Exception('le titre n\'a pas été renseigné');
        } elseif (isset($_POST['contenu']) && empty($_POST['contenu'])) {
            throw new Exception('le contenu n\'a pas été renseigné');
        } elseif (isset($_POST['auteur']) && empty($_POST['auteur'])) {
            throw new Exception('l\'auteur n\'a pas été renseigné');
        }
    }

    public function delete($id) {
        $connexion = $this->connexionDB();
        $delete = $connexion->prepare('DELETE FROM crud WHERE id=?');
        $delete->execute(
            [$id]
        );
        return 'L\'article a bien été supprimé';
    }

    public function updateOne() {
        if (isset($_POST['titre']) && !empty($_POST['titre']) && isset($_POST['contenu']) && !empty($_POST['contenu']) && isset($_POST['auteur']) && !empty($_POST['auteur'])) {
            $connexion = $this->connexionDB();
            $update = $connexion->prepare('UPDATE crud SET titre=:titre,contenu=:contenu,auteur=:auteur WHERE id=:id');
            $maj = array('titre' => $_POST['titre'], 'contenu' => $_POST['contenu'], 'auteur' => $_POST['auteur'], 'id' => $_GET['id']);
            $update->execute($maj);

            return 'L\'article a bien été mis à jour';
        } elseif (isset($_POST['titre']) && empty($_POST['titre'])) {
            echo 'le titre n\'a pas été renseigné';
        } elseif (isset($_POST['contenu']) && empty($_POST['contenu'])) {
            echo 'le contenu n\'a pas été renseigné';
        } elseif (isset($_POST['auteur']) && empty($_POST['auteur'])) {
            echo 'l\'auteur n\'a pas été renseigné';
        }
    }
    
    
     /* paging */

    public function dataview($query) {
        $stmt = $this->connexionDB()->prepare($query);
        $stmt->execute();
    }

    public function paging($query, $records_per_page) {
        $starting_position = 0;
        if (isset($_GET["page_no"])) {
            $starting_position = ($_GET["page_no"] - 1) * $records_per_page;
        }
        $query2 = $query . " limit $starting_position,$records_per_page";
        return $query2;
    }

    public function paginglink($query, $records_per_page) {

        $self = $_SERVER['PHP_SELF'];

        $stmt = $this->connexionDB()->prepare($query);
        $stmt->execute();

        $total_no_of_records = $stmt->rowCount();

        if ($total_no_of_records > 0) {
            ?><ul class="pagination"><?php
            $total_no_of_pages = ceil($total_no_of_records / $records_per_page);
            $current_page = 1;
            if (isset($_GET["page_no"])) {
                $current_page = $_GET["page_no"];
            }
            if ($current_page != 1) {
                $previous = $current_page - 1;
                echo "<li><a href='" . $self . "?page_no=1'>Première page</a></li>";
                echo "<li><a href='" . $self . "?page_no=" . $previous . "'>Page précédente</a></li>";
            }
            for ($i = 1; $i <= $total_no_of_pages; $i++) {
                if ($i == $current_page) {
                    echo "<li><a href='" . $self . "?page_no=" . $i . "' style='color:red;'>" . $i . "</a></li>";
                } else {
                    echo "<li><a href='" . $self . "?page_no=" . $i . "'>" . $i . "</a></li>";
                }
            }
            if ($current_page != $total_no_of_pages) {
                $next = $current_page + 1;
                echo "<li><a href='" . $self . "?page_no=" . $next . "'>Prochaine page</a></li>";
                echo "<li><a href='" . $self . "?page_no=" . $total_no_of_pages . "'>Dernière page</a></li>";
            }
            ?></ul><?php

}

}
}
