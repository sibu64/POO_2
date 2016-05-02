<?php
namespace POO_2;
if (!headers_sent()){
header('Location:index.php');
}
require_once'Blog.php';
$connexion= new Blog();
if (isset ($_GET['id'])){
$result=$connexion->delete($_GET['id']);
}
