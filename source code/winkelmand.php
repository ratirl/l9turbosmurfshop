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
                <a href="Winkelmand.php">Winkelwagen</a>
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
            <div class="container">
                <hr class="border border-dark">
                <div class="qq">
                    <h2 class="display-4">Uw winkelmand</h2>
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">AFBEELDING</th>
                                <th scope="col">NAAM</th>
                                <th scope="col">PRIJS</th>
                                <th scope="col">AANTAL</th>
                                <th scope="col">TOTAALPRIJS</th>
                            </tr>
                        </thead>
                        <tbody class="winkelmand_items">

                            <?php if(isset($_SESSION["winkelmand"])){ ?>

                                <?php $totaalprijs = 0;
         foreach ($_SESSION['winkelmand'] as $item) {  ?>
                                    <tr id="tr_met_id_<?php echo $item['id']; ?>">

                                        <td><img src="img/<?php echo $item['img']; ?>" style="width:100px; height:100px;"> </td>
                                        <td>
                                            <?php echo $item['name']; ?>
                                        </td>
                                        <td> &euro;
                                            <?php echo $item['price']; ?>
                                        </td>
                                        <td>
                                            <?php echo $item['quantity']; ?>
                                        </td>
                                        <?php $totaal_per_item = $item['quantity'] * $item['price']; $totaalprijs += $totaal_per_item; ?>
                                            <td> &euro;
                                                <?php echo $totaal_per_item ; ?>
                                            </td>

                                            <td>
                                                <form class="form_verwijderen_winkelmand_item" action="winkelmand_verwijderen.php">
                                                    <input type="hidden" name="id" value="<?php echo $item['id'];?>">
                                                    <input type="submit" class="btn btn-danger" value="Verwijder">
                                                </form>
                                            </td>
                                    </tr>

                                    <?php } 
    ?>

                        </tbody>
                    </table>
                    <table class="table table-dark table-striped">

                        <thead>
                            <tr>
                                <td>TOTAALPRIJS: &euro;
                                    <?php echo $totaalprijs ?>
                                </td>

                                <td>
                                    <form action="checkout.php" method="post">

                                        <input type="submit" class="btn btn-success" value="Checkout" />
                                    </form>
                                </td>
                                <?php }
?>

                            </tr>
                        </thead>
                    </table>

                </div>
                <hr class="border border-dark">

            </div>
        </section>

        <footer class="bg-dark">
            <div class="container">
                <p>Ali Trabi copyright &copy; ft Riot Games L9 </p>

            </div>
        </footer>
    </body>

    </html>