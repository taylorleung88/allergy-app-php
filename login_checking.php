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
	        		<a class="nav-item nav-link" href="search.html"> Search For Recipes </a>
	            <a class="nav-item nav-link" href="#"> My Recipes </a>
	            <a class="nav-item nav-link" href="settings.php"> Settings </a>
	            <a class="nav-item nav-link" href="login.php"> Login </a>
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
		<div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-12 col-xs-12">

<?php  

	require_once('config.php');
/*
	if(!empty($_POST['email']) && !empty($_POST['password'])) {  
		    $email=$_POST['email'];  
		    $pass=$_POST['password'];  

				echo "<div>";
				echo "useremail = ".$email;
				echo "</div>";

/*
				// If the user exisits in the DB
					header(....)

				// Else return back to original login page
					header("Location: login.php");
    			exit; 

	} */


		if(!empty($_POST['email']) && !empty($_POST['password'])) {  
		    $email=$_POST['email'];  
		    $pass=$_POST['password'];  

		     "<div>success</div>";
	  
		    $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
				$db_table = "userinfo";
		    //$con=mysql_connect('localhost','root','wit123') or die(mysql_error());  
		    //mysql_select_db('users') or die("cannot select DB");  
		  
		    $query=mysqli_query($conn, "SELECT * FROM userInfo WHERE userEmail='$email' AND userPass='$pass'");  
		    $numrows=mysqli_num_rows($query);  
		    if($numrows!=0) {  
		    	while($row=mysqli_fetch_assoc($query)) {  
			    $dbusername=$row['userEmail'];  
			    $dbpassword=$row['userPass'];  
			    $dbID=$row['userId'];
		    	}  
		    if($email == $dbusername && $pass == $dbpassword) {  
		    	session_start();  
		    	$_SESSION['sess_user']=$email;  
		    	$_SESSION['sess_id']=$dbID;  
		  
			    // Redirect browser 
			    header("Location: settings.php");  
		    	}  
		    } 
		    else {  
		    	echo "<p>Invalid username or password!</p>";  
		    	echo "<a href=\"login.php\">Try again!</a>";
		    }  
		  /*
				} 
				else {  
			    echo "All fields are required!";  
				}  
			}  */ 
		}
	

?>


		</div>
	</div>
</div>


	</body>

</html>