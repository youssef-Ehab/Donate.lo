<?php 
	require_once 'config.php';
    require_once 'connect.php';

    $db = connect(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWD);

	$query=mysqli_query($db, "SELECT * FROM donate_to");
?>
<html>
<head>
    <title>Donate to</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="DonateTo.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    
    </head>

	<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="Home.html">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="Login.html">Login <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Register.html">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="donateTo.php">Donate To</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="addDonation.html">Add New Donation</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="About%20us.html">About us</a>
      </li>
      
    </ul>
    
  </div>
</nav>

	<div class="header">
        <div class="opacity">
        </div>
    </div>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row text-center">
              	
    <?php while($rows=mysqli_fetch_array($query)){
              echo( 
              	'<div class="col-lg-4 col-md-6 col-sm-12">
	                <div class="card sm-3 shadow-sm">
	                  <div>
	                    <img class="card-img-top" src="Hos.jpeg"');echo($record['image']); echo('" alt="Card image cap">
	                  </div>
	                  <div class="card-body">
	                    <h5 class="card-title">'
	                    );
	              			echo ($rows['title']);
	              		echo('</h5>
	                    <p class="card-text">');
	                    	echo ($rows['description']);
	                    echo('</p>
	                    	<p class="card-text">');
	                   echo(' <div class="progress">
  							<div class="progress-bar" role="progressbar" style="width:' );
  							echo( (($rows[ 'required_amount'] - $rows['remaining_amount']) / $rows['required_amount']) * 100);
  							echo('%"
  							 aria-valuenow="');
  							echo($rows['required_amount'] - $rows['remaining_amount']);
  							echo('" aria-valuemin="0" aria-valuemax="');
  							echo($rows['required_amount']);
  							echo('"></div>
							</div>');
							echo ($rows['required_amount']);
						echo('</p>
	                    <div class="d-flex justify-content-between align-items-center">
	                     <a href="PaymentMethod.html" class="btn btn-primary">Donate</a>
	                    </div>
	                  </div>
	                </div>
              	</div>'
              );	
			}
		?>


			</div>
    	</div>
    </div>
		
    <!-- End Header -->
    

   <footer class="footer footer-transparent">
        
            
        <div class="container-fluid text-center">
            <center><h1 class="hh">Follow us on</h1></center>
        
            <div class="row">
                <div class="col-lg-2 col-md-6">
                <div class="social">
                    <p class="lead"><a href="https://www.facebook.com"><i class="fab fa-facebook-square fa-5x"></i></a></p>
                </div>
                </div>
                <div class="col-lg-2 col-md-6">
                <div class="social">
                    <p class="lead"><a href="https://www.twitter.com"><i class="fab fa-twitter-square fa-5x"></i></a> </p>
                </div>
                </div>
                <div class="col-lg-2 col-md-6">
                <div class="social">
                    <p class="lead"><a href="https://www.youtube.com"><i class="fab fa-youtube-square fa-5x"></i></a> </p>
                </div>
                </div>
                <div class="col-lg-2 col-md-6">
                <div class="social">
                    <p class="lead"><a href="https://www.instagram.com"><i class="fab fa-instagram fa-5x"></i></a> </p>
                </div>
                </div>
                 <div class="col-lg-2 col-md-6">
                <div class="social">
                    <p class="lead"><a href="https://www.reddit.com"><i class="fab fa-reddit-square fa-5x"></i></a> </p>
                </div>
                </div>
                 <div class="col-lg-2 col-md-6">
                <div class="social">
                    <p class="lead"><a href="https://www.gmail.com"><i class="fas fa-envelope fa-5x"></i></a> </p>
                </div>
                </div>
                            </div>
         
            </div>
                
        <!-- End SocialMedia Section-->
    <!-- Start Footer -->
    

                
    </footer>    
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    

	</body>
</html>
