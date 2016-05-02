<?php

namespace Applications\MAMP\htdocs\POO_2\Test\BlogTest2;

require_once 'Blog.php';

use POO_2\Blog1;
use PHPUnit_Extensions_Database_TestCase;

abstract class BlogTest2 extends PHPUnit_Extensions_Database_TestCase {

    public function getConnection() {
        if ($this->conn === null) {
            try {
                $pdo = new PDO('mysql:host=localhost;dbname=poo', 'root', 'root');
                $this->conn = $this->createDefaultDBConnection($pdo, 'poo');
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return $this->conn;  
   
    }
    
   
    public function testSelectAll() {
        $articleDAO = new Blog1();
        $articles = $articleDAO->selectAll();
        $this->assertEquals(
                array(
            array("id" => 21, "titre" => "Titre100"),
            array("id" => 22, "titre" => "Session avec mon mentor"),
            array("id" => 23, "titre" => "KILOPM")), $articles);
    }
    
    
    
   
}

