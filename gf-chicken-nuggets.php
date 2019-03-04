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
            <a class="nav-item nav-link" href="search.html"> Search For Recipes </a>
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
      <h1 class="display-4 jumbo-head">Allergy-Friendly Recipes</h1>
      <p class="lead jumbo-text">Let's get cooking!</p>
    </div>
  </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-1">
                <h2>Gluten-Free Chicken Nuggets</h2>
                <h3>This recipe is free of: gluten, nuts, soy, seafood</h3>

                 <form method="POST">
                        <input type="submit" class="btn blue-button" name="fave" value="Add to Favorites" />
                    </form>

                    <?php
                        if(isset($_POST["fave"])) {
                            require_once('config.php');
                            $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME); 
                            $sql = "INSERT into favorites (userId, userEmail, recipe_id, recipe_name) VALUES ('" .$dbID. "','" .$user. "', '2' , 'Gluten-Free Chicken Nuggets')";
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
                    <li>1 large boneless skinless chicken breast</li>
                    <li>1/2 cup unsalted butter melted</li>
                    <li>1/2 cup rice flour <span class="text-primary">See note how to make it</span></li>
                    <li>1/2 teaspoon garlic powder</li>
                    <li>1/2 teaspoon ground paprika</li>
                    <li>1/4 teaspoon salt</li>
                    <li>1/4 teaspoon black pepper</li>
                </ul>
                <p class="text-primary">1 cup of rice grain = approx. 1.5 cups of rice flour (this will depend on how fine you will blend it)</p>
            </div>

            <div class="col-lg-3">
                <img src="assets/gf-chicken-nuggets.jpg" alt="Image of chocolate chip cookies" width="70%" height="70%" />
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <h4>Directions</h4>
                    <ol>
                        <li>Preheat oven to 390 degrees F or an air fryer to 390 degrees F.</li>
                        <li>Slice chicken breast into 1/2" slices, then each slice into 2 to 3 nuggets.</li>
                        <li>In a small bowl, melt butter. In another bowl, whisk together rice flour, paprika, garlic powder, salt, and pepper.</li>
                        <li>Dip each chicken nugget in butter and then in flour mixture. Place on parchment paper lined baking sheet OR air fryer basket.</li>
                        <li>Bake nuggets for 15 to 18 minutes or until golden brown. Air-fry for 7 to 8 minutes or until golden.</li>
                    </ol>
                    
            </div>
        </div>

    </div>


</html>