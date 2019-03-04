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
                <h2>Vegetable Noodle Soup</h2>
                <h3>This recipe is free of: nuts, soy, seafood</h3>
                 <form method="POST">
                        <input type="submit" class="btn blue-button" name="fave" value="Add to Favorites" />
                    </form>

                    <?php
                        if(isset($_POST["fave"])) {
                            require_once('config.php');
                            $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME); 
                            $sql = "INSERT into favorites (userId, userEmail, recipe_id, recipe_name) VALUES ('" .$dbID. "','" .$user. "', '11' , 'Vegetable Noodle Soup')";
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
                    <li>2 tablespoons extra-virgin olive oil</li>
                    <li>1 rib celery, sliced (about 1 cup)</li>
                    <li>1 medium carrot, sliced (about 3/4 cup)</li>
                    <li>1 clove garlic, smashed</li>
                    <li>1/4 medium onion, about 1/2 cup</li>
                    <li>1/4 teaspoon kosher salt</li>
                    <li>1/3 cup orzo or other small pasta or egg noodles or broken up spaghetti</li>
                    <li>4 cups low-sodium chicken broth (1-quart box, or 2 cans)</li>
                    <li>Small handful fresh parsley leaves, basil or dill, chopped (about 2 tablespoons)</li>
                    <li>1/2 lemon, juiced (about 1 tablespoon)</li>
                </ul>
            </div>

            <div class="col-lg-3">
                <img src="assets/vegetable-soup.jpeg" alt="Image of vegetable noodle soup" class="img-fluid" />
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <h4>Directions</h4>
                    <ol>
                        <li>Heat the olive oil in a medium saucepan over medium heat; add all the vegetables, garlic and onion. Season with the salt, and cook until tender, about 6 minutes. Add the pasta and cook until slightly toasted and golden, about 2 minutes. Add broth, and bring to a boil over high heat. Cook, covered, until pasta is just tender, about 8 minutes.</li>
                        <li>Stir in whatever herb suits you (or your young eater) and lemon juice. Season with pepper and additional salt, to taste. Fill thermos, pack in a lunch sack with crackers and cheese sticks and send off to school.</li>
                        
                    </ol>
                    <h1 class="text-danger text-center">THIS RECIPE CONTAINS GLUTEN</h1>
                   
            </div>
        </div>

    </div>

</body>
</html>