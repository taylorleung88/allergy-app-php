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
    <a class="navbar-brand" href="login.php"><img class="nav-logo" src="./assets/chefhat.png" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"> </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
            <a href="nav-item nav-link" href="search.php">Search for Rrecipes</a>
            <a class="nav-item nav-link" href="myrecipes"> My Recipes </a>
            <a class="nav-item nav-link" href="settings.php"> Settings </a>
            <a class="nav-item nav-link" href="login.php"> Login </a>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h1 class="text-center">Sign Up</h1>
            <form action="sign-up-check.php" method="POST">
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
                    <button type="submit" name="submit" class="btn btn-primary mx-auto">Sign Up</button>
                </div>
            </form>
            <h4 class="mt-5 mx-auto text-center">Already have an account? <a href="login.php">Sign in</a></h4>
        </div>
    </div>
</div>



</html>