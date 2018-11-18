<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Allergy Application</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="css/wireframe-theme.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script src="queryFunctions.js" type="text/javascript"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-light Blue-background">
    <a class="navbar-brand" href="#"> LOGO GOES HERE </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"> </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link" href="#"> My Recipes </a>
            <a class="nav-item nav-link" href="settings.php"> Settings </a>
            <a class="nav-item nav-link" href="login.php"> Login </a>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h1 class="text-center">Sign Up</h1>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control" name="firstName" id="firstName" />
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" name="lastName" id="lastName" />
                </div>
                <div class="form-group">
                    <label for="email">Email address (used for login)</label>
                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter e-mail address" />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                </div>
                <div class="form-group">
                    <label for="password">Re-Enter Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Re-Enter Password" />
                </div>
                <div class="form-group">
                    <label for="allergies">I'm allergic to...</label><br />
                    <div class="checkbox">
                        <label><input type="checkbox" name="allergies" value="nuts" /> Nuts</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="allergies" value="seafood" /> Seafood</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="allergies" value="soy" /> Soy</label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="allergies" value="gluten" /> Gluten</label>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary mx-auto">Sign Up</button>
                </div>
            </form>
            <h4 class="mt-5 mx-auto text-center">Already have an account? <a href="login.php">Sign in</a></h4>
        </div>
    </div>
</div>

<?php  
	require_once('config.php');
	if(isset($_POST["submit"])){  
		if(!empty($_POST['email']) && !empty($_POST['password'])) {  
	    $email=$_POST['email'];  
	    $pass=$_POST['password'];  
	    $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
			$db_table = "users";
	    //$con=mysql_connect('localhost','root','wit123', 'users') or die(mysql_error());  
	    //mysql_select_db('users') or die("cannot select DB");  
	  
	    $query=mysqli_query($conn, "SELECT * FROM users WHERE userEmail='".$email."'");  
	    $numrows=mysqli_num_rows($query);  
	    if($numrows==0)  
	    {  
	    $sql="INSERT INTO users(userEmail,userPass) VALUES('$email','$pass')";  
	  
	    $result=mysqli_query($conn, $sql);  
	        if($result){  
	    echo "Account Successfully Created";  
	    } else {  
	    echo "Failure!";  
	    }  
	  
	    } else {  
	    echo "That username already exists! Please try again with another.";  
	    }  
	  
		} else {  
	    echo "All fields are required!";  
		}  
	}  
?>  

</html>