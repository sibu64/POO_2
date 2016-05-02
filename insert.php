<?php 
namespace POO_2;
require_once 'Blog.php';
$connexionDB=new Blog();


?>
<!DOCTYPE html>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
<form method="post" action="insert.php">
  <div class="form-group">
    <label>Titre</label>
    <input type="text" class="form-control" name="titre">
  </div>
  <div class="form-group">
    <label>Contenu</label>
    <textarea class="form-control" name="contenu"></textarea>
  </div>
    <label>Auteur</label>
    <input type="text" class="form-control" name="auteur">
  </div>
  <button type="submit" class="btn btn-default">Ajouter</button>
</form>


<a href="index.php">Retour à l'accueil</a>
<?php 
echo $connexionDB->insert();?>
</body>
</html>
