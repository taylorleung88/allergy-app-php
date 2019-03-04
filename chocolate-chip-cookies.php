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
                <h2>Chocolate Chip Cookies</h2>
                <h3>This recipe is free of: nuts, soy, seafood</h3>
                 <form method="POST">
                        <input type="submit" class="btn blue-button" name="fave" value="Add to Favorites" />
                    </form>

                    <?php
                        if(isset($_POST["fave"])) {
                            require_once('config.php');
                            $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME); 
                            $sql = "INSERT into favorites (userId, userEmail, recipe_id, recipe_name) VALUES ('" .$dbID. "','" .$user. "', '1' , 'Chocolate Chip Cookies')";
                            $result = mysqli_query($conn, $sql);
                       // echo $user;
                       // echo $sql;
                        }
                    ?>
                <hr />
                <h4>Ingredients</h4>
                </div>
        </div>
      
        <div class="row">
            <div class="col-lg-7 offset-lg-1">
                <ul>
                    <li>3 cups (380 grams) all-purpose flour</li>
                    <li>1 teaspoon baking soda</li>
                    <li>1 teaspoon fine sea salt</li>
                    <li>2 sticks (227 grams) unsalted butter, at room temperature</li>
                    <li>1/2 cup (100 grams) granulated sugar</li>
                    <li>1 1/4 cups (247 grams) lightly packed light brown sugar</li>
                    <li>2 teaspoons vanilla</li>
                    <li>2 large eggs, at room temperature</li>
                    <li>2 cups (340 grams) semi sweet chocolate chips</li>
                </ul>
            </div>

            <div class="col-lg-3">
                <img src="assets/choc-chip-cookies.jpg" alt="Image of chocolate chip cookies" class="img-fluid" />
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <h4>Directions</h4>
                    <ol>
                        <li>Preheat oven to 350ºF. Line baking sheets with parchment paper.</li>
                        <li>In a medium bowl combine the flour, baking soda, and salt.</li>
                        <li>In the bowl of an electric mixer beat the butter, granulated sugar, and brown sugar until creamy, about 2 minutes. Add the vanilla and eggs. Gradually beat in the flour mixture. Stir in the chocolate chips.</li>
                        <li>If time permits, wrap dough in plastic wrap and refrigerate for at least 24 hours but no more than 72 hours. This allows the dough to “marinate” and makes the cookies thicker, chewier, and more flavorful. Let dough sit at room temperature just until it is soft enough to scoop.</li>
                        <li>Divide the dough into 3-tablespoon sized balls using a large cookie scoop and drop onto prepared baking sheets.</li>
                        <li>Bake for 12-15 minutes, or until golden brown. Cool for 5 minutes before removing to wire racks to cool completely.</li>
                        <li>Although I prefer cookies fresh from the oven, these can be stored in an airtight container for up to 5 days. See post for storage tips.</li>
                    </ol>
                    <h1 class="text-center text-danger">THIS RECIPE CONTAINS GLUTEN</h1>
                   
            </div>
        </div>

    </div>

</body>
</html>