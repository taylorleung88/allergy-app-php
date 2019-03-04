 <?php
 	session_start();
 	if ( isset( $_SESSION['sess_id'] )) {
	$dbID=$_SESSION['sess_id'];  
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Allergy Application</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/wireframe-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
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

	<nav class="navbar navbar-expand-lg navbar-light blue-thing">
	    <a class="navbar-brand" href="login.php"><img class="nav-logo" src="./assets/chefhat.png" /></a>
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon"> </span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	        <div class="navbar-nav ml-auto">
	        		<a class="nav-item nav-link" href="search.php"> Search For Recipes </a>
	            <a class="nav-item nav-link" href="myrecipes.php"> My Recipes </a>
	            <a class="nav-item nav-link" href="settings.php"> Settings </a>
	            <?php
	     
	            	$user = "";
                if ( isset( $_SESSION['sess_user'] )) {
                    $message = "Login";
                    $url = "login.php";
                    $user = $_SESSION['sess_user'];
                    //$id=$_SESSION['sess_id'];
                    // Grab username
                } else {
                    $message = "Logout";
                    $url = "logout.php";
                }


            echo "<a class=\"nav-item nav-link\" href=\"" .$url. "\">" .$message. "</a>";
            ?>
	        </div>
	    </div>
	</nav>


	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-12 col-xs-12">
				<h1 class="blue">Search Results</h1>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row"  id="login-form">
			<div class="col-lg-7 offset-lg-1" >

	<?php
		require_once('config.php');
		$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
		
		if(isset($_POST["search"])) { 
			//$term = $_POST['searchTerm'];
			$mealTime = $_POST['meal-time'];
			$budget = $_POST['budget'];
			
			$nuts = 0;
			$seafood = 0;
			$soy = 0;
			$gluten = 0;

			if(isset($_POST['nuts'])){
				$nuts = $_POST['nuts'];
			}
			
			if(isset($_POST['seafood'])) {
				$seafood = $_POST['seafood'];	
			}

			if(isset($_POST['soy'])) {
				$soy = $_POST['soy'];	
			}
			
			if(isset($_POST['gluten'])) {
				$gluten = $_POST['gluten'];	
			}

			$sql = "";
			if($nuts == 1) {
				$sql = "SELECT * from recipes WHERE meal = \"$mealTime\" AND nuts = 0";		
			}
			else {
				$sql = "SELECT * from recipes WHERE meal = \"$mealTime\" AND nuts <= 1";
			}
			if($gluten == 1) {
				$sql .= " AND gluten = 0";
			}
			else {
				$sql .= " AND gluten <= 1";
			}
			if($seafood == 1) {
				$sql .= " AND seafood = 0";
			}
			else {
				$sql .= " AND seafood <= 1";
			}
			if($soy == 1) {
				$sql .= " AND soy = 0";
			}
			else {
				$sql .= " AND soy <= 1";
			}

			$sql .= " AND cost <= $budget";
			
			//echo "<p>". $sql . "</p>";
			//echo "<p>" .$user. "</p>";
			//echo "<p>" .$dbID. "</p>";

			$result = mysqli_query($conn, $sql);




			if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysqli_fetch_assoc($result)) {

						$my_r_d = $row["recipe_id"];
						$my_r_n = $row["recipe_name"];

			    		echo "<h3><a href=\"" .$row["recipe_url"]. "\">" .$row["recipe_name"]. "</a></h3>";
			    		echo "<p>" .$row["recipe_description"]. "</p>";
			    		echo "<p class=\"mb-5\"></p>";
			    		echo "<hr>";
	
							/* Dynamically generating the button for adding to favorites did not work 
			    		echo "<input type=\"submit\" name=\"".$my_r_n."\" value=\"Add to Favorites\" />";
										
							$sql2 = "INSERT INTO favorites (userEmail, recipe_id, recipe_name) VALUES ('$user', '$my_r_d', '$my_r_n')";
			
							echo $sql2;
							echo "'".$my_r_n."'";
			    		if(isset($_POST["'".$my_r_n."'"])) {
			    			$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
		
			    			$result2 = mysqli_query($conn, $sql2);
			    		}
			    		*/

			    }
			} 
			else {
			    echo "<p>Sorry, no results found!</p>";
			}
		
		}


	?>
				</div>

				<div class="col-lg-2 col-md-2 d-none d-lg-block">
	<?php
		require_once('config.php');
		$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
		
		if(isset($_POST["search"])) { 
			//$term = $_POST['searchTerm'];
			$mealTime = $_POST['meal-time'];
			$budget = $_POST['budget'];
			
			$nuts = 0;
			$seafood = 0;
			$soy = 0;
			$gluten = 0;

			if(isset($_POST['nuts'])){
				$nuts = $_POST['nuts'];
			}
			
			if(isset($_POST['seafood'])) {
				$seafood = $_POST['seafood'];	
			}

			if(isset($_POST['soy'])) {
				$soy = $_POST['soy'];	
			}
			
			if(isset($_POST['gluten'])) {
				$gluten = $_POST['gluten'];	
			}

			$sql = "";
			if($nuts == 1) {
				$sql = "SELECT * from recipes WHERE meal = \"$mealTime\" AND nuts = 0";		
			}
			else {
				$sql = "SELECT * from recipes WHERE meal = \"$mealTime\" AND nuts <= 1";
			}
			if($gluten == 1) {
				$sql .= " AND gluten = 0";
			}
			else {
				$sql .= " AND gluten <= 1";
			}
			if($seafood == 1) {
				$sql .= " AND seafood = 0";
			}
			else {
				$sql .= " AND seafood <= 1";
			}
			if($soy == 1) {
				$sql .= " AND soy = 0";
			}
			else {
				$sql .= " AND soy <= 1";
			}

			$sql .= " AND cost <= $budget";
			
			//echo "<p>". $sql . "</p>";

			$result = mysqli_query($conn, $sql);
			
			if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysqli_fetch_assoc($result)) {
			    		echo "<img src = \"assets/" .$row["recipe_image"]. "\"class=\"img-fluid\"/>";
			    		echo "<p></p>";
			    }
			} 
		
		}

	?>
				</div>
			</div>
		</div>

</body>

</html>