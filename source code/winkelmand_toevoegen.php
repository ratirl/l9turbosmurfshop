<?php
session_start();
// we gaan na of er effectief een post is gebeurd
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
// indien niet redirecten we terug naar de register pagina
    header("Location: register.php");
}
// variabele om de product id op te vangen vd form
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$img = $_POST['img'];
$quantity = $_POST['quantity'];


// variabele om in de loop te gebruiken indien het product
// al in de winkelmand zit
$bestaat = false;
// als er al iets in de mand zit gaan we gans de winkelmand
// overlopen om te kijken of het gekozen product al dan niet
// erin zit, als het erin zit gaan we gewoon de hoeveelheid
// incrementeren
if(isset($_SESSION['winkelmand'])){
    foreach ($_SESSION['winkelmand'] as &$item) {
      
    if ($item['id'] == $id){
       $bestaat = true;
        $item['quantity'] += $quantity;
    } }
    if (!$bestaat){
// en zoniet dan vullen we het op met de gekozen product
       $_SESSION['winkelmand'][count($_SESSION['winkelmand'])] = array('id' => $id, 'quantity' => $quantity, 'name' => $name, 'price' => $price, 'img' => $img);

    };
// anders starten we de winkelmand sessie met een eerste product
} else $_SESSION['winkelmand'][0] = array('id' => $id, 'quantity' => $quantity, 'name' => $name, 'price' => $price, 'img' => $img);

$data["id"] = $id;
$data["quantity"] = $quantity;
$data["name"] = $name;
$data["price"] = $price;
$data["img"] = $img;

    echo json_encode($data);
?>