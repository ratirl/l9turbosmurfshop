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
        <link rel="stylesheet" href="/css/stylesheet.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
            <h3 class="display-4">Heeft u enige feedback of commentaar dan kunt u hieronder een bericht achterlaten:</h3>
            <?php require('errors.php'); ?>

                <?php if (isset($_GET['bevestiging'])){ ?>
                    <h3 style="color:green">Je email werd succesvol ontvangen!</h3>
                    <?php } ?>

                        <form name="contactform" method="post" action="contacteren.php">
                            <div>
                                <h2>Voornaam:</h2>
                                <input type="text" name="voornaam" size="50" required value="<?php if(isset($_GET[" voornaam "])){ echo $_GET["voornaam "];} ?>">
                            </div>
                            <div>
                                <h2>Achternaam:</h2>
                                <input type="text" name="achternaam" size="50" required value="<?php if(isset($_GET[" achternaam "])){ echo $_GET["achternaam "];} ?>">
                            </div>
                            <br>
                            <div>
                                <h2>Email:</h2>
                                <input type="email" name="email" size="50" required value="<?php if(isset($_GET[" email "])){ echo $_GET["email "];} ?>">
                            </div>
                            <br>
                            <div>
                                <h2>Onderwerp</h2>
                                <input type="text" name="onderwerp" size="50" required value="<?php if(isset($_GET[" onderwerp "])){ echo $_GET["onderwerp "];} ?>">
                            </div>
                            <br>
                            <div>
                                <h2>Bericht</h2>
                                <textarea rows="4" cols="52" name="bericht" required></textarea>
                            </div>
                            <br>

                            <input type="submit" class=" categorie bg-dark" value="Versturen" />
                        </form>
                        <br>

        </section>

        <footer class="bg-dark">
            <div class="container">
                <p>Ali Trabi copyright &copy; ft Riot Games L9 </p>

            </div>
        </footer>
    </body>

    </html>