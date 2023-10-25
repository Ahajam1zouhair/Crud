<!DOCTYPE html>
<html>
<head>
	<title>Statistiques de paiement</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		th {
			background-color: #4CAF50;
			color: white;
		}
		tr:nth-child(even) {
			background-color: #f2f2f2;
		}
	</style>
</head>
<body>
<?php require('heder.php') ?>

<pre>
</pre>
	<?php
		$conn = mysqli_connect("localhost", "root", "", "produit");
		// récupérer les statistiques de paiement à partir de la base de données
		$query = "SELECT speciality_id, COUNT(*) AS total FROM type GROUP BY speciality_id";
		$result = mysqli_query($conn, $query);
		$stats = mysqli_fetch_all($result, MYSQLI_ASSOC);

		// tableau HTML pour afficher les statistiques
		echo '<table>';
		echo '<tr><th>Type de paiement</th><th>Nombre de fois cochés</th></tr>';
		foreach ($stats as $stat) {
		    $speciality_id = $stat['speciality_id'];
		    $total = $stat['total'];
		    $label = '';
		    switch ($speciality_id) {
		        case 1:
		            $label = 'a';
		            break;
		        case 2:
		            $label = 'b';
		            break;
		        case 3:
		            $label = 'c';
		            break;
		        default:
		            $label = 'Inconnu';
		            break;
		    }
		    echo "<tr><td>$label</td><td>$total</td></tr>";
		}
		echo '</table>';
		mysqli_close($conn);
	?>
	<pre>                                                                                                             








	









	</pre>
	<?php require('foder.php') ?>
</body>
</html>
