<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "produit";
 
 try {
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
 }
 catch (PDOException $e) {
     die("Connection failed: " . $e->getMessage());
 } 
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
    <style>
        /* يمكنك وضع أنماط CSS الخاصة بك هنا */

body {
    font-family: Arial, sans-serif;
}

.container {
    margin-top: 20px;
}

.table {
    width: 100%;
}

.table th {
    font-weight: bold;
}

.btn {
    display: inline-block;
    padding: 5px 10px;
    border-radius: 5px;
    text-decoration: none;
    color: #fff;
    background-color: #007bff;
}

.btn:hover {
    background-color: #0056b3;
}

.float-start {
    float: left;
    margin-right: 10px;
}

.float-end {
    float: right;
    margin-left: 10px;
}

    </style>
</head>

<body>
    <?php
    
    require('heder.php'); ?>
    
    <!-- <img src="images/10130.jpg" class="rounded float-start" alt="" width="300px">
    <img src="images/cmc.jpg" class="rounded float-end " alt="" width="200px"> -->
    <div class="container col-7">

        <table class="table">
            <?php
            $sql = "SELECT p.*, GROUP_CONCAT(name SEPARATOR '<br>') as specialitys
            FROM produits p
            JOIN type c ON p.IDproduit = c.IDproduit
            JOIN type s ON c.IDproduit = s.IDproduit
            WHERE p.IDproduit = :IDproduit
            LIMIT 1";

            $statement = $conn->prepare($sql);
            $statement->execute([':IDproduit' => $id]);
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            ?>
            <?php
            $sql2 = "SELECT p.*, GROUP_CONCAT(speciality_id SEPARATOR '<br>') as specialities
            FROM type p
            JOIN produits c ON p.IDproduit = c.IDproduit
            JOIN produits s ON c.IDproduit = s.IDproduit
            WHERE p.IDproduit = :IDproduit
            LIMIT 1";

            $statement2 = $conn->prepare($sql2);
            $statement2->execute([':IDproduit' => $id]);
            $row2 = $statement2->fetch(PDO::FETCH_ASSOC);
            ?>
            <tr>
                <th><h3> IDproduit </h3></th>
                <td><?php echo $row['IDproduit']; ?></td>
            </tr>
            <tr>
                <th><h3> name </h3></th>
                <td><?= $row['name'] ?></td>
            </tr>
            <tr>
                <th><h3> speciality_id </h3></th>
                <td><?= $row2['specialities'] ?></td>
            </tr>
            <tr>
                <th><h3> prix </h3></th>
                <td><?= $row['prix']  ?> DH</td>
            
                <td class="d-flex justify-content-center ">
                    <a href="downlodpdf.php?id=<?= $id; ?>" class="btn btn-success">Download &nbsp <i class="fa fa-download"></i></a>
                </td>
            </tr>
        </table>
    </div>
    <div>
        <table>
            <th>Date d'edition</th>
            <td> &nbsp <?= date("d/m/Y") ?></td>
        </table>
    </div>
    <!-- <img src="images/qrcode.png" class="rounded float-start" alt="" width="150px">
    <img src="images/cachet.png" class="rounded float-end " alt="" width="200px"> -->
</body>

</html>
