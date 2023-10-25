<?php
$conn = mysqli_connect("localhost", "root", "", "produit"); 
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM produits WHERE  IDproduit = $id";
    $query1 = "DELETE FROM type WHERE  IDproduit = $id";
    $result = mysqli_query($conn, $query);
    $result = mysqli_query($conn, $query1);

    header('Location: TABLE.php');
  }

  ?>