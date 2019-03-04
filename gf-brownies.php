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
                <h2>Gluten-Free Chocolate Brownies</h2>
                <h3>This recipe is free of: gluten, nuts, soy, seafood</h3>
                 <form method="POST">
                        <input type="submit" class="btn blue-button" name="fave" value="Add to Favorites" />
                    </form>

                    <?php
                        if(isset($_POST["fave"])) {
                            require_once('config.php');
                            $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME); 
                            $sql = "INSERT into favorites (userId, userEmail, recipe_id, recipe_name) VALUES ('" .$dbID. "','" .$user. "', '5' , 'Gluten-Free Chocolate Brownies')";
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
                    <li>1-1/2 cups granulated sugar</li>
                    <li>1/2 cup unsalted butter</li>
                    <li>1/2 teaspoon salt</li>
                    <li>1 teaspoon vanilla extract</li>
                    <li>3/4 cup Dutch cocoa</li>
                    <li>3 large eggs, room temperature</li>
                    <li>3/4 cup gluten-free flour</li>
                    <li>1 teaspoon baking powder</li>
                    <li>1 cup chocolate chips</li>
                </ul>
            </div>

            <div class="col-lg-3">
                <img src="assets/gf-brownies.jpg" alt="Image of gluten-free chocolate Brownies" class="img-fluid" />
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <h4>Directions</h4>
                    <ol>
                        <li>Preheat the oven to 350°F. Grease an 8" square pan or 9" round pan; either should be at least 2" deep.</li>
                        <li>Place the sugar, butter, and salt in a microwave-safe bowl or saucepan. Heat over medium heat, stirring with a heatproof spatula until the butter melts and the mixture lightens in color. This step helps melt the sugar, which will give the brownies a shiny crust.</li>
                        <li>If you've heated the sugar and butter in a saucepan, transfer the mixture to a bowl; otherwise, just leave the hot ingredients right in their microwave-safe bowl. Blend in the vanilla and cocoa, then add the eggs and mix until shiny.</li>
                        <li>Blend in the flour or flour blend and the baking powder. Stir in the chips and/or nuts, if you're using them.</li>
                        <li>Pour the batter into the prepared pan, spreading it to the edges.</li>
                        <li>Bake the brownies for 33 to 38 minutes, until the top is set; and a cake tester or toothpick inserted in the center comes out clean or nearly so, with perhaps a few wet crumbs, or a tiny touch of chocolate at the tip of the tester.</li>
                        <li>Remove from the oven and cool for about 15 minutes before cutting. Once the brownies are cool, cover tightly with plastic.</li>
                    </ol>
                   
            </div>
        </div>

    </div>

</body>
</html>