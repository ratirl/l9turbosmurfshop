<?php
   session_start();
   if(isset($_COOKIE["stay_logged_in"])){
     $_SESSION["user"] = $_COOKIE["stay_logged_in"];
   }

// zeker zorgen dat de persoon is ingelogd en de pagine enkel te 
// bereiken is door een knop
if (!isset($_SESSION["user"]) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
// indien niet redirecten we terug naar de login pagina
    header("Location: login.php");
}?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="stylesheet.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/stylesheet.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
            <form action="checkouten.php" method="post">
                <div class="container">
                    <h3 class="display-4">Checkout pagina</h3>
                    <?php require('errors.php'); ?>

                        <div class="form-group">
                            <label>Voornaam:</label>
                            <input type="text" name="voornaam" required/>

                        </div>

                        <div class="form-group">
                            <label>Achternaam:</label>
                            <input type="text" name="achternaam" required />

                        </div>

                        <div class="form-group">
                            <h5>Factuuradres</h5>
                            <label>Straat:</label>
                            <input type="text" name="straat" required/>

                        </div>

                        <div class="form-group">
                            <label>Huisnummer:</label>
                            <input type="number" name="huisnummer" required/>

                        </div>

                        <div class="form-group">
                            <label>Gemeente:</label>
                            <input type="text" name="gemeente" required/>

                        </div>

                        <div class="form-group">

                            <label>Factuur adres is hetzelfde?</label>
                            <input type="checkbox" name="checkbox_zelfde_adres" id="checkbox_zelfde_adres" value="Factuur adres is hetzelfde?" onclick="zelfde_adres()" />

                        </div>
                        <div class="form-group">
                            <h5>Leveradres</h5>
                            <label for="lever_straat">Straat:</label>
                            <input type="text" name="lever_straat" class="is_zelfde" />

                        </div>

                        <div class="form-group">
                            <label>Huisnummer:</label>
                            <input type="number" name="lever_huisnummer" class="is_zelfde" />

                        </div>

                        <div class="form-group">
                            <label>Gemeente:</label>
                            <input type="text" name="lever_gemeente" class="is_zelfde" />

                        </div>

                        <div class="form-group">
                            <h5>Levermethode</h5>
                            <input type="radio" name="levermethode" value="PostNL" checked> PostNL
                            <br>
                            <input type="radio" name="levermethode" value="Afhalen"> Afhalen

                        </div>

                        <div class="form-group">
                            <h5>Betaalmethode</h5>
                            <input type="radio" name="betaalmethode" value="Bancontact" checked> Bancontact
                            <br>
                            <input type="radio" name="betaalmethode" value="Paypal"> Paypal
                            <br>
                            <input type="radio" name="betaalmethode" value="Bitcoin"> Bitcoin

                        </div>

                        <div class="form-group">
                            <input type="checkbox" name="voorwaarden" value="Voorwaarden" required> Ik aanvaard de algemene voorwaarden
                            <br>
                            <button type="submit" class="btn btn-dark">Bestelling voltooien</button>
                        </div>

                </div>
                <br>
            </form>
        </section>
        <footer class="bg-dark">
            <div class="container">
                <p>Ali Trabi copyright &copy; ft Riot Games L9 </p>

            </div>
        </footer>
    </body>

    </html>