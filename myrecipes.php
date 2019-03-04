<?php
// "protected" page 

// Always start this first
session_start();

if ( isset( $_SESSION['sess_user'] ) ) {
    // Check if session username 
	$user=$_SESSION['sess_user'];
	$id=$_SESSION['sess_id'];
} else {
    // Redirect them to the login page if not
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Allergy Application</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="css/wireframe-theme.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script src="queryFunctions.js" type="text/javascript"></script>

    <style>
        #login-form {
        box-sizing: border-box;
        background: rgba(16,74,98,0.5);
        border-radius: 10px;
        padding: 40px;
    }


</style>

</head>
<body>


	<div class="jumbotron jumbotron-fluid">
	  <div class="container">
	    <h1 class="display-4 blue jumbo-head">Allergy-Friendly Recipes</h1>
	    <p class="lead blue jumbo-text">Let's get cooking!</p>
	  </div>
	</div>

<nav class="navbar navbar-expand-lg navbar-light Blue-background">
    <a class="navbar-brand" href="login.php"><img class="nav-logo" src="./assets/chefhat.png" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"> </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
        		<a class="nav-item nav-link" href="search.php"> Search For Recipes </a>
            <a class="nav-item nav-link" href="myrecipes.php"> My Recipes </a>
            <a class="nav-item nav-link" href="settings.php"> Settings </a>
            <a class="nav-item nav-link" href="logout.php"> Logout </a>
        </div>
    </div>
</nav>


	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-12 col-xs-12 " id="login-form">

				<h1 class="text-center mb-2">My Recipes</h1>

				<?php
					require_once('config.php');
					$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
					$sql = "SELECT recipe_name FROM favorites WHERE userEmail = '" .$user. "'";
		
					$result = mysqli_query($conn, $sql);
			
						if (mysqli_num_rows($result) > 0) {
			    	// output data of each row
			    		while($row = mysqli_fetch_assoc($result)) {
			    			echo "<h3 class=\"mb-2\">" .$row['recipe_name']. "</h3>";
			    			}
			    		}
						else {
							echo "<p>No recipes found!</p>";
						}

			?>

			</div>
		</div>
	</div>

</body>
</html>