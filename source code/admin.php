<?php
  session_start();
?>
<?php if($_SESSION['user'] != 'ali'){
    header("Location: index.php");
} ?>

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
                    <a href="admin.php">Bestellingen</a>  <?php } ?>
            </div>
        </nav>
<section>
    <div class="container">
    <h1>hier ziet de admin alle bestellingen</h1>
     
        <?php
        include_once './database/BestellingDB.php';
        include_once './database/Bestel_ItemDB.php';
        include_once './database/ItemsDB.php';
        $list = BestellingDB::getAll();
        foreach ($list as $item) {
      ?>
      
               
           
        
            <table class="table table-light">
        <thead>
                <tr>
            <th>Bestelling id</th>
                    <th>User</th>
                    <th>Factuur adres</th>
                    <th>Lever adres</th>
                    <th>Lever methode</th>
                    <th>Betaal methode</th>
            </tr>
                </thead>
                <tbody>
                    <tr>
                    <td> <?php echo $item->id ?></td>
                        <td> <?php echo $item->user ?></td>
                        <td> <?php echo $item->factuuradres ?></td>
                        <td> <?php echo $item->leveradres ?></td>
                        <td> <?php echo $item->levermethode ?></td>
                        <td> <?php echo $item->betaalmethode ?></td>
                    
                    </tr>
                
                </tbody>
        
        </table>
        <button class="btn btn-dark" id="<?php echo $item->id?>" onclick="details_tonen(this.id)">Details</button>
        <table class="table table-light" style="display:none;" id="table_<?php echo $item->id; ?>">
        <thead>
    <tr>
      <th>AFBEELDING</th>
      <th>NAAM</th>
      <th>PRIJS</th>
      <th>AANTAL</th>
      <th>TOTAALPRIJS</th>
    </tr>
        </thead>
            
        <tbody>    
                    <?php
    
                      $list2 = Bestel_itemDB::getBestelItemsByBestelId($item->id);
                        foreach ($list2 as $x){ 
                              $huidige_item = ItemsDB::getItemById($x->item_id);
                           ?>
                    <tr>
                
                          <td><img src="img/<?php echo $huidige_item->img; ?>" style="width:50px; height:50px;"> </td>
                       <td><?php echo $huidige_item->name; ?> <?php echo $huidige_item->categorie; ?></td>
                        <td>&euro; <?php echo $huidige_item->price ?></td>
                          <td><?php echo $x->aantal ?></td>
                          <td>&euro;<?php echo $x->totaalprijs ?></td>
                    </tr>
                    <?php } ?>
        </tbody>
              </table> 
                    
               <br><br>       
       
      <?php
        }
    ?>
        
      
    </div>
    </section> 

      <footer class="bg-dark">
    <div class="container">
        <p>Ali Trabi copyright &copy; ft Riot Games L9 </p>
        
        </div>
    </footer>
</body>
</html>