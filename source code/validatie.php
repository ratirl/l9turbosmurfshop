<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
// return true als parameter enkel uit letters en getallen bestaat
function check_username($username){
    return (preg_match("/^[a-zA-Z0-9]*$/", $username));
}

// return true als parameter enkel uit letters, getallen en spaties bestaat
function check_mag_spatie($text){
    return (preg_match("/^[a-zA-Z0-9 ]*$/", $text));
}

function check_getal($text){
    return (preg_match("/^[0-9]*$/", $text));
}


// return true als parameter enkel uit letters bestaat
function check_naam_en_voornaam($naam){
    return (preg_match("/^[a-zA-Z]*$/", $naam));
}

// return true als parameter een geldig email is
function check_email($email){
    return (filter_var($email, FILTER_VALIDATE_EMAIL));
}

// return true als wachtwoord overeenkomt met hash
function validate_wachtwoord($gebruiker, $wachtwoord){
    return (password_verify($wachtwoord, $gebruiker->wachtwoord));
}
?>