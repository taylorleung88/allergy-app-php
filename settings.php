<?php
// "protected" page

// Always start this first
session_start();

if ( isset( $_SESSION['sess_user'] ) ) {
    // Grab username
} else {
    // Redirect them to the login page
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
                <a class="nav-item nav-link" href="search.php">Search for Recipes</a>
                <a class="nav-item nav-link" href="myrecipes.php"> My Recipes </a>
                <a class="nav-item nav-link" href="settings.php"> Settings </a>
                <a class="nav-item nav-link" href="logout.php"> Logout </a>
            </div>
        </div>
    </nav>


        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <h1 class="text-center">Account Settings</h1>

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
                        <input type="password" class="form-control" name="password2" id="password2" placeholder="Re-Enter Password" />
                    </div>
                    <div class="form-group">
                        <label for="allergies">I'm allergic to...</label><br />
                        <div class="checkbox">
                            <label><input type="checkbox" name="nuts" value="1" /> Nuts</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="seafood" value="1" /> Seafood</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="soy" value="1" /> Soy</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="gluten" value="1" /> Gluten</label>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-primary mx-auto">Save Settings</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

    <?php

        require_once('config.php');

        $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

        $password = null;
        $password2 = null;

        if(isset($_POST['password'])) {
            $password = $_POST['password'];
        }

        if(isset($_POST['password2'])) {
            $password2 = $_POST['password2'];
        }

        //Check if passwords match
        if ($_POST['password'] != $_POST['password2']) {
        echo("Oops! Password did not match! Try again. ");
        }

        $email= null;
        $pass= null;
        $fName= null;
        $lName= null;

        if(isset($_POST['email'])){
            $email = $_POST['email'];
        }
                
        if(isset($_POST['password'])) {
            $pass = $_POST['password'];   
        }

        if(isset($_POST['firstName'])) {
            $fName = $_POST['firstName'];   
        }
                
        if(isset($_POST['lastName'])) {
            $lName = $_POST['lName']; 
        }


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

        $query = mysqli_query($conn, "UPDATE userinfo SET userPass = '$pass', firstName= '$fName', lastName='$lName', nuts='$nuts', seafood='$seafood', soy='$soy', gluten= '$gluten' WHERE userEmail = '$email'");

        //echo "Settings saved!";

    ?>
    </body>
</html>