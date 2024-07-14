<?php
   session_start();
   if(isset($_COOKIE["stay_logged_in"])){
     $_SESSION["user"] = $_COOKIE["stay_logged_in"];
   }
   ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="stylesheet.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="ajax_winkelmand.js"></script>
        <script src="js.js"></script>
    </head>

    <body>
        <header>
            <div class="container">
                <h1>ALI LEAGUE OF LEGENDS WINKEL</h1>
                <?php
               if (isset($_SESSION['user'])):
               ?>
                    <h5 style="color:antiquewhite" ;> Welkom <?php
               echo $_SESSION['user'];
               ?> !</h5>
                    <?php
               else:
               ?>
                        <?php
               endif;
               ?>
            </div>
        </header>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container">
                <a href="index.php">Home</a> |
                <a href="producten.php">Producten</a> |
                <a href="contact.php">Contact</a> |
                <a href="Winkelmand.php">Winkelmand</a>
                <?php if(isset($_SESSION['user'])): ?>
                    <a href="logout.php">Uitloggen</a>
                    <?php else: ?>
                        <a href="login.php">Inloggen</a>
                        <?php endif; ?>
                            <?php if(isset($_SESSION['user']) && $_SESSION['user'] == 'ali'){ ?>
                                <a href="admin.php">Bestellingen</a>
                                <?php } ?>
            </div>
        </nav>
        <section>
        </section>
        <section>
            <?php
            $uitgelezenId = $_GET["id"];
            ?>
                <br>
                <div class="container">
                    <h2 class="display-4">DIT IS DE DETAILPAGINA</h2>
                    <br>
                    <?php
             if(isset($_SESSION['user']) && $_SESSION['user'] == 'ali'){
                include_once 'admin_html_upload.php';
             }

             ?>
                        <div class="row ">
                            <?php
                  include_once './database/ItemsDB.php';
                  $detailitem = ItemsDB::getItemById($uitgelezenId);
                  ?>
                                <div class="col-lg-5 text-center text-lg-center">
                                    <h3 style="text-transform:uppercase"><?php echo $detailitem->name; ?></h3>
                                    <h5>Categorie: <?php echo $detailitem->categorie; ?></h5>
                                    <img src="img/<?php echo $detailitem->img; ?>">
                                    <h3>Prijs: &euro;<?php echo $detailitem->price; ?></h3>
                                </div>
                                <div class="col-lg-5 text-center text-lg-right">
                                    <h3>Beschrijving</h3>
                                    <p>
                                        <?php echo $detailitem->beschrijving; ?>
                                    </p>
                                    <form class="form_toevoegen_winkelmand_item" action="winkelmand_toevoegen.php">
                                        <input type="hidden" name="id" value="<?php echo $detailitem->id; ?>">
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="name" value="<?php echo $detailitem->name; ?>">
                                        <input type="hidden" name="price" value="<?php echo $detailitem->price; ?>">
                                        <input type="hidden" name="img" value="<?php echo $detailitem->img; ?>">
                                        <input type="submit" class="btn btn-block" style=" background-color: green;
                        color:antiquewhite;" value="Voeg toe aan winkelmand">
                                    </form>
                                </div>
                                <?php
                  ?>
                        </div>
                        <hr class="border border-dark">
                        <div>
                            <h2 class="display-4">Feedback door anderen</h2>
                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">USER</th>
                                        <th scope="col">MICHELIN STARS</th>
                                        <th scope="col">FEEDBACK</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                        include_once './database/FeedbackDB.php';
                        include_once './database/UsersDB.php';
                        $list = FeedbackDB::getAllByProductId($uitgelezenId);
                        foreach ($list as $feedback) {
                            $user = UsersDB::getUserById($feedback->user_id);
                        ?>
                                        <tr>
                                            <td scope="row">
                                                <?php echo $user->username; ?>
                                            </td>
                                            <td>
                                                <?php for ($x = 0; $x < $feedback->sterren; $x++) {
                           echo "&#10024;";
                               }   ?>
                                            </td>
                                            <td>
                                                <?php echo $feedback->commentaar; ?>
                                            </td>
                                        </tr>
                                        <?php
                        }
                        ?>
                                </tbody>
                            </table>
                        </div>
                        <hr class="border border-dark">
                        <div>
                            <h2 class="display-4"> RATE HIER DE PRODUCT</h2>
                            <?php require('errors.php'); ?>
                                <form action="verwerken.php" method="post">
                                    <input type="hidden" name="uitgelezen_id" value="<?php echo $uitgelezenId ?>">
                                    <input type="radio" name="rating" value="1" />&#10024;
                                    <br>
                                    <input type="radio" name="rating" value="2" />&#10024;&#10024;
                                    <br>
                                    <input type="radio" name="rating" value="3" />&#10024;&#10024;
                                    <br>
                                    <input type="radio" name="rating" value="3" />&#10024;&#10024;&#10024;&#10024;
                                    <br>
                                    <input type="radio" name="rating" value="5" />&#10024;&#10024;&#10024;&#10024;&#10024;
                                    <br>
                                    <br>
                                    <h3>Opmerkingen:</h3>
                                    <br>
                                    <textarea name="opmerkingen" rows="4" cols="50"></textarea>
                                    <br>
                                    <input type="submit" class="categorie bg-dark" value="Feedback geven" />
                                </form>
                        </div>
                        <br>
                        <hr class="border border-dark">
                        <h2 class="display-4"> DIT ZIJN 4 PRODUCTEN VAN DEZELFDE CATEGORIE</h2>
                        <div class="row">
                            <?php
                  include_once './database/ItemsDB.php';
                  $list = ItemsDB::getVierZelfdeCategorie($uitgelezenId);
                  foreach ($list as $item) {
                  ?>
                                <div class="col">
                                    <h3><?php echo $item->name; ?></h3>
                                    <img src="img/<?php echo $item->img; ?>">
                                    <h2>&euro;<?php echo $item->price; ?></h2>
                                    <input type="button" class="btn btn-dark" onclick="location.href='detailpagina.php?id=<?php echo $item->id; ?>';" value="Details" />
                                </div>
                                <?php
                  }
                  ?>
                        </div>
                </div>
                <br>
        </section>
        <footer class="bg-dark">
            <div class="container">
                <p>Ali Trabi copyright &copy; ft Riot Games L9 </p>

            </div>
        </footer>
    </body>

    </html>