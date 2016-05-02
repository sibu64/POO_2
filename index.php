<?php
namespace POO_2;
require_once 'Blog.php';
$connexionDB=new Blog();
$result= $connexionDB->selectAll();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	

	<title>Blog</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">	<!-- Bootstrap core CSS -->
	

	<!-- Custom styles for this template -->
	<link href="index.css" rel="stylesheet">
</head>

<body>


	<div class="container-fluid">

		<div class="row">

			<h2 class="sub-header">Blog</h2>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Identifiant</th>
                                                        <th>Titre</th>
							<th>Auteur</th>
							<th>Contenu</th>
							<th>Date</th>
                                                        <th>Modifier</th>
                                                        <th>Supprimer</th>
                                                        
						</tr>
					</thead>
					<tbody>
                                            <tr>
                                        <?php
                                        while ($data=$result->fetch()){
                                        ?>
                                                <td><?php echo $data['id'];?>
                                        <td><?php echo $data['titre'];?>
                                        <td><?php echo $data['contenu'];?>
                                        <td><?php echo $data['auteur'];?>
                                        <td><?php echo $data['date'];?>
                                        <td><a href="update.php?id=<?php echo $data['id'];?>">Modifier</a></td>
                                        <td><a href="delete.php?id=<?php echo $data['id'];?>">Supprimer</a></td>
                                            </tr> 
                                            <?php
                                        }
                                     $query = "SELECT * FROM crud";       
                                     $records_per_page=3;
                                     $newquery = $connexionDB->paging($query,$records_per_page);
                                     $connexionDB->dataview($newquery);
                                     ?>
                                       <tr>
                                           <td colspan="7" align="center">
                                       <div class="pagination-wrap">
                                               <?php $connexionDB->paginglink($query,$records_per_page); ?>
                                            </div>
                                           </td>
                                       </tr>
                                             ?>   

					</tbody>
				</table>
			</div>
		</div>
        </div>
    <a href="insert.php">Insérer un article</a>

</body>

</html>

