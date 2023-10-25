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
require('fpdf/fpdf.php');

$id = $_GET['id'];

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the center of the page
        $this->Cell(0,30,'',0,1,'C');
        // Title
        $this->Cell(0,10,'Facteur',0,1,'C');
        // Line break
        $this->Ln(10);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

$sql = "SELECT p.*, GROUP_CONCAT(name SEPARATOR '<br>') as specialitys
FROM produits p
JOIN type c ON p.  IDproduit = c.  IDproduit
JOIN type s ON c.IDproduit = s.IDproduit
WHERE p.  IDproduit = :IDproduit
LIMIT 1";

$statement = $conn->prepare($sql);
$statement->execute([':IDproduit' => $id]);
$row = $statement->fetch(PDO::FETCH_ASSOC);



// Center the text vertically and horizontally on the page
$pdf->Cell(0, 0, '', 0, 1, 'C');
$pdf->MultiCell(0, 10, "Nom: ".$row['name']."\nPrix: ".$row['prix']."\nDate: ".date("d/m/Y"));

$pdf->Output();
?>