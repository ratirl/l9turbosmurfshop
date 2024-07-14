<?php
//    GebruikerGeenId class with all the info from the database
//    uitsluitend gebruik om data in database te inserten
class GebruikerGeenId {
    public $username;
    public $wachtwoord;


    public function __construct($username, $wachtwoord) {
        $this->username = $username;
        $this->wachtwoord = $wachtwoord;

    }


    //Extra functionality can be written here
    
}

?>