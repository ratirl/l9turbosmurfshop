<?php
session_start();
// we gaan na of er effectief een post is gebeurd
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
// indien niet redirecten we terug naar de register pagina
    header("Location: register.php");
}
    include_once 'database/UsersDB.php'; 
    include_once 'validatie.php'; 
// variabelen om de form data op te vangen
    $user = $_POST['username'];
    $pw = $_POST['wachtwoord'];
    $pw_controle = $_POST['wachtwoord_controle'];


// form valideren en indien niet fout, terug redirecten
// met foutmeldig in url om met get waarden te krijgen
// kijken of alles is ingevult
if (empty($user) || empty($pw) || empty($pw_controle)){
    header("Location: register.php?error=leeg&user=".$user);
// kijken of username enkel letters en getallen bevat
} else if (!check_username($user)){
    header("Location: register.php?error=invaliduser&user=.$user");
// kijken of beide wachtwoorden overeenstemmen
} else if ($pw !== $pw_controle){
    header("Location: register.php?error=verschillendpw");
// kijken of de username al bestaat
} else if  (UsersDB::userExists($user)){
    header("Location: register.php?error=userexists");
} else {
// en finally als alles in orde is maken we de gebruiker aan en redirecten
// we naar de login
// de str to lower omdat de usernames blijkbaar hoofdlettergevoelig zijn
    $gebruiker = new GebruikerGeenId(strtolower($user), password_hash($pw, PASSWORD_DEFAULT));
    UsersDB::insertUser($gebruiker);
    header("Location: login.php");
}
?>
