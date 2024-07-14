<?php if (isset($_GET['error'])){

switch ($_GET['error']) {
    case 'leeg':
        echo "<p style='color:red';>Vul alle velden in!</p>";
        break;
    case 'verkeerdlogin':
        echo "<p style='color:red';> Onjuiste username en of wachtwoord! </p>";
        break;
    case 'invaliduser':
        echo "<p style='color:red';> Username mag enkel bestaan uit letters en cijfers! </p>";
        break;
    case 'verschillendpw':
        echo "<p style='color:red';> Wachtwoorden komen niet overeen! </p>";
        break;
    case 'userexists':
        echo "<p style='color:red';> De gekozen username bestaat al! </p>";
        break;
    case 'invalidnaam':
        echo "<p style='color:red';> Je naam mag enkel bestaan uit letters! </p>";
        break;
    case 'invalidemail':
        echo "<p style='color:red';> Geef aub een geldig emailadres in! </p>";
        break;
}

}?>
