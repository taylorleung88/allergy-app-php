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
                <h2>Apple Pie</h2>
                <h3>This recipe is free of: soy, seafood</h3>


                 <form method="POST">
                        <input type="submit" class="btn blue-button" name="fave" value="Add to Favorites" />
                    </form>

                    <?php
                        if(isset($_POST["fave"])) {
                            require_once('config.php');
                            $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME); 
                            $sql = "INSERT into favorites (userId, userEmail, recipe_id, recipe_name) VALUES ('" .$dbID. "','" .$user. "', '7' , 'Pecan Pie')";
                            $result = mysqli_query($conn, $sql);
                        echo $user;
                        echo $sql;
                        }
                    ?>
                <hr />
                <h4>Ingredients</h4>
                </div>
        </div>
      
        <div class="row">
            <div class="col-lg-7 offset-lg-1">
                <h4>Crust</h4>
                <ul>
                    <li>1-1/2 all-purpose flour</li>
                    <li>1/2 teaspoon salt</li>
                    <li>4 tablespoons shortening</li>
                    <li>5 tablespoons unsalted butter</li>
                    <li>3 tablespoons ice cold water</li>
                    <li>2 teaspoons white vinegar</li>
                </ul>
                <h4>Filling</h4>
                <ul>
                    <li>1 cup granulated sugar</li>
                    <li>3 tablespoons brown sugar</li>
                    <li>1 cup light corn syrup</li>
                    <li>1/3 cup melted butter</li>
                    <li>1 teaspoon vanilla</li>
                    <li>3 large eggs, room temperature</li>
                    <li>1 cup chopped pecans</li>
                </ul>
            </div>

            <div class="col-lg-3">
                <img src="assets/pecan-pie.jpg" alt="Image of pecan pie" class="img-fluid" />
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <h4>Directions</h4>
                <h6>Crust</h6>
                    <ol>
                        <li>Preheat your oven to 350°F.</li>
                        <li>In a bowl whisk together your flour and salt.</li>
                        <li>Add in your shortening and butter and mix together using a pastry blender until crumbs appear.</li>
                        <li>Add in your water and vinegar and stir around and make into a ball.</li>
                        <li>Roll out dough into a large circle and place into a 9" deep dish pie plate, cutting away any excess crust, place in refrigerator.</li>
                    </ol>
                <h6>Filling</h6>
                    <ol>
                        <li>In a medium bowl mix together your granulated sugar, brown sugar, corn syrup, butter, vanilla and eggs and whisk until blended well.</li>
                        <li> Add your chopped pecans into bottom of your prepared pie crust.</li>
                        <li>Pour your filling mixture over the top.</li>
                        <li>Cover your pie with tin foil and bake in preheated oven for about 30 minutes.</li>
                        <li>Remove the foil and bake for an additional 20 minutes if needed until center is set and not overly jiggly.</li>
                        <li>Place pie on the counter or in the refrigerator to cool for several hours before serving.</li>
                    </ol>

                    <h1 class="text-center text-danger">THIS RECIPE CONTAINS GLUTEN AND NUTS</h1>
                   
            </div>
        </div>

    </div>

</body>
</html>