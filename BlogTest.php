<?php

namespace POO_2\Test;

require_once 'Blog.php';

use POO_2\Blog;

class BlogTest extends \PHPUnit_Framework_TestCase {

    static private $connexionDB = null;
    static private $idArticle = null;
    static private $titre= 'TitreExemple';
    CONST  AUTEUR= null;
    var $contenu='';
    
    
    public static function testTitleIsTrue(){
        self::assertTrue(true,'Le titre existe');    
    }
    
    
    
    
    
    
    
    
    
    
    
//    public static function testTitleNotNull(){
//       self::assertNull(BlogTest::$titre);
//    } 
//    public function testAuthorNotNull(){
//        self::assertNull(BlogTest::AUTEUR);
//    }
//    
//    
//    public function testConnexionDB() {
//        BlogTest::$connexionDB = new Blog();
//        $this->assertNotNull(BlogTest::$connexionDB, 'connexion existante!');
//    }
//
//    public function testCheckConnexionIsSuccessfull() {
//        $this->assertTrue(true);
//    }
//
//    public function testCheckConnexionIsNotSuccessfull() {
//        $this->assertNotTrue(false);
//    }
//   
//        
//   
//    
//    public function testSelectAll(){
//        $this->assertFalse(false);
//    }
//    
//    
//    
//    public function testSelectOne(){
//        $this->assertTrue(true);
//    }
//   
//    
//    public function testUpdateOne() {
//        $this->assertTrue(true);
//    }
//    
//    public function testDataView(){
//        $this->assertTrue(true);
//    }
//    
//    public function testPaging(){
//        $this->assertFalse(false);
//    }
//    
//    public function testPagingLink(){
//        $this->assertFalse(false);
//    }
//   
// 
    
    
    
    
    
    
}