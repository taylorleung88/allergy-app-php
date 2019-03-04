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
            <?php
                if ( isset( $_SESSION['sess_user'] ) ) {
                    $message = "Login";
                    $url = "login.php";
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

<div class="jumbotron jumbotron-fluid">
	  <div class="container">
	    <h1 class="display-4 blue jumbo-head">Allergy-Friendly Recipes</h1>
	    <p class="lead blue jumbo-text">Let's get cooking!</p>
	  </div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1">

<?php  

	//Check if passwords match
	if ($_POST['password'] != $_POST['password2']) {
    echo("Oops! Password did not match! Try again. ");
 	}

	require_once('config.php');

			$nuts = 0;
			$seafood = 0;
			$soy = 0;
			$gluten = 0;

			

		if(!empty($_POST['email']) && !empty($_POST['password'])) {  
	    $email = $_POST['email'];  
	    $pass = $_POST['password'];  
	    $fName = $_POST['firstName'];
	    $lName = $_POST['lastName'];
	    
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

	    $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
			$db_table = "userinfo";
	    //$con=mysql_connect('localhost','root','wit123', 'users') or die(mysql_error());  
	    //mysql_select_db('users') or die("cannot select DB");  
	  
	    $query=mysqli_query($conn, "SELECT * FROM users WHERE userEmail='".$email."'");  
	    $numrows=mysqli_num_rows($query);  
	    

if($numrows==0) {  
	   		$sql="INSERT INTO userinfo(userEmail,userPass,firstName,lastName,nuts,seafood,soy,gluten) VALUES('$email','$pass','$fName','$lName','$nuts','$seafood','$soy','$gluten')"; 
	  
	    	$result=mysqli_query($conn, $sql);  
	        if($result) {  
	    			echo "<h1>Account Successfully Created</h1>";  
	    			echo "<a href=\"search.php\"><p>Get searching for recipes!</p></a>";
	    			$sql2 = "SELECT userId FROM userinfo WHERE userEmail='" .$email. "'";
	    			$result2 = mysqli_query($conn, $sql2);
	    			$row2 = mysqli_fetch_assoc($result2);
	    			$id = $row2['userId'];
	    			session_start();
		    		$_SESSION['sess_user']=$email;  
		    		$_SESSION['sess_id']=$id;
		    		//echo "<p>" .$id. "</p>";
		    		//echo "<p>" .$email. "</p>";
		 
	    		} 
	    		else {  
	    			echo "<h1>Failed to create account!</h1>";  
	    		}  
	    } 
	    else {  
	    	echo "That username already exists! Please try again with another.";  
	    }  
	  
		} else {  
	    echo "All fields are required!";  
		}  
	
?>  
</div>
</div>
</div>
</body>
</html>