<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Appointment Booking Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<?php
    $conn = mysqli_connect("localhost", "root", "", "produit"); 

    $id = $_GET['id'];

$req = mysqli_query($conn , "SELECT * FROM produits WHERE IDproduit = $id");
$row = mysqli_fetch_assoc($req);
$query = "SELECT * FROM type WHERE  IDproduit = $id";
$result = mysqli_query($conn, $query);


if (isset($_POST['submit'])) {
    extract($_POST);
    
       
    $req = mysqli_query($conn, "UPDATE produits SET name = '$name' , prix = '$prix'  WHERE IDproduit = $id");
    
    mysqli_query($conn, "DELETE FROM type WHERE IDproduit = $id");
    foreach ($speciality as $value) {
        mysqli_query($conn, "INSERT INTO type (IDproduit, speciality_id) VALUES ('$id', '$value')");
    } 

        
    if ($req) {
        header('Location: TABLE.php');
    } else {
        $message = "employé non ajouté";
    }
    
} else {
    $message = "veuillez";
}

        ?>
        <?php require('heder.php') ?>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Produit</h1>
        <form  method="POST">
            <div class="form-group">
                <label for="full-name"> Name Produit:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?=$row['name']; ?>" required>
            </div>
            
            <div class="form-group">
                    <label for="speciality"> type de prouduit  :</label><br>
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" id="orl" name="speciality[]" value="1">
                        <label class="form-check-label" for="orl">Type 1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" id="chirugien-dentiste" name="speciality[]" value="2">
                        <label class="form-check-label" for="chirugien-dentiste">Type 2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" id="medecin-generaliste" name="speciality[]" value="3">
                        <label class="form-check-label" for="medecin-generaliste">Type 3</label>
                    </div>
                </div>
                
                <div class="form-group">
                <label for="prix">Prix :</label>
                <input type="text" class="form-control" id="prix" name="prix"  value="<?=$row['prix']; ?>" required>
            </div>
                
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
        </form>
    </div>
    <pre>




    </pre>
    <?php require('foder.php') ?>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.14/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>

