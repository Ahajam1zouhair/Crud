<?php
include("PDO.php");

if (isset($_POST['submit'])) {

    // $Nom = htmlspecialchars(trim(strtolower($_POST["name"])));
    $name =$_POST["name"];
    $speciality = $_POST["speciality"];
    $Exipration_date = $_POST["date"];
    $prix = $_POST["prix"];

    // إنشاء جدول "produits"
    $sql = "CREATE TABLE IF NOT EXISTS produits (
        IDproduit INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        prix VARCHAR(255) NOT NULL
    )";
    $conn->exec($sql);

    // إنشاء جدول "type"
    $sql = "CREATE TABLE IF NOT EXISTS type (
        IDproduit VARCHAR(255) NOT NULL,
        speciality_id INT 
        )";
    $conn->exec($sql);



    // إدراج بيانات المريض في جدول "Inscription"
    $sql = "INSERT INTO produits (name, prix)
            VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $prix]);

    $patientID = $conn->lastInsertId();

    foreach ($speciality as $value) {
        $sql = "INSERT INTO type (IDproduit ,speciality_id) VALUES (?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$patientID ,$value]);
    } 

    $conn = null;
    
    header('Location: enregistre.php');
}

?>
