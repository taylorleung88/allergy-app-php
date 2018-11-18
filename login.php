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
            <a class="nav-item nav-link" href="login.html"> Login </a>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1 class="text-center">Login</h1>
            <form>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter e-mail address" required />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required />
                </div>
                <div id="errorMessage"></div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mx-auto">Log In</button>
                </div>
            </form>
            <p class="text-center mt-4"><a href="sign-up.html">Sign up for free!</a> | Continue as guest</p>
        </div>
    </div>
</div>

<?php  
	if(isset($_POST["submit"])){  
	  
	if(!empty($_POST['email']) && !empty($_POST['password'])) {  
	    $email=$_POST['email'];  
	    $pass=$_POST['password'];  
	  
	    $con=mysql_connect('localhost','root','') or die(mysql_error());  
	    mysql_select_db('users') or die("cannot select DB");  
	  
	    $query=mysql_query("SELECT * FROM users WHERE userEmail='".$email."' AND userPass='".$password."'");  
	    $numrows=mysql_num_rows($query);  
	    if($numrows!=0)  
	    {  
	    while($row=mysql_fetch_assoc($query))  
	    {  
	    $dbusername=$row['userEmail'];  
	    $dbpassword=$row['userPass'];  
	    }  
	  
	    if($email == $dbusername && $pass == $dbpassword)  
	    {  
	    session_start();  
	    $_SESSION['sess_user']=$user;  
	  
	    /* Redirect browser */  
	    header("Location: member.php");  
	    }  
	    } else {  
	    echo "Invalid username or password!";  
	    }  
	  
			} else {  
		    echo "All fields are required!";  
			}  
		}  
?>

</html>