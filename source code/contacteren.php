<?php
// we gaan na of er effectief een post is gebeurd
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
// indien niet redirecten we terug naar de contact pagina
    header("Location: contact.php");
}
    include_once 'database/UsersDB.php'; 
    include_once 'validatie.php'; 
// variabelen om de form data op te vangen
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $emailadres = $_POST['email'];
    $onderwerp = $_POST['onderwerp'];
    $bericht = wordwrap($_POST['bericht'], 70, "\r\n");
    $naar = 'ali.trabi@student.ehb.be';

    $headers = 'From: '.$emailadres . "\r\n" .
    'Reply-To: '.$naar. "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// form valideren en indien niet fout, terug redirecten
// met foutmeldig in url om met get waarden te krijgen
// kijken of alles is ingevult
if (empty($voornaam) || empty($achternaam) || empty($emailadres) || empty($onderwerp) || empty($bericht)){
    header("Location: contact.php?error=leeg&voornaam=$voornaam"."&achternaam=".$achternaam."&emailadres=".$emailadres."&onderwerp=".$onderwerp);
// kijken of voornaam enkel letters bevat
} else if (!check_naam_en_voornaam($voornaam)){
    header("Location: contact.php?error=invalidnaam&voornaam=$voornaam"."&achternaam=".$achternaam."&emailadres=".$emailadres."&onderwerp=".$onderwerp);
    // kijken of acternaam enkel letters bevat
} else if (!check_naam_en_voornaam($achternaam)){
    header("Location: contact.php?error=invalidnaam&voornaam=$voornaam"."&achternaam=".$achternaam."&emailadres=".$emailadres."&onderwerp=".$onderwerp);
    // kijken of email geldig is
} else if (!check_email($emailadres)){
    header("Location: contact.php?error=invalidemail&voornaam=$voornaam"."&achternaam=".$achternaam."&emailadres=".$emailadres."&onderwerp=".$onderwerp);
} else {
// en finally als alles in orde is sturen we de mail en redirecten
// we met een bevestiging
    mail($naar, $onderwerp, $bericht, $headers);
    header("Location: contact.php?bevestiging");
}
?>