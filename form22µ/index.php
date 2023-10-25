<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Login #9</title>
  </head>
  <body>
  

  
  <div class="content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-block">
                  <div class="mb-4">
                  <h3>Sign In to <strong>Colorlib</strong></h3>
            
                </div>
                <form action="#" method="post">
                  <div class="form-group first">
                    <label for="username">email</label>
                    <pre>   </pre>
                    <input type="email" name="email"  class="form-control" id="username">

                  </div>
                  <div class="form-group last mb-4">
                    <label for="password">password</label>
                    <pre>   </pre>
                    <input type="password" name="password" class="form-control" id="password">
                    
                  </div>
                  
                  <div class="d-flex mb-5 align-items-center">
                    <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                      <input type="checkbox" checked="checked"/>
                      <div class="control__indicator"></div>
                    </label>
                  </div>

                  <input type="submit" name="submit" value="submit" class="btn btn-pill text-white btn-block btn-primary">

                
                  
              
                </form>
              </div>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  <?php
  if (isset($_POST['submit'])) {
		$_POST["email"] == "zouhir@gmail.com";
		$_POST["password"] == "cmc";
		if ($_POST["email"] =="zouhir@gmail.com" && $_POST["password"] == "cmc") {
			$_SESSION['login'] = "zouhir@gmail.com";
			$_SESSION['start'] = time();
			$_SESSION['expire'] = $_SESSION['start'] + (90);
      setcookie("host",gethostname(),time()+ 86400 * 30 ,"/");
			header('Location: form.php');
		} else {
			echo "<script>
      alert('Please enter the email or password again!');
    </script>";
		}
	}
  ?>
  
    <script src="js/jquery-3.3.1.min.js">
      alert("Please enter the email or password again!");
    </script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>