 <?php
    session_start();

    if ( isset($_SESSION['user'])!="" ) {
    header("Location: index.php");
     exit;
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script src="queryFunctions.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <style>
    
     .nav-logo {
        width: 100px;
        height: 80px;
    }

    #login-form {
        box-sizing: border-box;
        background: rgba(16,74,98,0.5);
        border-radius: 10px;
        padding: 40px;
    }

     .blue-button {
    background-color: #104A62;
    color: white;
    border-radius: 20px;
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
            <a class="nav-item nav-link blue" href="search.php"> Search For Recipes </a>
            <a class="nav-item nav-link" href="myrecipes.php"> My Recipes </a>
            <a class="nav-item nav-link" href="settings.php"> Settings </a>
            <a class="nav-item nav-link" href="login.php"> Login </a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-3" id="login-form">
            <h1 class="text-center blue">Login</h1>
            <form action="login_checking.php" method="POST">
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
                    <button type="submit" name="submit" class="btn-lg blue-button mx-auto">Log In</button>
                </div>
            </form>
            <p class="text-center mt-4"><a href="sign-up.php">Sign up for free!</a> | <a href="search.php">Continue as guest</a></p>
        </div>
    </div>
</div>


</body>
</html>