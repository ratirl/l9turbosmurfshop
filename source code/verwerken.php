<?php
session_start();
?>
<?php
 include_once 'database/UsersDB.php';
    include_once 'database/ItemsDB.php'; 
    include_once 'database/FeedbackDB.php'; 
// variabelen om de form data op te vangen
    $opmerkingen = $_POST['opmerkingen'];
    $sterren = $_POST['rating'];
    $uitgelezen_id = $_POST['uitgelezen_id'];

// we gaan na of er effectief een post is gebeurd
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
// indien niet redirecten we terug naar de homepagina
    header("Location: index.php");
} else if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
// form valideren en indien niet fout, terug redirecten
// met foutmeldig in url om met get waarden te krijgen
// kijken of alles is ingevult
 else if (empty($opmerkingen) || empty($sterren)){
    header("Location: detailpagina.php?id="."$uitgelezen_id"."&error=leeg");
    
} else {
// en finally als alles in orde is maken we de feedback aan en redirecten
// we naar de detailpagina waar ze waren
    $user = UsersDB::getUser($_SESSION["user"]);
    $feedback = new FeedbackGeenId($user->id, $uitgelezen_id, $sterren, $opmerkingen );
    FeedbackDB::insertFeedback($feedback);
    header("Location: detailpagina.php?id=".$uitgelezen_id);
}
?>
