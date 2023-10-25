<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    .duv{
    background-color: #f8fafb;
    }
</style>
<body>
<?php require('heder.php') ?>
<div class="container duv">
    <div class="row ">
        <div class="col-md-12 mx-auto text-center">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Prix</th>
                        <th>Prix</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <pre>       
                </pre>
                <tbody>
                    <a href="../form22µ/form.php" id="btn" class="btn btn-outline-primary btn-lg"><i class="fas fa-marker"></i> Ajouter</a>
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "produit"); 
                    $query = "SELECT * FROM produits";
                    $result_tasks = mysqli_query($conn, $query);    
                    while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                   
                    <tr>
                        <td><?php echo $row['IDproduit']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['prix']; ?></td>
                        <td> <?= date("d/m/Y") ?></td>
                        <td>
                            <a href="delete.php?id=<?php echo $row['IDproduit'] ?>" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Delete</a>
                            <a href="modifier.php?id=<?php echo $row['IDproduit']?>" class="btn btn-outline-success"><i class="fas fa-edit"></i> Edit</a>
                            <a href="pdf.php?id=<?php echo $row['IDproduit']?>" class="btn btn-outline-success"><i class="fas fa-edit"></i> pdf</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<pre>


</pre>
<?php require('foder.php') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>