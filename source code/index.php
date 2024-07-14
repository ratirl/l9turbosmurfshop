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
         <br>
         <div class="container">
            <h2 class="display-4">DIT ZIJN 4 WILLEKEURIG UITGELICHTE PRODUCTEN</h2>
            <br>
            <div class="row">
               <?php
                  include_once './database/ItemsDB.php';
                  $list = ItemsDB::getVierWillekeurigUitgelichte();
                  foreach ($list as $item) {
                  ?>
               <div class="col">
                  <h3 style="text-transform:uppercase"><?php echo $item->name; ?></h3>
                  <img src="img/<?php echo $item->img; ?>">
                  <h2>&euro;<?php echo $item->price; ?></h2>
                  <input type="button" class="btn btn-dark" onclick="location.href='detailpagina.php?id=<?php echo $item->id; ?>';" value="Details" />
               </div>
               <?php
                  }
                  ?>
            </div>
            <br>
            <hr class="border border-dark">
            <h2 class="display-4">DIT ZIJN DE 4 NIEUWSTE PRODUCTEN</h2>
            <br>
            <div class="row">
               <?php
                  include_once './database/ItemsDB.php';
                  $list = ItemsDB::getVierNieuwste();
                  foreach ($list as $item) {
                  ?>
               <div class="col">
                  <h3 style="text-transform:uppercase"><?php echo $item->name; ?></h3>
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