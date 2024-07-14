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
        <script src="ajax_filter_categorie.js"></script>
        <script src="javascript.js"></script>
    </head>

    <body>
        <header>
            <div class="container">
                <h1>ALI LEAGUE OF LEGENDS WINKEL</h1>
                <?php if (isset($_SESSION[ 'user'])): ?>
                    <h5 style="color:antiquewhite" ;> Welkom <?php
               echo $_SESSION['user'];
               ?> !</h5>
                    <?php endif; ?>
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
            <h2> Filter op categorie: </h2>
            <br>
            <div class="container">
                <form class="categorie_filter" action="categorie_filter.php">
                    <input type="hidden" name="categorie" value="alle_producten">
                    <input class="btn btn-dark btn-lg btn-block" style="text-transform:uppercase;" type="submit" value="TOON ALLES">
                </form>
                <?php
               include_once './database/ItemsDB.php';
               error_reporting (E_ALL ^ E_NOTICE);
               $list = ItemsDB::getCategories();
               foreach ($list as $item) {
               ?>
                    <form class="categorie_filter" action="categorie_filter.php">
                        <input type="hidden" name="categorie" value="<?php echo $item->categorie; ?>">
                        <input class="btn btn-dark btn-lg btn-block" style="text-transform:uppercase;" type="submit" value="<?php echo $item->categorie; ?>">
                    </form>
                    <?php
               }
               ?>
            </div>
            <br>
            <div class="container">
                <br>
                <h2>DIT ZIJN ALLE PRODUCTEN</h2>
                <br>
                <div class="row">
                    <?php
                  include_once './database/ItemsDB.php';
                  $list = ItemsDB::getAll();
                  foreach ($list as $item) {
                  ?>
                        <div class="col-md-3 col-sm-6 col-xs-12 item alle_producten <?php echo $item->categorie; ?>" style="text-transform:uppercase">
                            <h3><?php echo $item->name; ?></h3>
                            <img src="img/<?php echo $item->img; ?>">
                            <h2>&euro;<?php echo $item->price; ?></h2>
                            <input type="button" class="btn btn-dark" onclick="location.href='detailpagina.php?id=<?php echo $item->id; ?>';" value="Detailpagina" />
                            <form class="form_toevoegen_winkelmand_item" action="winkelmand_toevoegen.php">
                                <input type="hidden" name="id" value="<?php echo $item->id; ?>">
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="name" value="<?php echo $item->name; ?>">
                                <input type="hidden" name="price" value="<?php echo $item->price; ?>">
                                <input type="hidden" name="img" value="<?php echo $item->img; ?>">
                                <input type="submit" class="btn buttonwinkel" value="Voeg toe aan winkelmand">

                            </form>
                            <br>
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