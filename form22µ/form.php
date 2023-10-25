
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Appointment Booking Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
 .back{
    background-color: #f8fafb;
 }

</style>

<body>
<?php require('heder.php') ?>
 <div class="back">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Produit</h1>
        <form action="bakend.php" method="POST">
            <div class="form-group">
                <label for="full-name"> Name Produit:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
           
            <!-- <div class="form-group">
                <label>selectionnez votre specialiste</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="speciality[]" value="1" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        ORL
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="speciality[]" value="2" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Chirurgien-dentiste
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="speciality[]" value="3" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Médecin généraliste
                    </label> -->
                    
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
                <label for="appointment-date"> Date Exipration :</label>
                <input type="date" class="form-control" id="Exipration-date" name="date" required>
            </div>

            <div class="form-group">
                <label for="prix">Prix :</label>
                <input type="text" class="form-control" id="prix" name="prix" required>
            </div>
            <pre> </pre>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
        </div>
        
        </form>
 </div>
    </div>
    <pre>


    </pre>
    
    <?php require('foder.php') ?>
</body>
   
</html>
