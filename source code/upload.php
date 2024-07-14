<?php
// we gaan na of er effectief een post is gebeurd, indien niet redirecten we terug naar de 1e pagina
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
}
?>

      <?php
  include_once 'database/ItemsDB.php'; 

        if ($_FILES["bestand"]["type"] == "image/jpeg" || $_FILES["bestand"]["type"] == "image/png"){
          $bestandsnaam = $_FILES["bestand"]["name"];
          move_uploaded_file($_FILES["bestand"]["tmp_name"], "./img/" . $bestandsnaam);
            
            
//    Get values from $_POST variable
    $name = $_POST['naam'];
    $prijs = $_POST['prijs'];
    $categorie = $_POST['categorie'];
    $uitgelicht;
    
            if (isset($_POST["uitlichten"])){
                $uitgelicht = true;
            } else $uitgelicht = 0;
    

    $item = new ItemGeenId($name,$prijs,"hardcoded_beschrijving_temporary",$bestandsnaam,$uitgelicht,$categorie);
      
    

    ItemsDB::insert($item);
//    Go back to index
    header("location:index.php");
//
      ?>
      <?php
        } else {
      ?>
          <p>Sorry, enkel jpeg of png files kunnen geupload worden.</p>
      <?php
        }
      ?>
    <p><a href='index.php'>Ga terug naar de upload pagina</a></p>

