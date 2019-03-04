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
                <h2>Herbed Quinoa</h2>
                <h3>This recipe is free of: gluten, nuts, soy, seafood</h3>
                 <form method="POST">
                        <input type="submit" class="btn blue-button" name="fave" value="Add to Favorites" />
                    </form>

                    <?php
                        if(isset($_POST["fave"])) {
                            require_once('config.php');
                            $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME); 
                            $sql = "INSERT into favorites (userId, userEmail, recipe_id, recipe_name) VALUES ('" .$dbID. "','" .$user. "', '12' , 'Herbed Quinoa')";
                            $result = mysqli_query($conn, $sql);
                        //echo $user;
                        echo $sql;
                        }
                    ?>
                <hr />
                <h4>Ingredients</h4>
                </div>
        </div>
      
        <div class="row">
            <div class="col-lg-7 offset-lg-1">
                <ul>
                    <li>2-3/4 cups low-sodium chicken stock</li>
                    <li>1/4 cup fresh lemon juice</li>
                    <li>1-1/2 cups quinoa</li>
                    <li>1/4 cup extra-virgin olive oil</li>
                    <li>1/4 cup fresh lemon juice</li>
                    <li>3/4 cup chopped fresh basil leaves</li>
                    <li>1/4 cup chopped fresh parsley leaves</li>
                    <li>1 tablespoon chopped fresh thyme leaves</li>
                    <li>2 teaspoons lemon zest</li>
                    <li>1/2 lemon, juiced (about 1 tablespoon)</li>
                </ul>
            </div>

            <div class="col-lg-3">
                <img src="assets/quinoa.jpeg" alt="Image of herbed quinoa" class="img-fluid" />
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <h4>Directions</h4>
                    <ol>
                        <li>For the quinoa: In a medium saucepan, add the chicken stock, lemon juice and quinoa. Bring to a boil over medium-high heat. Reduce the heat to a simmer, cover the pan and cook until all the liquid is absorbed, about 12 to 15 minutes.
</li>
                        <li>For the dressing: In a small bowl, mix together the olive oil, lemon juice, basil, parsley, thyme, and lemon zest. Season with salt and pepper, to taste.</li>
                        <li>Pour the dressing over the quinoa and toss until all the ingredients are coated. Transfer the quinoa to a bowl. Season with salt and pepper, to taste, and serve.</li>
                        
                    </ol>
                   
            </div>
        </div>

    </div>

</body>
</html>