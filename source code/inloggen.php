<?php
session_start();
// we gaan na of er effectief een post is gebeurd
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
// indien niet redirecten we terug naar de login pagina
    header("Location: login.php");
}
include_once 'database/UsersDB.php';
include_once 'validatie.php';

// variabelen om de form data op te vangen
$user = strtolower($_POST['username']);
$pw   = $_POST['wachtwoord'];
$ingelogd_blijven = $_POST['ingelogd_blijven'];
// form valideren en indien niet fout, terug redirecten
// met foutmeldig in url om met get waarden te krijgen
// kijken of alles is ingevult
if (empty($user) || empty($pw)) {
    header("Location: login.php?error=leeg&user=.$user");
// kijken of username enkel letters en getallen bevat en
// zoja kijken of de user bestaat
} else if (check_username($user) && UsersDB::userExists($user)) {
    $gebruiker = UsersDB::getUser($user);
// kijken of de ingevoerde wachtwoord overeenkomt met de db
// en zoja dan is de user ingelogt en we maken een sessie
// met zijn username
    if (validate_wachtwoord($gebruiker, $pw)) {
        session_start();
        $_SESSION["user"] = "$user";
// als de user 'ingelogd blijven' heeft aangeklikt 
// dat wordt dit voor een uur bewaard op een cookie
// of totdat hij zich zelf uilogt
        if($ingelogd_blijven == 'on'){setcookie("stay_logged_in", $user,time()+3600);}
        header("location:index.php");
// zoniet sturen we ze terug met een melding dat
// ofwel username ofwel wachtwoord verkeerd is
// (we zeggen niet welke niet juist is)
    } else header("Location: login.php?error=verkeerdlogin&user=".$user);
} else header("Location: login.php?error=verkeerdlogin&user=".$user);
?>