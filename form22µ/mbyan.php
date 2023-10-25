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
   $query4 = "SELECT COUNT(type.speciality_id) as nbr_pat, type.speciality_id, speciality.name 
              FROM type  
              LEFT JOIN speciality ON type.speciality_id = speciality.speciality_id 
              GROUP BY type.speciality_id";
   $stmt4 = $conn->prepare($query4);
   $stmt4->execute();
   $results = $stmt4->fetchAll(PDO::FETCH_ASSOC);

   $nbr_patients = array();
   $noms_specialite = array();

   foreach ($results as $result) {
      array_push($nbr_patients, $result['nbr_pat']);
      array_push($noms_specialite, $result['name']);
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
   <title>Document</title>
</head>
<?php require('heder.php') ?>
<body>
   <canvas id="myChart"></canvas>
   <script>
      var ctx = document.getElementById('myChart').getContext('2d');
      var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
            labels: <?php echo json_encode($noms_specialite); ?>,
            datasets: [{
               label: 'Nombre de patients',
               data: <?php echo json_encode($nbr_patients); ?>,
               backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
               ],
               borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
               ],
               borderWidth: 1
            }]
         },
         options: {
            scales: {
               yAxes: [{
                  ticks: {
                     beginAtZero: true
                  }
               }]
            }
         }
      });
   </script>

</body>

</html>
