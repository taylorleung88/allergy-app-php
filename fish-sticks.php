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
            <a class="nav-item nav-link" href="settings.php">Settings</a>
            <?php
                if ( isset( $_SESSION['sess_user'] ) ) {
                    $message = "Login";
                    $url = "login.php";
                    $user = $_SESSION['sess_user'];
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
            <div class="col-lg-10 offset-1">
                <h2>Fish Sticks</h2>
                <h3>This recipe is free of: nuts, soy</h3>


                 <form method="POST">
                        <input type="submit" class="btn blue-button" name="fave" value="Add to Favorites" />
                    </form>

                    <?php
                        if(isset($_POST["fave"])) {
                            require_once('config.php');
                            $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME); 
                            $sql = "INSERT into favorites (userId, userEmail, recipe_id, recipe_name) VALUES ('" .$dbID. "','" .$user. "', '10' , 'Fish Sticks')";
                            $result = mysqli_query($conn, $sql);
                        //echo $user;
                        //echo $sql;
                        }
                    ?>
                <hr />
                <h4>Ingredients</h4>
                </div>
        </div>
      
        <div class="row">
            <div class="col-lg-7 offset-lg-1">
                <ul>
                    <li>Place eggs, panko, and flour in 3 separate shallow medium bowls.</li>
                    <li>2 cups panko (Japanese breadcrumbs)</li>
                    <li>1/4 cup all-purpose flour</li>
                    <li>1 pound flounder or cod fillets, slices crosswise into 3/4 inch-wide strips</li>
                    <li>1 dash garlic salt</li>
                    <li>Kosher salt, freshly ground pepper</li>
                    <li>3/4 cup vegetable oil, divided</li>
                </ul>
            </div>

            <div class="col-lg-3">
                <img src="assets/fish-sticks.jpg" alt="Image of fish sticks" class="img-fluid" />
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <h4>Directions</h4>
                    <ol>
                        <li>Bring a large pot of lightly salted water to a boil. Add fettuccini and cook for 8 to 10 minutes or until al dente; drain.</li>
                        <li>ISeason fish with salt and pepper. Working in batches, dredge fish in flour, shaking off excess. Coat with egg, allowing excess to drip back into bowl. Coat with panko, pressing to adhere. Transfer fish to a plate.</li>
                        <li>Heat 1/2 cup oil in a large skillet over medium-high heat. Working in 2 batches and adding 1/4 cup oil between batches, cook fish until golden brown and cooked through, about 3 minutes per side.</li>
                        <li>Transfer fish sticks to a paper towel-lined plate; season with salt.</li>
                    </ol>

                    <h1 class="text-center text-danger">THIS RECIPE CONTAINS SEAFOOD AND GLUTEN</h1>
                   
            </div>
        </div>

    </div>

</body>
</html>