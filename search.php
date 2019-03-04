<?php
// "protected" page

// Always start this first
session_start();

if ( isset( $_SESSION['sess_user'] ) ) {
    // Grab username
    $user = $_SESSION['sess_user'];
}
if ( isset( $_SESSION['sess_id'] )) {
    $dbID=$_SESSION['sess_id'];   
}
else {
    $user = null;
    $dbID = null;
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
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <script src="queryFunctions.js" type="text/javascript"></script>

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


<div class="container">
    <div class="row">
        <div class="col-lg-10 offset-lg-1 mb-5" id="login-form">
            <h1 class="text-center mb-5">I'm hungry for..</h1>
            <form name="recipe-search" method="POST" action="search-process.php" class="mb-5">

                <!--<input type="text" class="form-control mt-5 mb-5" name="searchTerm" placeholder="Search for a recipe">-->
                <input class="form-radio-input ml-2" type="radio" name="meal-time" id="breakfast" value="breakfast">
                <label class="form-radio-label mr-5" for="breakfast">Breakfast</label>
                <input class="form-radio-input ml-2" type="radio" name="meal-time" id="lunch" value="lunch">
                <label class="form-radio-label mr-5" for="lunch">Lunch</label>
                <input class="form-radio-input ml-2" type="radio" name="meal-time" id="dinner" value="dinner">
                <label class="form-radio-label mr-5" for="dinner">Dinner</label>
                <input class="form-radio-input" type="radio" name="meal-time" id="dessert" value="dessert">
                <label class="form-radio-label" for="dessert">Dessert</label>
                <div class="form-group">
                    <h4 class="mt-5"><label for="allergies">I'm allergic to...</label></h4><br />
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
                <h4 class="mt-5">My budget for the meal is...</h4>
                <input type="text" name="budget" class="form-control mt-5" placeholder="Ex: 20">
                <div class="mx-auto text-center mt-5">
                <button type="submit" name="search" class="btn mt-5 mx-auto text-center">Search for Recipes</button>
              </div>
            </form>
        </div>
    </div>
</div>
<?php
//echo "<p>$user</p>";
?>
</body>

</html>