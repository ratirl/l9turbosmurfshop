<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // indien niet redirecten we terug naar de login pagina
    header("Location: index.php");
}
?>
<?php
include_once 'database/BestellingDB.php';
include_once 'data/Bestel_ItemGeenId.php';
include_once 'database/Bestel_ItemDB.php';

// variabelen om de form data op te vangen
//we hebben de order id nodig die onmiddellijk gemaakt zal worden tijdens deze  
//procedure zodat we alle items vd winklemmand dezelfde orderid kunnen geven
$order_id;
$voornaam   = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];


$straat       = $_POST['straat'];
$huisnummer   = $_POST['huisnummer'];
$gemeente     = $_POST['gemeente'];
$factuuradres = $straat . " " . $huisnummer . " " . $gemeente;

$leveradres;
$lever_straat     = $_POST['lever_straat'];
$lever_huisnummer = $_POST['lever_huisnummer'];
$lever_gemeente   = $_POST['lever_gemeente'];

$levermethode = $_POST['levermethode'];
$betaalmethode = $_POST['betaalmethode'];

// als de waarde hiervan een waarde heeft
// (dan was het aangevinkt), dan nemen we de 
// waarde vd facturatie adres voor beide adressen
// en anders nemen we de waarden uit de lever post variabelen

if (isset($_POST['checkbox_zelfde_adres'])) {
    $bestelling = new BestellingGeenId($factuuradres, $factuuradres, $levermethode, $betaalmethode);
    BestellingDB::insert($bestelling);
    $net_gemaakte_bestelling = BestellingDB::getLastId();
    $order_id                = $net_gemaakte_bestelling->id;
} else 
{
    
    $leveradres = $lever_straat . " " . $lever_huisnummer . " " . $lever_gemeente;
    $bestelling = new BestellingGeenId($factuuradres, $leveradres, $levermethode, $betaalmethode);
    BestellingDB::insert($bestelling);
    $net_gemaakte_bestelling = BestellingDB::getLastId();
    $order_id                = $net_gemaakte_bestelling->id;
}

foreach ($_SESSION['winkelmand'] as $item) {
    $bestel_item = new Bestel_ItemGeenId($order_id, $item['id'], $item['quantity'], $item['price'] * $item['quantity']);
    Bestel_ItemDB::insert($bestel_item);
}

header("Location: overzicht.php?bestelid=$order_id");
?>