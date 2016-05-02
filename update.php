<?php
namespace POO_2;
require_once'Blog.php';
$connexion= new Blog();
$update=$connexion->updateOne();
if (isset($_GET['id'])){
$result=$connexion->selectOne($_GET['id']);

?>
<!DOCTYPE html>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
<form method="post">
    <?php
    
    while ($data=$result->fetch()){
        ?>
  <div class="form-group">
    <label>Titre</label>
    <input type="text" class="form-control" name="titre" value="<?php echo $data['titre'];?>">
  </div>
  <div class="form-group">
    <label>Contenu</label>
    <textarea class="form-control" name="contenu" ><?php echo $data['contenu'];?></textarea>
  </div>
    <label>Auteur</label>
    <input type="text" class="form-control" name="auteur" value="<?php echo $data['auteur'];?>">
  </div>
  <?php
    }
}
    echo $update;
    ?>
  <br/>
  <button type="submit" class="btn btn-default">Modifier</button>
</form>
    
    <a href="index.php">Retour à l'accueil</a>


